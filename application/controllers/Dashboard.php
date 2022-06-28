<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
   public function __construct()
    {
            parent::__construct();
            $this->load->model('ModelCustomer');

                $this->load->helper('url_helper');
		$this->load->model('auth_model');
    	if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
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
		$this->load->view('dashboard/index');
	    $this->load->view('v_footer');
	}

}