<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {
   public function __construct()
    {
            parent::__construct();
            $this->load->model('ModelInvoice');
            $this->load->model('ModelInvoiceItem');
            $this->load->model('ModelCustomer');
            $this->load->model('ModelProduk');

                $this->load->helper('url_helper');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		 $this->load->view('v_header');
	    $this->load->view('v_sidebar');
		$this->load->helper('form');
	    $this->load->library('form_validation');
		$invoicess = $this->ModelInvoice->getInvoice();
		$this->load->view('invoice/index',['invoices'=>$invoicess]);
	    $this->load->view('v_footer');
	}

	public function create(){
		 $this->load->view('v_header');
	    $this->load->view('v_sidebar');
	    $this->load->view('v_daftar_files');
	    $this->load->library('form_validation');

	    $this->form_validation->set_rules('no_invoice', 'no_invoice', 'required');
		$customers = $this->ModelCustomer->getCustomer();
		$produks = $this->ModelProduk->getProduk();
	    if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('invoice/create',['customers'=>$customers,'produks'=>$produks]);
		}
		else
		{
		    $invoice_id = $this->ModelInvoice->simpanInvoice();
    		$this->ModelInvoiceItem->simpanInvoiceItem($invoice_id);
            redirect("invoice");
		}
	}

	public function view($id){
		 $this->load->view('v_header');
	    $this->load->view('v_sidebar');
	    $this->load->view('v_daftar_files');
      	$query = $this->db->get_where('invoice', ['id'=>$id]);
     	$invoice = $query->row_array();

		$invoiceItems = $this->ModelInvoiceItem->getInvoiceItem($id);
		$this->load->view('invoice/view',['invoice'=>$invoice,'invoiceItems'=>$invoiceItems]);
	}
	public function hapus($id){
        $this->ModelInvoice->hapusInvoice($id);
            redirect("invoice");
	}
	public function edit($id){
        $this->ModelInvoice->hapusInvoice($id);
            redirect("invoice");
	}

	public function print($id){
		
      	$query = $this->db->get_where('invoice', ['id'=>$id]);
     	$invoice = $query->row_array();
		$invoiceItems = $this->ModelInvoiceItem->getInvoiceItem($id);
		$this->load->view('invoice/print',['invoice'=>$invoice,'invoiceItems'=>$invoiceItems]);

	}
}
