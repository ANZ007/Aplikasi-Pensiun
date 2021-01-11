<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Addpensiun extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('data_model');
    }

    public function nip($nip = NULL)
    {
        if ($this->session->userdata('role') == 2) {
            if ($nip == NULL) {
                redirect('dashboard');
            } else {
                $data['data_pegawai'] = $this->db->get_where('daftar_pegawai', ['nip' => $nip])->row_array();
                if ($data['data_pegawai']['nama'] == NULL) {
                    redirect('inbox');
                }
                $data['user'] = get_userdata_login();
                $data['title'] = 'Aplikasi Pensiun - Pendaftaran Pensiun';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navigation', $data);
                $this->load->view('addpensiun', $data);
                $this->load->view('templates/footer');
            }
        }
    }

    public function index()
    {
        if ($this->session->userdata('role') == 2) {
            if ($this->session->userdata('role') == 2) {
                $data['user'] = get_userdata_login();
                $data['title'] = 'Aplikasi Pensiun - Pendaftaran Pensiun';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navigation', $data);
                $this->load->view('addpensiun', $data);
                $this->load->view('templates/footer');
            } else {
                page_blocked();
            }
        } else {
            page_blocked();
        }
    }

    public function post()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric|trim|min_length[18]|max_length[20]');
        $nip = htmlspecialchars($this->input->post('nip', true));
        if (empty($_FILES['superpdna']['name'])) {
            $this->form_validation->set_rules('superpdna', 'SUPERPDNA', 'required');
        }
        if (empty($_FILES['skpi1thn']['name'])) {
            $this->form_validation->set_rules('skpi1thn', 'SKPI1THN', 'required');
        }
        if (empty($_FILES['superhd']['name'])) {
            $this->form_validation->set_rules('superhd', 'SUPERHD', 'required');
        }
        if (empty($_FILES['skcp']['name'])) {
            $this->form_validation->set_rules('skcp', 'SKCP', 'required');
        }
        if (empty($_FILES['skkp']['name'])) {
            $this->form_validation->set_rules('skkp', 'SKKP', 'required');
        }
        if ($this->form_validation->run() == false) {
            if ($nip == NULL) {
                $this->index();
            } else {
                $this->nip($nip);
            }
        } else {
            $data['user'] = get_userdata_login();
            $nip = htmlspecialchars($this->input->post('nip', true));
            $data1 = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'nip' => $nip,
                'satker' => $data['user']['name'],
                'created_at' => time(),
                'updated_at' => time()
            ];
            $data2 = [
                'superpdna' => upload_form_files('superpdna', $_FILES['superpdna'], $nip),
                'skpi1thn'  => upload_form_files('skpi1thn', $_FILES['skpi1thn'], $nip),
                'superhd'   => upload_form_files('superhd', $_FILES['superhd'], $nip),
                'skcp'      => upload_form_files('skcp', $_FILES['skcp'], $nip),
                'skkp'      => upload_form_files('skkp', $_FILES['skkp'], $nip),
                'skpmk'     => upload_form_files('skpmk', $_FILES['skpmk'], $nip),
                'skjf1'     => upload_form_files('skjf1', $_FILES['skjf1'], $nip),
                'skjab'     => upload_form_files('skjab', $_FILES['skjab'], $nip),
                'skkppi'    => upload_form_files('skkppi', $_FILES['skkppi'], $nip),
                'skhentis'  => upload_form_files('skhentis', $_FILES['skhentis'], $nip),
                'skcltn'    => upload_form_files('skcltn', $_FILES['skcltn'], $nip),
                'skaktcltn' => upload_form_files('skaktcltn', $_FILES['skaktcltn'], $nip),
            ];
            $data3 = [
                'sampai_karowai' => TRUE
            ];
            $data4 = [
                'keterangan' => "DIUSULKAN"
            ];
            $this->data_model->insert_data_pensiun($data1, $data2, $data3, $data4, $nip);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data telah berhasil dikirim. </div>');
            redirect('dashboard');
        }
    }
}
