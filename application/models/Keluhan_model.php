<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Keluhan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }


    public function create_user($user)
    {
        $this->db->insert('keluhan', $user);
    }

    public function get_all_keluhan()
    {
        $this->db->select('*');
        $this->db->from('keluhan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_keluhan_by_session()
    {
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->where('creator', $this->session->userdata('email'));
        $query = $this->db->get();
        if ($query->row_array()) {
            return $query->row_array();
        } else {
            return array();
        }
    }

    public function get_keluhan_selesai_by_session()
    {
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->where([
            'creator' => $this->session->userdata('email'),
            'status_code' => 1
        ]);
        $query = $this->db->get();
        if ($query->row_array()) {
            return $query->row_array();
        } else {
            return array();
        }
    }
}
