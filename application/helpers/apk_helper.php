<?php
defined('BASEPATH') or exit('No direct script access allowed');

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda belum login !</div>');
        redirect('auth/login');
    }
}

function get_userdata_login()
{
    $ci = get_instance();
    $userdata = $ci->db->get_where('users', ['email' => $ci->session->userdata('email')])->row_array();
    return $userdata;
}

function upload_form_files($file_ket, $file_data, $nip)
{
    $ci = get_instance();
    if ($file_data) {
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '50000';
        $config['upload_path'] = './data/';
        $config['overwrite'] = TRUE;
        $config['file_name'] = $file_ket . '_' . $nip;

        $ci->load->library('upload', $config);
        $ci->upload->initialize($config);

        if (!$ci->upload->do_upload($file_ket)) {
            return NULL;
        } else {
            return $ci->upload->data('file_name');
        }
    } else {
        return NULL;
    }
}

function page_blocked()
{
    $ci = get_instance();
    $data['user'] = get_userdata_login();
    $data['title'] = 'Aplikasi Pensiun - 403 Forbidden';
    $ci->load->view('templates/header', $data);
    $ci->load->view('templates/navigation', $data);
    $ci->load->view('blocked');
    $ci->load->view('templates/footer');
}
