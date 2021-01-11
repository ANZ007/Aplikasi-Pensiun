<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rollback extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('rollback_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('role') == 2) {
            $data['user'] = get_userdata_login();
            $data['title'] = 'Aplikasi Pensiun - Berkas Rollback';
            $data['data_rollback'] = $this->rollback_model->get_data($data['user']['name']);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('rollback/index', $data);
            $this->load->view('templates/footer');
        } else {
            page_blocked();
        }
    }

    public function details($id = NULL)
    {
        if ($this->session->userdata('role') == 2) {
            if ($id == NULL) {
                redirect('rollback');
            }
            $data['user'] = get_userdata_login();
            $data['data_rollback'] = $this->rollback_model->get_data_details(decrypt_url($id));
            if ($data['data_rollback']['nama'] == NULL) {
                redirect('rollback');
            }
            $data['title'] = 'Aplikasi Pensiun - Detail Berkas Rollback';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('rollback/details', $data);
            $this->load->view('templates/footer');
        } else {
            page_blocked();
        }
    }

    public function edit($id = NULL)
    {
        if ($this->session->userdata('role') == 2) {
            if ($id == NULL) {
                redirect('rollback');
            } else {
                $data['id_pensiun'] = $this->db->get_where('id_pensiun', ['id' => decrypt_url($id)])->row_array();
                if ($data['id_pensiun']['nama'] == NULL) {
                    redirect('rollback');
                }
                $data['user'] = get_userdata_login();
                $data['title'] = 'Aplikasi Pensiun - Balas';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navigation', $data);
                $this->load->view('rollback/edit', $data);
                $this->load->view('templates/footer');
            }
        } else {
            page_blocked();
        }
    }

    public function editpost()
    {
        if ($this->session->userdata('role') == 2) {
            $this->form_validation->set_rules('id', 'ID', 'required');
            $this->form_validation->set_rules('nip', 'NIP', 'required');
            $id = $this->input->post('id');
            $nip = $this->input->post('nip');
            if ($this->form_validation->run() == false) {
                $this->edit($id);
            } else {
                $data1['updated_at'] = time();
                if (!empty($_FILES['superpdna']['name'])) {
                    $data2['superpdna'] = upload_form_files('superpdna', $_FILES['superpdna'], $nip);
                }
                if (!empty($_FILES['skpi1thn']['name'])) {
                    $data2['skpi1thn'] = upload_form_files('skpi1thn', $_FILES['skpi1thn'], $nip);
                }
                if (!empty($_FILES['superhd']['name'])) {
                }
                if (!empty($_FILES['skcp']['name'])) {
                }
                if (!empty($_FILES['skkp']['name'])) {
                }
                if (!empty($_FILES['skpmk']['name'])) {
                }
                if (!empty($_FILES['skjf1']['name'])) {
                }
                if (!empty($_FILES['skjab']['name'])) {
                }
                if (!empty($_FILES['skkppi']['name'])) {
                }
                if (!empty($_FILES['skhentis']['name'])) {
                }
                if (!empty($_FILES['skcltn']['name'])) {
                }
                if (!empty($_FILES['skaktcltn']['name'])) {
                }
                $data3 = [
                    'is_rollback' => NULL,
                    'pesan_rollback' => NULL
                ];
                if (empty($data2)) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Anda tidak mengupload berkas apapun. </div>');
                    redirect('rollback/details/' . encrypt_url($id));
                }
                $this->rollback_model->update_data($id, $data1, $data2, $data3);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berkas sukses diganti. </div>');
                redirect('rollback/details/' . encrypt_url($id));
            }
        } else {
            page_blocked();
        }
    }
}
