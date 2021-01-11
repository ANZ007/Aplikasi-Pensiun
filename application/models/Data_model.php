<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{

    public function insert_data_pensiun($data1, $data2, $data3, $data4, $nip)
    {
        $this->db->insert('id_pensiun', $data1);
        $data3['id'] = $data2['id'] = $this->db->insert_id();
        $this->db->insert('file_pensiun', $data2);
        $this->db->insert('tracking', $data3);
        $this->db->where('nip', $nip)->update('daftar_pegawai', $data4);
    }

    public function get_tracking($satker)
    {
        if ($satker == NULL) {
            $this->db->select('*');
            $this->db->from('id_pensiun a');
            $this->db->join('tracking b', 'b.id=a.id', 'left');
            $query = $this->db->get();
            if ($query->num_rows() != 0) {
                return $query->result_array();
            } else {
                return NULL;
            }
        } else {
            $this->db->select('*');
            $this->db->from('id_pensiun a');
            $this->db->join('tracking b', 'b.id=a.id', 'left');
            $this->db->where('a.satker', $satker);
            $query = $this->db->get();
            if ($query->num_rows() != 0) {
                return $query->result_array();
            } else {
                return NULL;
            }
        }
    }

    public function get_inbox_satker($satker)
    {
        $where_not_null = "b.file_jawaban IS NOT NULL";
        $this->db->select('*');
        $this->db->from('id_pensiun a');
        $this->db->join('file_pensiun b', 'b.id=a.id', 'left');
        $this->db->where('a.satker', $satker);
        $this->db->where($where_not_null);
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }
}
