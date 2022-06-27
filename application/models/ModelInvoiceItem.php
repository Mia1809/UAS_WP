<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelInvoiceItem extends CI_Model
{

    public function __construct()
    {
            $this->load->database();
    }

    //manajemen Invoice
    public function getInvoiceItem($slug = FALSE)
    {
          if ($slug === FALSE)
        {
                $query = $this->db->get('invoice_item');
                return $query->result_array();
        }
        $query = $this->db->get_where('invoice_item', array('id' => 8));
  
        return $query->result_array();
    }
    public function Invoice($where)
    {
        return $this->db->get_where('invoice', $where);
    }
    public function simpanInvoiceItem($invoice_id)
    {
        foreach ($this->input->post('produk') as $key => $value) {

            $data = array(
                "produk_id" => $value,
                "quantity" => $this->input->post('quantity')[$key],
                "invoice_id"    =>$invoice_id
            );

            $this->db->insert('invoice_item',$data);
        }
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
