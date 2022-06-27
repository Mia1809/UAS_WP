<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelCustomer extends CI_Model
{

        public function __construct()
        {
                $this->load->database();
        }

    //manajemen Customer
    public function getCustomer($slug = FALSE)
    {
          if ($slug === FALSE)
        {
                $query = $this->db->get('customer');
                return $query->result_array();
        }

        $query = $this->db->get_where('customer', array('slug' => $slug));
        return $query->row_array();
    }
    public function Customer($where)
    {
        return $this->db->get_where('customer', $where);
    }
    public function simpanCustomer($data = null)
    {
        $data = array(
            "nama" => $this->input->post('nama'),
            "alamat" => $this->input->post('alamat'),
            "no_tlpn" => $this->input->post('no_tlpn'),
        );
        $this->db->insert('customer',$data);
    }
    public function updateCustomer($data = null)
    {
        $data = array(
            "nama" => $this->input->post('nama'),
            "alamat" => $this->input->post('alamat'),
            "no_tlpn" => $this->input->post('no_tlpn'),
        );
        $this->db->update('customer', $data, ['id'=>$this->input->post('id')]);

    }
    public function hapusCustomer($id)
    {
         return $this->db->delete('customer', array("id" => $id));
    }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
        $this->db->where($where);
        }
        $this->db->from('customer');
        return $this->db->get()->row($field);
    }
}
