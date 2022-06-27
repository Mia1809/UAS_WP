<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelInvoice extends CI_Model
{

    public function __construct()
    {
            $this->load->database();
    }

    //manajemen Invoice
    public function getInvoice($slug = FALSE)
    {
          if ($slug === FALSE)
        {
                $query = $this->db->get('invoice');
                return $query->result_array();
        }

        $query = $this->db->get_where('invoice', array('slug' => $slug));
        return $query->row_array();
    }
    public function Invoice($where)
    {
        return $this->db->get_where('invoice', $where);
    }
    public function simpanInvoice($data = null)
    {
        $data = array(
            "customer_id" => $this->input->post('customer_id'),
            "no_invoice" => $this->input->post('no_invoice'),
            "date" => date("Y-m-d"),
        );
        $this->db->insert('invoice',$data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }
    public function updateInvoice($data = null)
    {
        $data = array(
            "nama" => $this->input->post('nama'),
            "alamat" => $this->input->post('alamat'),
            "no_tlpn" => $this->input->post('no_tlpn'),
        );
        $this->db->update('invoice', $data, ['id'=>$this->input->post('id')]);

    }
    public function hapusInvoice($id)
    {
         return $this->db->delete('invoice', array("id" => $id));
    }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
        $this->db->where($where);
        }
        $this->db->from('invoice');
        return $this->db->get()->row($field);
    }
}
