<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Keluhan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }


    public function add_keluhan($data)
    {
        $this->db->insert('keluhan', $data);
        file_get_contents(
            'http://localhost:3000/send_invoice/'
                . '?number=' . urlencode($this->session->userdata('tel'))
                . '&tiket=' . urlencode($data['tiket'])
                . '&laporan=' . urlencode($data['keluhan'])
                . '&url_req=' . urlencode(base_url('keluhan'))
        );
    }

    public function update_keluhan($tiket, $data)
    {
        $this->db->where('tiket', $tiket);
        $this->db->update('keluhan', $data);
    }

    public function delete_keluhan($tiket)
    {
        $this->db->where('tiket', $tiket);
        $this->db->delete('keluhan');
    }

    public function get_all_keluhan()
    {
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->join('user', 'user.email = keluhan.creator');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_keluhan_by_tiket($tiket)
    {
        $this->db->select('creator as Penulis, tiket as Tiket, keluhan as Keluhan, alamat as Alamat, status_code as Status, created_at as Dibuat Tanggal');
        $this->db->from('keluhan');
        $this->db->where('tiket', $tiket);
        $query = $this->db->get();
        if ($query->result_array()) {
            $result = $query->result_array();
            foreach ($result as $key => $val) {
                $result[$key]['Status'] = $result[$key]['Status'] == 0 ? "Proses" : "Selesai";
            }
            return $result;
        } else {
            return array();
        }
    }

    public function get_keluhan_by_session()
    {
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->where('creator', $this->session->userdata('email'));
        $query = $this->db->get();
        if ($query->result_array()) {
            return $query->result_array();
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
        if ($query->result_array()) {
            return $query->result_array();
        } else {
            return array();
        }
    }
}
