<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inbox_model extends CI_Model
{

    public function insert_data_pensiun($data1, $data2, $data3)
    {
        $this->db->insert('id_pensiun', $data1);
        $data3['id'] = $data2['id'] = $this->db->insert_id();
        $this->db->insert('file_pensiun', $data2);
        $this->db->insert('tracking', $data3);
    }

    public function get_details($id = NULL)
    {
        if ($id == NULL) {
            $this->db->select('*');
            $this->db->from('id_pensiun a');
            $this->db->join('file_pensiun b', 'b.id=a.id', 'left');
            $this->db->join('tracking c', 'c.id=a.id', 'left');
            $query = $this->db->get();
            if ($query->num_rows() != 0) {
                return $query->result_array();
            } else {
                return NULL;
            }
        } else {
            $this->db->select('*');
            $this->db->from('id_pensiun a');
            $this->db->join('file_pensiun b', 'b.id=a.id', 'left');
            $this->db->join('tracking c', 'c.id=a.id', 'left');
            $this->db->where('a.id', $id);
            $query = $this->db->get();
            if ($query->num_rows() != 0) {
                return $query->row_array();
            } else {
                return NULL;
            }
        }
    }

    public function get_inbox_satker($satker)
    {
        $this->db->select('*');
        $this->db->from('id_pensiun a');
        $this->db->join('file_pensiun b', 'b.id=a.id', 'left');
        $this->db->where('a.satker', $satker);
        $this->db->where("b.file_jawaban IS NOT NULL");
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    public function get_inbox_rowai()
    {
        $this->db->select('*');
        $this->db->from('id_pensiun a');
        $this->db->join('tracking c', 'c.id=a.id', 'left');
        $this->db->where("c.is_rollback IS NULL OR FALSE");
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    public function update_reply($id, $data1, $data2, $data3)
    {
        $this->db->where('id', $id)->update('id_pensiun', $data1);
        $this->db->where('id', $id)->update('file_pensiun', $data2);
        $this->db->where('id', $id)->update('tracking', $data3);
    }

    public function update_tracking($id, $data1, $data3)
    {
        $this->db->where('id', $id)->update('id_pensiun', $data1);
        $this->db->where('id', $id)->update('tracking', $data3);
    }
}
