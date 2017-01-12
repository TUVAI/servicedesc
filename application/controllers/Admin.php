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

        $users = $this->db->get('users');
        $data['users'] = $users->result_array();


		$this->load->view("header");
		$this->load->view("navbar");
		$this->load->view("admin", $data);
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
        $this->load->view("add_company", $data);
        $this->load->view("footer");
    }
}