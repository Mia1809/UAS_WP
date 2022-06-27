<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
   public function __construct()
    {
            parent::__construct();
            $this->load->model('ModelCustomer');

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
		$customers = $this->ModelCustomer->getCustomer();
		$this->load->view('customer/index',['customers'=>$customers]);
	    $this->load->view('v_footer');
	}

	public function create(){
		 $this->load->view('v_header');
	    $this->load->view('v_sidebar');
	    $this->load->view('v_daftar_files');
	    $this->load->library('form_validation');

	    $this->form_validation->set_rules('nama', 'nama', 'required');
	    $this->form_validation->set_rules('alamat', 'alamat', 'required');
	    $this->form_validation->set_rules('no_tlpn', 'no_tlpn', 'required');
	    if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('customer/create');
		}
		else
		{
		    $this->ModelCustomer->simpanCustomer();
            redirect("customer");
		}
	}

	public function hapus($id){
        $this->ModelCustomer->hapusCustomer($id);
            redirect("customer");
	}
	public function edit($id){
        $this->ModelCustomer->hapusCustomer($id);
            redirect("customer");
	}
}
