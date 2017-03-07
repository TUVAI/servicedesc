<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

	private $table = "users";
	private $_data = array();

	public function validate() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->db->select('password, role.name as role, login,
                          lname, fname, sname,
                          email, phone,
                          company_id, department_id, position_id');
		$this->db->where("login", $username);
		$this->db->or_where("email", $username);

        $this->db->join('role', $this->table . '.role_id = role.id', 'left');

		$query = $this->db->get($this->table);

		if ($query->num_rows()) 
		{
			// found row by username	
			$row = $query->row_array();

			// now check for the password
			if ($row['password'] == sha1($password)) {
				// we not need password to store in session
				unset($row['password']);
				$this->_data = $row;
				return ERR_NONE;
			}

			// password not match
			return ERR_INVALID_PASSWORD;
		}
		else {
			// not found
			return ERR_INVALID_USERNAME;
		}
	}

	function validate_registration() {
	    $this->db->where('login', $this->input->post('login'));
	    $this->db->where('password', sha1($this->input->post('password')));

        $query = $this->db->get('users');

        if ($query->num_rows == 1) {
            return true;
        }
    }

    //добавить пользователя в базу
    function create_member() {
        $new_member_insert_data = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'sname' => $this->input->post('sname'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'login' => $this->input->post('username'),
            'role_id' => 6,
            'company_id' => 1,
            'departmen_id' => 1,
            'position_id' => 1,
            'password' => sha1($this->input->post('password'))
        );

        $insert = $this->db->insert('users', $new_member_insert_data);
        return $insert;
    }

    function add_department() {
        $new_member_insert_data = array(
            'company_id' => $this->input->post('company_id'),
            'fullname' => $this->input->post('fullname'),
            'shortname' => $this->input->post('shortname'),
        );

        $insert = $this->db->insert('department', $new_member_insert_data);
        return $insert;
    }

    function get_user($id) {
        $result = $this->db->get_where('users', array('id' => $id), 1);
        return $result->row_array();
    }

    function get_company($id) {
        $result = $this->db->get_where('company', array('id' => $id), 1);
        return $result->row_array();
    }

    function get_position($position_id) {
        $this->db->where('id', $position_id);
        $result = $this->db->get('position');

        return $result->row_array();
    }

    function get_companies() {
        $result = $this->db->get('company');
        return $result->result_array();
    }

    function get_departments($company_id) {
        $this->db->where('company_id', $company_id);
        $result = $this->db->get('department');

        return $result->result_array();
    }

    function get_all_departments() {
        $result = $this->db->get('department');
        return $result->result_array();
    }

    function get_positions() {
        $result = $this->db->get('position');
        return $result->result_array();
    }

    function get_roles() {
        $result = $this->db->get('role');
        return $result->result_array();
    }

    function add_company() {
        $new_member_insert_data = array(
            'name' => $this->input->post('name'),
            'fullname' => $this->input->post('fullname'),
            'shortname' => $this->input->post('shortname'),
        );

        $insert = $this->db->insert('company', $new_member_insert_data);
        return $insert;
    }

    function  add_position() {
        $new_member_insert_data = array(
            'name' => $this->input->post('name'),
        );

        $insert = $this->db->insert('position', $new_member_insert_data);
        return $insert;
    }

    function edit_position($id) {
        $new_member_insert_data = array(
            'name' => $this->input->post('name'),
        );

        $this->db->set($new_member_insert_data);
        $this->db->where('id', $id);
        $update = $this->db->update('position');
        return $update;
    }

    function edit_company($id) {
        $new_member_insert_data = array(
            'name' => $this->input->post('name'),
            'fullname' => $this->input->post('fullname'),
            'shortname' => $this->input->post('shortname'),
        );

        $this->db->set($new_member_insert_data);
        $this->db->where('id', $id);
        $update = $this->db->update('company');
        return $update;
    }

    function del_company($id) {
        $delete = $this->db->delete('company', array('id' => $id));
        return $delete;
    }

    function del_user($id) {
        $delete = $this->db->delete('users', array('id' => $id));
        return $delete;
    }

    function edit_user($id) {
        $this->db->where('id', $id);
        $user = $this->db->get('users');
        $user = $user->row_array();

        $new_member_insert_data = array(
            'lname' => $this->input->post('lname'),
            'fname' => $this->input->post('fname'),
            'sname' => $this->input->post('sname'),
            'phone' => $this->input->post('phone'),
            'company_id' => $this->input->post('company_id'),
            'department_id' => $this->input->post('department_id'),
            'position_id' => $this->input->post('position_id'),
            'role_id' => $this->input->post('role_id'),
        );

        if ($user['email'] !== $this->input->post('email')) {
            $new_member_insert_data['email'] = $this->input->post('email');
        }
        $this->db->set($new_member_insert_data);
        $this->db->where('id', $id);
        $this->db->where('login', $this->input->post('username'));
        $update = $this->db->update('users');

        return $update;
    }


    function check_login_exist($login) {
        $this->db->where('login', $login);
        $result = $this->db->get('users');

        if ($result->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function check_email_exist($email) {
        $this->db->where('email', $email);
        $result = $this->db->get('users');

        if ($result->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function get_data()
	{
		return $this->_data;
	}

}