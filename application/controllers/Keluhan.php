<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluhan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Keluhan_model');
        if (!$this->session->userdata('email')) {
            redirect(base_url('login'));
        }
    }

    public function detail($tiket)
    {
        $keluhan = $this->Keluhan_model->get_keluhan_by_tiket($tiket);
        $this->load->view('template/header');
        $this->load->view('template/logged_in_navbar');
        if ($keluhan[0]) {
            $data['keluhan'] = $keluhan[0];
            $this->load->view('pages/keluhan/detail', $data);
        } else {
            redirect(base_url());
        }
        $this->load->view('template/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules(
            'keluhan',
            'Keluhan',
            'trim|required|min_length[3]',
            [
                'required' => 'Kolom ini wajib di-isi!',
                'min_length' => 'Kolom ini harus berisi minimal 3 karakter!'
            ]
        );

        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'trim|required|min_length[5]',
            [
                'required' => 'Kolom ini wajib di-isi!',
                'min_length' => 'Kolom ini harus berisi minimal 5 karakter!'
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/logged_in_navbar');
            $this->load->view('pages/keluhan/buat');
            $this->load->view('template/footer');
        } else {
            $tiket = md5($this->session->userdata('email')) . floor(microtime(true) * 1000);
            $keluhan_data = [
                'creator' => $this->session->userdata('email'),
                'tiket' => $tiket,
                'keluhan' => $this->input->post('keluhan'),
                'alamat' => $this->input->post('alamat'),
                'status_code' => 0,
            ];
            $this->Keluhan_model->add_keluhan($keluhan_data);
            $this->session->set_flashdata('success_msg', 'Laporan Berhasil Dibuat!');
            redirect(base_url('riwayat-laporan'));
        }
    }

    public function history()
    {
        $user_keluhan = $this->Keluhan_model->get_keluhan_by_session();
        $data['user_keluhan'] = $user_keluhan;
        $this->load->view('template/header');
        $this->load->view('template/logged_in_navbar');
        $this->load->view('pages/keluhan/riwayat', $data);
        $this->load->view('template/footer');
    }
}
