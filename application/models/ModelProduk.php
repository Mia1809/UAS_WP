<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelProduk extends CI_Model
{

        public function __construct()
        {
                $this->load->database();
        }

    //manajemen Produk
    public function getProduk($slug = FALSE)
    {
          if ($slug === FALSE)
        {
                $query = $this->db->get('produk');
                return $query->result_array();
        }

        $query = $this->db->get_where('produk');
        return $query->row_array();
    }
    public function Produk($where)
    {
        return $this->db->get_where('produk', $where);
    }
    public function simpanProduk($data = null)
    {
        $data = array(
            "nama" => $this->input->post('nama'),
            "harga" => $this->input->post('harga'),
            "stok" => $this->input->post('stok'),
            "kategori_id" => $this->input->post('kategori_id'),
        );
        $this->db->insert('produk',$data);
    }
    public function updateProduk($data = null, $where = null)
    {
        $this->db->update('produk', $data, $where);
    }
    public function hapusProduk($where = null)
    {
        $this->db->delete('produk', $where);
    }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
        $this->db->where($where);
        }
        $this->db->from('produk');
        return $this->db->get()->row($field);
    }
}
