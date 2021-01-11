<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        if ($this->session->userdata('role') == 1) {
            $data['user'] = get_userdata_login();
            $data['title'] = 'Aplikasi Pensiun - Daftar Pengguna';
            $data_users['users'] = $this->db->get('users')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('users/index', $data_users);
            $this->load->view('templates/footer');
        } else {
            $data['user'] = get_userdata_login();
            $data['title'] = 'Aplikasi Pensiun - 403 Forbidden';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('blocked');
            $this->load->view('templates/footer');
        }
    }

    public function add()
    {
        if ($this->session->userdata('role') == 1) {
            $this->form_validation->set_rules('name', 'Nama', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('role', 'Role', 'trim|required|numeric');
            $this->form_validation->set_rules('password', 'Kata sandi', 'required|trim|min_length[8]|matches[repassword]');
            $this->form_validation->set_rules('repassword', 'Ulang kata sandi', 'required|trim|min_length[8]|matches[password]');

            if ($this->form_validation->run() == false) {
                $data['user'] = get_userdata_login();
                $data['title'] = 'Aplikasi Pensiun - Tambah Pengguna Baru';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navigation', $data);
                $this->load->view('users/add');
                $this->load->view('templates/footer');
            } else {
                $data = [
                    'name' => htmlspecialchars($this->input->post('name', true)),
                    'role' => htmlspecialchars($this->input->post('role', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'image' => 'default_profile.jpg',
                    'date_created' => time()
                ];

                $this->db->insert('users', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun sukses ditambahkan. </div>');
                redirect('users');
            }
        } else {
            $data['user'] = get_userdata_login();
            $data['title'] = 'Aplikasi Pensiun - 403 Forbidden';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('blocked');
            $this->load->view('templates/footer');
        }
    }

    public function edit($id = NULL)
    {
        if ($this->session->userdata('role') == 1) {
            if ($id == NULL) {
                redirect('users');
            } else {
                $data['user_edit'] = $this->db->get_where('users', ['id' => decrypt_url($id)])->row_array();
                if ($data['user_edit']['name'] == NULL) {
                    redirect('users');
                }
                $data['user'] = get_userdata_login();
                $data['title'] = 'Aplikasi Pensiun - Edit Pengguna Baru';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navigation', $data);
                $this->load->view('users/edit', $data);
                $this->load->view('templates/footer');
            }
        } else {
            page_blocked();
        }
    }

    public function editpost()
    {
        if ($this->session->userdata('role') == 1) {
            $id = $this->input->post('id');

            $this->form_validation->set_rules('name', 'Nama', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('role', 'Role', 'trim|required|numeric');
            $this->form_validation->set_rules('password', 'Kata sandi', 'trim|min_length[8]|matches[repassword]');
            $this->form_validation->set_rules('repassword', 'Ulang kata sandi', 'trim|min_length[8]|matches[password]');

            if ($this->form_validation->run() == false) {
                $this->edit($id);
            } else {
                if (empty($this->input->post('password'))) {
                    $data = [
                        'name' => htmlspecialchars($this->input->post('name', true)),
                        'role' => htmlspecialchars($this->input->post('role', true)),
                        'email' => htmlspecialchars($this->input->post('email', true)),
                    ];
                } else {
                    $data = [
                        'name' => htmlspecialchars($this->input->post('name', true)),
                        'role' => htmlspecialchars($this->input->post('role', true)),
                        'email' => htmlspecialchars($this->input->post('email', true)),
                        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    ];
                }

                $this->db->set($data);
                $this->db->where('id', $id);
                $this->db->update('users');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun sukses diedit. </div>');
                redirect('users');
            }
        } else {
            $data['user'] = get_userdata_login();
            $data['title'] = 'Aplikasi Pensiun - 403 Forbidden';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('blocked');
            $this->load->view('templates/footer');
        }
    }

    public function delete($id)
    {
        if ($this->session->userdata('role') == 1) {
            $this->db->delete('users', ['id' => encrypt_url($id)]);
            $this->session->set_flashdata('message', '<div align="center" class="alert alert-success alert-dismissible fade show" role="alert">
        Pengguna telah dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
            redirect('users');
        } else {
            $data['user'] = get_userdata_login();
            $data['title'] = 'Aplikasi Pensiun - 403 Forbidden';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('blocked');
            $this->load->view('templates/footer');
        }
    }
}
