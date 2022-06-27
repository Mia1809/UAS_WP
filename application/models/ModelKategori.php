<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelKategori extends CI_Model
{

        public function __construct()
        {
                $this->load->database();
        }

    //manajemen Kategori
    public function getKategori($slug = FALSE)
    {
          if ($slug === FALSE)
        {
                $query = $this->db->get('kategori');
                return $query->result_array();
        }

        $query = $this->db->get_where('kategori', array('slug' => $slug));
        return $query->row_array();
    }
    public function Kategori($where)
    {
        return $this->db->get_where('kategori', $where);
    }
    public function simpanKategori($data = null)
    {
        $data = array(
            "nama" => $this->input->post('nama'),
        );
        $this->db->insert('kategori',$data);
    }
    public function updateKategori($data = null)
    {
        $data = array(
            "nama" => $this->input->post('nama'),
        );
        $this->db->update('kategori', $data, ['id'=>$this->input->post('id')]);

    }
    public function hapusKategori($id)
    {
         return $this->db->delete('kategori', array("id" => $id));
    }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
        $this->db->where($where);
        }
        $this->db->from('kategori');
        return $this->db->get()->row($field);
    }
}
