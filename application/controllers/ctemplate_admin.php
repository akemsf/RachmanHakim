<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CTemplate_admin extends User_Controller {

	function __construct(){
	   parent::__construct();
	   $this->load->library('template_admin');
	   $this->load->helper('url');
	}
	public function index(){
		echo 'It Works!';	    		
	}
	
	public function buka_template($template=null)
	{
	   if($template!=null)
	   {
	     $this->template_admin->display('templates/'.$template);
	   }
	   else
	   {
	     $page = $this->uri->segment(3);
	     $this->template_admin->display('templates/'.$page);
	   } 
	}
	
}
