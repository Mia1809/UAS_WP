<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
   public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelProduk');
        $this->load->model('ModelKategori');
		$this->load->helper('url_helper');
		$this->load->model('auth_model');
		// if(!$this->auth_model->current_user()){
		// 	redirect('auth/login');
		// }
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
		$produks = $this->ModelProduk->getProduk();
		$this->load->view('produk/index',['produks'=>$produks]);
	    $this->load->view('v_footer');
	}

	public function create(){
		 $this->load->view('v_header');
	    $this->load->view('v_sidebar');
	    $this->load->view('v_daftar_files');
	    $this->load->library('form_validation');

	    $this->form_validation->set_rules('nama', 'nama', 'required');
	    $this->form_validation->set_rules('harga', 'harga', 'required');
	    $this->form_validation->set_rules('stok', 'stok', 'required');
	    $this->form_validation->set_rules('kategori_id', 'kategori_id', 'required');
		$kategoris = $this->ModelKategori->getKategori();
	    if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('produk/create',['kategoris'=>$kategoris]);
		}
		else
		{
		    $this->ModelProduk->simpanproduk();
            redirect("produk");
		}
	}
}
