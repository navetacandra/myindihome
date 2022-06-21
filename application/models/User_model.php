<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }


    public function create_user($user)
    {
        $this->db->insert('user', $user);
    }

    public function update_user($email, $data)
    {
        $this->db->where('email', $email);
        $this->db->update('user', $data);
        $this->refetch();
    }

    public function get_all_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_user_by_email($email)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->row_array();
    }

    private function refetch()
    {
        $user_data = $this->User_model->get_user_by_email($this->session->userdata('email'));
        $session_user = [
            'nama' => $user_data['nama'],
            'tel' => $user_data['tel'],
            'email' => $user_data['email'],
            'role' => $user_data['role'],
            'is_active' => $user_data['is_active'],
            'created_at' => $user_data['created_at'],
        ];
        $this->session->set_userdata($session_user);
    }
}
