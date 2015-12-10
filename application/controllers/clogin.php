<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CLogin extends CI_Controller {

	function __construct()
	{
	   parent::__construct();

	   $this->load->library('template_admin');
	   $this->load->library('access');

	   $this->load->helper('url');	   	   
	}
	public function index(){
		echo 'It Works!';	    		
		
	}
	
	public function ceklogin()
	{	
	
		$this->load->library('form_validation');	   	
		$data['user'] = $this->input->post('username');
		$data['pass'] = $this->input->post('password');
		
		$this->form_validation->set_rules('username','Username','callback_cek');
		
	  if($this->isValid())
	  {
		if($this->form_validation->run())
		{
           	$this->template_admin->display('templates/wellcome_admin');			
		}	   
      }
      else
      {
  		 $attr['error'] = "1";
		 $this->load->view('login',$attr); 
      }	 		  		
	}

	public function isValid()
	{
	    $data['user'] = $this->input->post('username');
		$data['pass'] = $this->input->post('password');
		
		if($data['user']==""||$data['pass']=="")
		{
		   return FALSE;
		}
		else
		{
		   return TRUE;
		}
	}
	function cek()
	{
	    $user = $this->input->post('username');
		$pass = $this->input->post('password');
		
		$login = $this->access->login($user,$pass);   
		
		if($login)
		{
		   return TRUE;
		}
		else
		{
		   return FALSE;
		}
	}
	public function logout()
	{
	   $this->access->logout();
	   redirect('');
	}
	public function kembali()
	{
	   redirect('');
	}
	
}
