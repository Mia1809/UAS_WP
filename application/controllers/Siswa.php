<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
   public function __construct()
    {
            parent::__construct();
            $this->load->model('ModelSiswa');

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
		$siswas = $this->ModelSiswa->getSiswa();
		$this->load->view('siswa/index',['siswas'=>$siswas]);
	}

	public function create(){
		 $this->load->view('v_header');
	    $this->load->view('v_sidebar');
	    $this->load->view('v_footer');
		$this->load->helper('form');
	    $this->load->library('form_validation');

	    $this->form_validation->set_rules('nis', 'Nis', 'required');
	    $this->form_validation->set_rules('kelas', 'kelas', 'required');
	    if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('siswa/create');
		}
		else
		{
		    $this->news_model->simpanSiswa();
		    $this->load->view('siswa/index');
		}
	}
}
