<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Keluhan_model');
	}

	public function index()
	{
		$this->load->view('template/header');
		if (!$this->session->userdata('email')) {
			$this->load->view('template/navbar');
			$this->load->view('pages/landing/index');
		} else {
			$this->load->view('template/logged_in_navbar');
			if ($this->session->userdata('role') == 1) { //admin
				$data['user_counts'] = count($this->User_model->get_all_user());
				$data['keluhan_counts'] = count($this->Keluhan_model->get_all_keluhan());
				$this->load->view('pages/dashboard/admin/index', $data);
			} else {
				$keluhan = $this->Keluhan_model->get_keluhan_by_session();
				$keluhan_selesai = $this->Keluhan_model->get_keluhan_selesai_by_session();
				$data['keluhan'] = $keluhan;
				$data['keluhan_counts'] = count($keluhan);
				$data['keluhan_selesai'] = $keluhan_selesai;
				$data['keluhan_selesai_counts'] = count($keluhan_selesai);
				$this->load->view('pages/dashboard/user/index', $data);
			}
		}
		$this->load->view('template/footer');
	}
}
