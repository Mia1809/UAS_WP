<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
   public function __construct()
    {
            parent::__construct();
            $this->load->model('ModelKategori');

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
		$kategoris = $this->ModelKategori->getKategori();
		$this->load->view('kategori/index',['kategoris'=>$kategoris]);
	    $this->load->view('v_footer');
	}

	public function create(){
		 $this->load->view('v_header');
	    $this->load->view('v_sidebar');
	    $this->load->view('v_daftar_files');
	    $this->load->library('form_validation');

	    $this->form_validation->set_rules('nama', 'nama', 'required');
	    if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('kategori/create');
		}
		else
		{
		    $this->ModelKategori->simpankategori();
            redirect("kategori");
		}
	}

	public function hapus($id){
        $this->ModelKategori->hapusKategori($id);
            redirect("kategori");
	}
	public function edit($id){
        $this->ModelKategori->hapusKategori($id);
            redirect("kategori");
	}
}
