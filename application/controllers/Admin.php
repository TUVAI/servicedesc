<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for Admin group only
 */
class Admin extends MY_Controller {

	protected $access = ['superadmin', 'admin'];
	
	public function index()
	{
        $this->db->select('id, name');

        $query = $this->db->get('company');
        $data['companies'] = $query->result_array();


        $this->db->select('users.id as id, role.name as role, 
                          department.fullname as department, company.name as company, position.name as position,
                          lname, fname, sname,
                          email, phone');
        $this->db->join('position', 'users' . '.position_id = position.id', 'left');
        $this->db->join('department', 'users' . '.department_id = department.id', 'left');
        $this->db->join('company', 'users' . '.company_id = company.id', 'left');
        $this->db->join('role', 'users' . '.role_id = role.id', 'left');

        $users = $this->db->get('users');
        $data['users'] = $users->result_array();

        $this->db->select('id, name');
        $positions = $this->db->get('position');
        $data['positions'] = $positions->result_array();


		$this->load->view("header");
		$this->load->view("navbar");
		$this->load->view("admin", $data);
		$this->load->view("footer");
	}

    public function edit_user($id = null) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('lname', 'Фамилия', 'trim|required');
        $this->form_validation->set_rules('fname', 'Имя', 'trim|required');
        $this->form_validation->set_rules('sname', 'Отчество', 'trim|required');
        $this->form_validation->set_rules('email', 'Электронная почта', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'Телефон', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('company_id', 'Компания', 'trim|required');
        $this->form_validation->set_rules('department_id', 'Отдел', 'trim|required');
        $this->form_validation->set_rules('position_id', 'Должность', 'trim|required');
        $this->form_validation->set_rules('role_id', 'Роль', 'trim|required');

        $data['info'] = $this->session->flashdata('info');

        $this->load->model('auth_model');
        if($this->form_validation->run() === true) {
            if($this->auth_model->edit_user($id)) {
                $this->session->set_flashdata('info', 'Пользовательские данные отредактированы');

                redirect(current_url());
            }
        }

        if ($id) {
            $this->db->select('users.id as id, position_id,
                               login, role_id, department_id, users.company_id,
                               role.name as role,
                               company.name as company, 
                               department.fullname as department, 
                               position.name as position,
                               lname, fname, sname, email, phone');
            $this->db->where('users.id', $id);
            $this->db->join('position', 'users' . '.position_id = position.id', 'left');
            $this->db->join('department', 'users' . '.department_id = department.id', 'left');
            $this->db->join('company', 'users' . '.company_id = company.id', 'left');
            $this->db->join('role', 'users' . '.role_id = role.id', 'left');

            $users = $id ? $this->db->get('users') : null;
            $data['user'] = $users ? $users->row_array() : null;
        }

        $companies = $this->auth_model->get_companies();
        $data['departments'] = $this->auth_model->get_all_departments();
        $positions = $this->auth_model->get_positions();
        $roles = $this->auth_model->get_roles();

        foreach ($companies as $company) {
            $data['companies'][$company['id']] = $company['fullname'];
        }

        foreach ($positions as $position) {
            $data['positions'][$position['id']] = $position['name'];
        }

        foreach ($roles as $role) {
            $data['roles'][$role['id']] = $role['name'];
        }

        $this->load->view("header");
        $this->load->view("navbar");
        $this->load->view("/user/edit_user", $data);
        $this->load->view("footer");
    }

    public function add_department($id = null) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('shortname', 'Короткое имя', 'trim|required');
        $this->form_validation->set_rules('fullname', 'Полноее имя', 'trim|required');
        $this->form_validation->set_rules('company_id', 'Компания', 'trim|required');

        $data['info'] = $this->session->flashdata('info');

        $this->load->model('auth_model');
        if($this->form_validation->run() === true) {
            if($this->auth_model->add_department()) {
                $this->session->set_flashdata('info', 'Отдел добавлен');

                redirect(current_url());
            }
        }
        $data['companies'] = $id ?
            $this->auth_model->get_company($id) :
            $this->auth_model->get_companies();

        if ($id) {
            $data['companies_select'][$data['companies']['id']] = $data['companies']['fullname'];
        } else {
            foreach ($data['companies'] as $val) {
                $data['companies_select'][$val['id']] = $val['name'];
            }
        }

        $this->load->view("header");
        $this->load->view("navbar");
        $this->load->view("/department/add_department", $data);
        $this->load->view("footer");
    }

    public function add_position() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Название должности', 'trim|required|is_unique[position.name]');

        $data['info'] = $this->session->flashdata('info');

        $this->load->model('auth_model');
        if($this->form_validation->run() === true) {
            if($this->auth_model->add_position()) {
                $this->session->set_flashdata('info', 'Должность добавлена');

                redirect(current_url());
            }
        }

        $this->load->view("header");
        $this->load->view("navbar");
        $this->load->view("/position/add_position");
        $this->load->view("footer");
    }

