<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Keluhan_model');
        if (!$this->session->userdata('email')) {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('role') != 1) {
                redirect(base_url());
            }
        }
    }

    public function user_manager()
    {
        $all_users = $this->User_model->get_all_user();
        $data['all_users'] = $all_users;
        if (!$this->input->post('email')) {
            $this->load->view('template/header');
            $this->load->view('template/logged_in_navbar');
            $this->load->view('pages/dashboard/admin/user_manager', $data);
            $this->load->view('template/footer');
        } else {
            $available = $this->User_model->get_user_by_email($this->input->post('email'));
            $phone_available = !$this->User_model->get_user_by_phone($this->input->post('tel'));
            $phone_find = $this->User_model->get_user_by_phone($this->input->post('tel'));
            if ($available) {
                if (!($phone_available && $phone_find['email'] != $this->input->post('email'))) {
                    $user_data = [
                        'nama' => $this->input->post('nama'),
                        'tel' => $this->input->post('tel'),
                        'role' => $this->input->post('role'),
                        'is_active' => $this->input->post('is_active'),
                    ];
                    $this->User_model->update_user($this->input->post('email'), $user_data);
                    $this->session->set_flashdata('success_msg', 'Info Akun Berhasil Dirubah!');
                } else {
                    $this->session->set_flashdata('error_msg', 'Info Akun Gagal Dirubah!');
                }
            } else {
                $this->session->set_flashdata('error_msg', 'Akun Tidak Ditemukan!');
            }
            redirect(base_url('user-manager'));
        }
    }

    public function keluhan_manager()
    {
        $all_keluhan = $this->Keluhan_model->get_all_keluhan();
        $data['all_keluhan'] = $all_keluhan;
        if (!$this->input->post('tiket')) {
            $this->load->view('template/header');
            $this->load->view('template/logged_in_navbar');
            $this->load->view('pages/dashboard/admin/keluhan_manager', $data);
            $this->load->view('template/footer');
        } else {
            if ($this->Keluhan_model->get_keluhan_by_tiket($this->input->post('tiket'))) {
                $data = [
                    "tiket" => $this->input->post('tiket'),
                    "status_code" => $this->input->post('status')
                ];
                $this->Keluhan_model->update_keluhan($this->input->post('tiket'), $data);
                $this->session->set_flashdata('success_msg', 'Info Laporan Berhasil Dirubah!');
            } else {
                $this->session->set_flashdata('error_msg', 'Laporan Tidak Ditemukan!');
            }
            redirect(base_url('keluhan-manager'));
        }
    }

    public function delete_user($id)
    {
        $user = $this->User_model->get_user_by_id($id);
        if ($user[0]) {
            $this->User_model->delete_user($id);
            $this->session->set_flashdata('success_msg', 'User Berhasil Dihapus!');
        } else {
            $this->session->set_flashdata('error_msg', 'User Tidak Ditemukan!');
        }
        redirect(base_url('user-manager'));
    }

    public function delete_keluhan($tiket)
    {
        $keluhan = $this->Keluhan_model->get_keluhan_by_tiket($tiket);
        if ($keluhan[0]) {
            $this->Keluhan_model->delete_keluhan($tiket);
            $this->session->set_flashdata('success_msg', 'Laporan Berhasil Dihapus!');
        } else {
            $this->session->set_flashdata('error_msg', 'Laporan Tidak Ditemukan!');
        }
        redirect(base_url('keluhan-manager'));
    }
}
