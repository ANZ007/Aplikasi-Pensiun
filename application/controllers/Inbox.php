<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inbox extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('inbox_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('role') == 1) {
            $data['user'] = get_userdata_login();
            $data['title'] = 'Aplikasi Pensiun - Berkas Masuk';
            $data['data_pensiun'] = $this->inbox_model->get_inbox_rowai();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('inbox/index', $data);
            $this->load->view('templates/footer');
        } else if ($this->session->userdata('role') == 2) {
            $data['user'] = get_userdata_login();
            $data['title'] = 'Aplikasi Pensiun - Berkas Masuk';
            $data['data_pensiun'] = $this->inbox_model->get_inbox_satker($data['user']['name']);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('inbox/index', $data);
            $this->load->view('templates/footer');
        }
    }

    public function details($id = NULL)
    {
        if ($this->session->userdata('role') == 1) {
            if ($id == NULL) {
                redirect('inbox');
            }
            $data['user'] = get_userdata_login();
            $data['data_details'] = $this->inbox_model->get_details(decrypt_url($id));
            if ($data['data_details']['nama'] == NULL) {
                redirect('inbox');
            }
            $data['title'] = 'Aplikasi Pensiun - Detail';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('inbox/details', $data);
            $this->load->view('templates/footer');
        } else {
            page_blocked();
        }
    }

    public function reply($id = NULL)
    {
        if ($this->session->userdata('role') == 1) {
            if ($id == NULL) {
                redirect('inbox');
            } else {
                $data['id_pensiun'] = $this->db->get_where('id_pensiun', ['id' => decrypt_url($id)])->row_array();
                if ($data['id_pensiun']['nama'] == NULL) {
                    redirect('inbox');
                }
                $data['user'] = get_userdata_login();
                $data['title'] = 'Aplikasi Pensiun - Balas';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navigation', $data);
                $this->load->view('inbox/reply', $data);
                $this->load->view('templates/footer');
            }
        } else {
            page_blocked();
        }
    }

    public function replypost()
    {
        if ($this->session->userdata('role') == 1) {
            $this->form_validation->set_rules('id', 'ID', 'required');
            $this->form_validation->set_rules('nip', 'NIP', 'required');
            $id = $this->input->post('id');
            $nip = $this->input->post('nip');
            if (empty($_FILES['file_jawaban']['name'])) {
                $this->form_validation->set_rules('file_jawaban', 'Jawaban', 'required');
            }
            if ($this->form_validation->run() == false) {
                $this->reply($id);
            } else {
                $data1['updated_at'] = time();
                $data2['file_jawaban'] = upload_form_files('file_jawaban', $_FILES['file_jawaban'], $nip);
                $data3['sampai_satker'] = TRUE;
                $this->inbox_model->update_reply($id, $data1, $data2, $data3);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berkas sukses diupload. </div>');
                redirect('inbox/details/' . $id);
            }
        } else {
            page_blocked();
        }
    }

    public function rollback($id = NULL)
    {
        if ($this->session->userdata('role') == 1) {
            if ($id == NULL) {
                redirect('inbox');
            } else {
                $data['id_pensiun'] = $this->db->get_where('id_pensiun', ['id' => decrypt_url($id)])->row_array();
                if ($data['id_pensiun']['nama'] == NULL) {
                    redirect('inbox');
                }
                $data['user'] = get_userdata_login();
                $data['title'] = 'Aplikasi Pensiun - Rollback Berkas';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navigation', $data);
                $this->load->view('inbox/rollback', $data);
                $this->load->view('templates/footer');
            }
        } else {
            page_blocked();
        }
    }

    public function rollbackpost()
    {
        if ($this->session->userdata('role') == 1) {
            $this->form_validation->set_rules('id', 'ID', 'required');
            $this->form_validation->set_rules('nip', 'NIP', 'required');
            $this->form_validation->set_rules('alasan', 'Alasan', 'required');
            $id = $this->input->post('id');
            $nip = $this->input->post('nip');
            $alasan = $this->input->post('alasan');
            if ($this->form_validation->run() == false) {
                $this->reply($id);
            } else {
                $data1['updated_at'] = time();
                $data3 = [
                    'is_rollback' => TRUE,
                    'pesan_rollback' => $alasan
                ];
                $this->inbox_model->update_tracking($id, $data1, $data3);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berkas sukses dirollback. </div>');
                redirect('inbox');
            }
        } else {
            page_blocked();
        }
    }

    public function set_bkn_done($id = NULL)
    {
        if ($this->session->userdata('role') == 1) {
            if ($id == NULL) {
                redirect('inbox');
            } else {
                $data['tracking'] = $this->db->get_where('tracking', ['id' => decrypt_url($id)])->row_array();
                if ($data['tracking']['id'] == NULL) {
                    redirect('inbox');
                }
                $data1['updated_at'] = time();
                $data3['sampai_karowai_2'] = TRUE;
                $this->inbox_model->update_tracking($data['tracking']['id'], $data1, $data3);
                redirect('inbox/details/' . $id);
            }
        } else {
            page_blocked();
        }
    }

    public function set_bkn_undone($id = NULL)
    {
        if ($this->session->userdata('role') == 1) {
            if ($id == NULL) {
                redirect('inbox');
            } else {
                $data['tracking'] = $this->db->get_where('tracking', ['id' => decrypt_url($id)])->row_array();
                if ($data['tracking']['id'] == NULL) {
                    redirect('inbox');
                }
                $data1['updated_at'] = time();
                $data3['sampai_karowai_2'] = FALSE;
                $this->inbox_model->update_tracking($data['tracking']['id'], $data1, $data3);
                redirect('inbox/details/' . $id);
            }
        } else {
            page_blocked();
        }
    }

    public function set_done($id = NULL)
    {
        if ($this->session->userdata('role') == 1) {
            if ($id == NULL) {
                redirect('inbox');
            } else {
                $data['tracking'] = $this->db->get_where('tracking', ['id' => decrypt_url($id)])->row_array();
                if ($data['tracking']['id'] == NULL) {
                    redirect('inbox');
                }
                $data1['updated_at'] = time();
                $data3['sampai_bkn'] = TRUE;
                $this->inbox_model->update_tracking($data['tracking']['id'], $data1, $data3);
                redirect('inbox/details/' . $id);
            }
        } else {
            page_blocked();
        }
    }

    public function set_undone($id = NULL)
    {
        if ($this->session->userdata('role') == 1) {
            if ($id == NULL) {
                redirect('inbox');
            } else {
                $data['tracking'] = $this->db->get_where('tracking', ['id' => decrypt_url($id)])->row_array();
                if ($data['tracking']['id'] == NULL) {
                    redirect('inbox');
                }
                $data1['updated_at'] = time();
                $data3['sampai_bkn'] = FALSE;
                $this->inbox_model->update_tracking($data['tracking']['id'], $data1, $data3);
                redirect('inbox/details/' . $id);
            }
        } else {
            page_blocked();
        }
    }

    public function undone_reply($id = NULL)
    {
        if ($this->session->userdata('role') == 1) {
            if ($id == NULL) {
                redirect('inbox');
            } else {
                $data['tracking'] = $this->db->get_where('tracking', ['id' => decrypt_url($id)])->row_array();
                if ($data['tracking']['id'] == NULL) {
                    redirect('inbox');
                }
                $data1['updated_at'] = time();
                $data3['sampai_satker'] = FALSE;
                $data2['file_jawaban'] = NULL;
                $this->inbox_model->update_reply($data['tracking']['id'], $data1, $data2, $data3);
                redirect('inbox/details/' . $id);
            }
        } else {
            page_blocked();
        }
    }
}
