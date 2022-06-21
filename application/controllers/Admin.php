<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        if (!$this->session->userdata('email') || $this->session->userdata('role') != 1) {
            redirect(base_url());
        }
    }

    public function user_manager()
    {
        $all_users = $this->User_model->get_all_user();
        $data['all_users'] = $all_users;
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/logged_in_navbar');
            $this->load->view('pages/dashboard/admin/user_manager', $data);
            $this->load->view('template/footer');
        } else {
            $available = $this->User_model->get_user_by_email($this->input->post('email'));
            if (!$available) {
                $user_data = [
                    'nama' => $this->input->post('nama'),
                    'tel' => $this->input->post('tel'),
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('password1'))
                ];
                // $this->User_model->create_user($user_data);
                // $this->session->set_flashdata('success_msg', 'Selamat! Akun Berhasil Dibuat.');
                // redirect(base_url('login'));
            }
        }
    }
}
