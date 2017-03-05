<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 06.03.17
 * Time: 1:15
 */
class API extends MY_Controller {
    protected $access = ['superadmin', 'admin'];

    public function index() {

    }

    public function get_departments($company_id) {
        $this->load->model('auth_model');

        header('Content-Type: application/json');
        echo json_encode($this->auth_model->get_departments($company_id), 321);
    }

    public function get_all_departments($company_id) {
        $this->load->model('auth_model');

        header('Content-Type: application/json');
        echo json_encode($this->auth_model->get_departments($company_id), 321);
    }


}