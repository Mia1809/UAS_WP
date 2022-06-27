<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelSiswa extends CI_Model
{

        public function __construct()
        {
                $this->load->database();
        }

    //manajemen Siswa
    public function getSiswa($slug = FALSE)
    {
          if ($slug === FALSE)
        {
                $query = $this->db->get('produk');
                return $query->result_array();
        }

        $query = $this->db->get_where('siswa', array('slug' => $slug));
        return $query->row_array();
    }
    public function SiswaWhere($where)
    {
        return $this->db->get_where('siswa', $where);
    }
    public function simpanSiswa($data = null)
    {
        $this->db->insert('siswa',$data);
    }
    public function updateSiswa($data = null, $where = null)
    {
        $this->db->update('siswa', $data, $where);
    }
    public function hapusSiswa($where = null)
    {
        $this->db->delete('siswa', $where);
    }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
        $this->db->where($where);
        }
        $this->db->from('siswa');
        return $this->db->get()->row($field);
    }
}
