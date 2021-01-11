<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function get_jumlah_pegawai($satker = NULL)
    {
        if ($satker == NULL) {
            $query = $this->db->get('daftar_pegawai');
            if ($query->num_rows() != 0) {
                return $query->num_rows();
            } else {
                return 0;
            }
        } else {
            $query = $this->db->where('satker', $satker)->get('daftar_pegawai');
            if ($query->num_rows() != 0) {
                return $query->num_rows();
            } else {
                return 0;
            }
        }
    }

    public function get_daftar_pegawai_akan_pensiun($satker = NULL)
    {
        if ($satker == NULL) {
            $query = $this->db->where('bup BETWEEN "' . date('Y-m-d', time()) . '" AND "'
                . date('Y-m-d', strtotime(date('Y', time()) . "-12-31")) . '"')
                ->get('daftar_pegawai');
            if ($query->num_rows() != 0) {
                return $query->result_array();
            } else {
                return 0;
            }
        } else {
            $query = $this->db->where('bup BETWEEN "' . date('Y-m-d', time()) . '" AND "'
                . date('Y-m-d', strtotime(date('Y', time()) . "-12-31")) . '"')->where('satker', $satker)
                ->get('daftar_pegawai');
            if ($query->num_rows() != 0) {
                return $query->result_array();
            } else {
                return 0;
            }
        }
    }

    public function get_pegawai_akan_pensiun($satker = NULL)
    {
        if ($satker == NULL) {
            $query = $this->db->where('bup BETWEEN "' . date('Y-m-d', time()) . '" AND "'
                . date('Y-m-d', strtotime(date('Y', time()) . "-12-31")) . '"')
                ->get('daftar_pegawai');
            if ($query->num_rows() != 0) {
                return $query->num_rows();
            } else {
                return 0;
            }
        } else {
            $query = $this->db->where('bup BETWEEN "' . date('Y-m-d', time()) . '" AND "'
                . date('Y-m-d', strtotime(date('Y', time()) . "-12-31")) . '"')->where('satker', $satker)
                ->get('daftar_pegawai');
            if ($query->num_rows() != 0) {
                return $query->num_rows();
            } else {
                return 0;
            }
        }
    }

    public function get_pegawai_diproses($satker = NULL)
    {
        if ($satker == NULL) {
            $this->db->select('*');
            $this->db->from('id_pensiun a');
            $this->db->join('tracking c', 'c.id=a.id', 'left');
            $this->db->where('c.sampai_karowai', TRUE);
            $this->db->where('c.sampai_satker IS NULL OR TRUE');
            $query = $this->db->get();
            if ($query->num_rows() != 0) {
                return $query->num_rows();
            } else {
                return 0;
            }
        } else {
            $this->db->select('*');
            $this->db->from('id_pensiun a');
            $this->db->join('tracking c', 'c.id=a.id', 'left');
            $this->db->where('a.satker', $satker);
            $this->db->where('c.sampai_karowai', TRUE);
            $this->db->where('c.sampai_satker IS NULL OR TRUE');
            $query = $this->db->get();
            if ($query->num_rows() != 0) {
                return $query->num_rows();
            } else {
                return 0;
            }
        }
    }

    public function get_pegawai_selesai($satker = NULL)
    {
        if ($satker == NULL) {
            $this->db->select('*');
            $this->db->from('id_pensiun a');
            $this->db->join('tracking c', 'c.id=a.id', 'left');
            $this->db->where('c.sampai_satker', TRUE);
            $query = $this->db->get();
            if ($query->num_rows() != 0) {
                return $query->num_rows();
            } else {
                return 0;
            }
        } else {
            $this->db->select('*');
            $this->db->from('id_pensiun a');
            $this->db->join('tracking c', 'c.id=a.id', 'left');
            $this->db->where('a.satker', $satker);
            $this->db->where('c.sampai_satker', TRUE);
            $query = $this->db->get();
            if ($query->num_rows() != 0) {
                return $query->num_rows();
            } else {
                return 0;
            }
        }
    }
}