	public function add_company() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Имя', 'trim|required');
        $this->form_validation->set_rules('shortname', 'Короткое имя', 'trim|required');
        $this->form_validation->set_rules('fullname', 'Полноее имя', 'trim|required');

        $data['info'] = $this->session->flashdata('info');

        if($this->form_validation->run() === true) {
            $this->load->model('auth_model');
            if($this->auth_model->add_company()) {
                $this->session->set_flashdata('info', 'Компания добавлена');

                redirect(current_url());
            }
        }

        $this->load->view("header");
        $this->load->view("navbar");
        $this->load->view("/company/add_company", $data);
        $this->load->view("footer");
    }

    public function edit_position($id) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Имя', 'trim|required');

        $data['info'] = $this->session->flashdata('info');

        $this->load->model('auth_model');
        if($this->form_validation->run() === true) {
            if($this->auth_model->edit_position($id)) {
                $this->session->set_flashdata('info', 'Должность отредактирована');

                redirect(current_url());
            }
        }

        $data['position'] = $this->auth_model->get_position($id);

        $this->load->view("header");
        $this->load->view("navbar");
        $this->load->view("/position/edit_position", $data);
        $this->load->view("footer");
    }

    public function edit_company($id) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Имя', 'trim|required');
        $this->form_validation->set_rules('shortname', 'Короткое имя', 'trim|required');
        $this->form_validation->set_rules('fullname', 'Полноее имя', 'trim|required');

        $data['info'] = $this->session->flashdata('info');
        $this->load->model('auth_model');
        if($this->form_validation->run() === true) {
            if($this->auth_model->edit_company($id)) {
                $this->session->set_flashdata('info', 'Компания отредактирована');

                redirect(current_url());
            }
        }

        $data['company'] = $this->auth_model->get_company($id);

        $this->load->view("header");
        $this->load->view("navbar");
        $this->load->view("/company/edit_company", $data);
        $this->load->view("footer");
    }

    public function del_company($id) {
        $this->load->model('auth_model');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('check', 'Подтвердить', 'trim|required');
        if($this->form_validation->run() === true) {
            if ($this->auth_model->del_company($id)) {
                $this->session->set_flashdata('info', 'Компания успешно удалена');

                redirect('/admin', 'refresh');
            }
        }

        $data['company'] = $this->auth_model->get_company($id);

        $this->load->view("header");
        $this->load->view("navbar");
        $this->load->view("/company/del_company", $data);
        $this->load->view("footer");
    }

    public function del_user($id) {
        $this->load->model('auth_model');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('check', 'Подтвердить', 'trim|required');
        if($this->form_validation->run() === true) {
            if ($this->auth_model->del_user($id)) {
                $this->session->set_flashdata('info', 'Пользователь успешно удален');

                redirect('/admin', 'refresh');
            }
        }

        $data['user'] = $this->auth_model->get_user($id);

        $this->load->view("header");
        $this->load->view("navbar");
        $this->load->view("/user/del_user", $data);
        $this->load->view("footer");
    }
}