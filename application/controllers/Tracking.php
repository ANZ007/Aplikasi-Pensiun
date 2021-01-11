<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tracking extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('data_model');
        is_logged_in();
    }

    public function index()
    {
        if ($this->session->userdata('role') == 2) {
            $data['user'] = get_userdata_login();
            $data['title'] = 'Aplikasi Pensiun - Tracking';
            $data['pensiun'] = $this->data_model->get_tracking($data['user']['name']);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('tracking', $data);
            $this->load->view('templates/footer');
        } else {
            page_blocked();
        }
    }
}
