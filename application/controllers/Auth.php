<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for (all) non logged in users
 */
class Auth extends MY_Controller {

	public function logged_in_check()
	{
		if ($this->session->userdata("logged_in")) {
			redirect("dashboard");
		}
	}

	public function index() {
		$this->logged_in_check();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("username", "Username", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		if ($this->form_validation->run() == true) 
		{
			$this->load->model('auth_model', 'auth');	
			// check the username & password of user
			$status = $this->auth->validate();
			if ($status == ERR_INVALID_USERNAME) {
				$this->session->set_flashdata("error", "Username is invalid");
			}
			elseif ($status == ERR_INVALID_PASSWORD) {
				$this->session->set_flashdata("error", "Password is invalid");
			}
			else
			{
				// success
				// store the user data to session
                $this->session->set_userdata($this->auth->get_data());
				$this->session->set_userdata("logged_in", true);
				// redirect to dashboard
				redirect("dashboard");
			}
		}

		$this->load->view("header");		
		$this->load->view("auth");
		$this->load->view("footer");
	}

	public function registration() {
	    $this->load->library('form_validation');

        $this->form_validation->set_rules('fname', 'Имя', 'trim|required');
        $this->form_validation->set_rules('lname', 'Фамилия', 'trim|required');
        $this->form_validation->set_rules('sname', 'Отчество', 'trim|required');
        $this->form_validation->set_rules('email', 'Электронная почта', 'trim|required|valid_email|is_unique[users.email]|callback_email_check');
        $this->form_validation->set_rules('phone', 'Телефон', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('username', 'Логин', 'trim|required|min_length[4]|callback_username_check');
        $this->form_validation->set_rules('password', 'Пароль', 'required|min_length[4]|max_length[8]');
        $this->form_validation->set_rules('password_confirm', 'Подтвердить пароль', 'matches[password]');

        if($this->form_validation->run() === false) {
            $this->load->view("header");
            $this->load->view("registration");
            $this->load->view("footer");
        } else {
            $this->load->model('auth_model');

            if ($query = $this->auth_model->create_member()) {
                $data['account_created'] = 'Ваш аккаунт успешно создан.';

                redirect("auth");
            }
        }
    }

    /**
     * @return string
     */
    public function email_check($email) {
        $this->load->model('auth_model');

        $username_available = $this->auth_model->check_email_exist($email);

        if ($username_available) {
            return TRUE;
        } else {
            $this->form_validation->set_message('email_check', 'Данный e-mail уже существует');
            return FALSE;
        }
    }

    public function username_check($login) {
        $this->load->model('auth_model');
        $this->load->library('form_validation');

        $username_available = $this->auth_model->check_login_exist($login);

        if ($username_available) {
            return TRUE;
        } else {
            $this->form_validation->set_message('username_check', 'Данное имя уже существует');
            return FALSE;
        }
    }

	public function logout()
	{
		$this->session->unset_userdata("logged_in");
		$this->session->sess_destroy();
		redirect("auth");
	}

}