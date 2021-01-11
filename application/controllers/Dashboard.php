<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('dashboard_model');
    }

    public function index()
    {
        $data['user'] = get_userdata_login();
        $data['title'] = 'Aplikasi Pensiun - Dashboard';
        if ($this->session->userdata('role') == 1) {
            $data['pegawai'] = $this->dashboard_model->get_daftar_pegawai_akan_pensiun();
            $data['jumlah']['pegawai'] = $this->dashboard_model->get_jumlah_pegawai();
            $data['jumlah']['akan_pensiun'] = $this->dashboard_model->get_pegawai_akan_pensiun();
            $data['jumlah']['diproses'] = $this->dashboard_model->get_pegawai_diproses();
            $data['jumlah']['selesai'] = $this->dashboard_model->get_pegawai_selesai();
        } else if ($this->session->userdata('role') == 2) {
            $data['user'] = get_userdata_login();
            $data['pegawai'] = $this->dashboard_model->get_daftar_pegawai_akan_pensiun($data['user']['name']);
            $data['jumlah']['pegawai'] = $this->dashboard_model->get_jumlah_pegawai($data['user']['name']);
            $data['jumlah']['akan_pensiun'] = $this->dashboard_model->get_pegawai_akan_pensiun($data['user']['name']);
            $data['jumlah']['diproses'] = $this->dashboard_model->get_pegawai_diproses($data['user']['name']);
            $data['jumlah']['selesai'] = $this->dashboard_model->get_pegawai_selesai($data['user']['name']);
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
}
