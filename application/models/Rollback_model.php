<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rollback_model extends CI_Model
{
    public function get_data($satker)
    {
        $where_not_null = "b.is_rollback IS NOT NULL";
        $this->db->select('*');
        $this->db->from('id_pensiun a');
        $this->db->join('tracking b', 'b.id=a.id', 'left');
        $this->db->where('a.satker', $satker);
        $this->db->where($where_not_null);
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    public function get_data_details($id)
    {
        $this->db->select('*');
        $this->db->from('id_pensiun a');
        $this->db->join('file_pensiun b', 'b.id=a.id', 'left');
        $this->db->join('tracking c', 'c.id=a.id', 'left');
        $this->db->where('a.id', $id);
        $this->db->where('c.is_rollback', TRUE);
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->row_array();
        } else {
            return NULL;
        }
    }

    public function update_data($id, $data1, $data2, $data3)
    {
        $this->db->where('id', $id)->update('id_pensiun', $data1);
        $this->db->where('id', $id)->update('file_pensiun', $data2);
        $this->db->where('id', $id)->update('tracking', $data3);
    }
}
