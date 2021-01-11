<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        redirect('profile/show');
    }

    public function show()
    {
        $data['user'] = get_userdata_login();
        //echo "Nama : " . $data['user']['name'];
        $data['title'] = 'Aplikasi Pensiun - Profil Saya';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('profile/show', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['user'] = get_userdata_login();
        $data['title'] = 'Aplikasi Pensiun - Edit Profil';
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('profile/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $id = $this->input->post('id');
            $bio = $this->input->post('bio');
            $data = array(
                "name" => $name,
                "bio"  => $bio,
            );
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('users');

            // cek gambar
            $upload_image = $_FILES['image'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/profile-img/';
                $config['max_height'] = '1600';
                $config['max_width'] = '1600';
                $config['file_name'] = 'profile_' . $id;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default_profile.jpg') {
                        unlink('FCPATH' . '/assets/profile-img/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                    $this->db->where('id', $id);
                    $this->db->update('users');
                }
            }
            if ($new_image || $this->db->affected_rows()) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Profil anda sudah diperbarui</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">' . $this->upload->display_errors() . '</div>');
            }
            redirect('profile/show');
        }
    }

    public function passwd()
    {
        $data['title'] = 'Aplikasi Pensiun - Ubah Password';
        $data['user'] = get_userdata_login();

        $this->form_validation->set_rules('current_password', 'Kata sandi lama', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Kata sandi baru', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Ulangi kata sandi baru', 'required|trim|min_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('profile/passwd', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi lama salah</div>');
                redirect('profile/passwd');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi baru tidak boleh sama dengan kata sandi lama</div>');
                    redirect('profile/passwd');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('users');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kata sandi berhasil diubah</div>');
                    redirect('profile/passwd');
                }
            }
        }
    }
}
