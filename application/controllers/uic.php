<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uic extends CI_Controller {


	function __construct(){
	   parent::__construct();
	   $this->load->library('template_admin');
	   $this->load->helper('url');
	}
	public function index(){

		$this->load->view('Home');

		
	}
	public function login()
	{
		$data['error']  = $this->uri->segment(3);
		$this->load->view('login',$data);
	}
	
}
