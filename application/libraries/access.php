<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access{
   public $user;
   
   function __construct()
   {      
      $this->CI =&get_instance();	  
	  $this->CI->load->helper('cookie');
	  $this->CI->load->model('muser');
	  $this->user =& $this->CI->user;
   }
   
   function login($username,$password)
   {       
       
       $result = $this->CI->muser->get_login_info($username);
	   
	   if($result)
	   {
			$password = md5($password);	   
			if($password===$result->password)
			{			   
			   $this->CI->session->set_userdata('user_id',$result->username);
			   return TRUE;
			}
			
	   }
	   else
	   {
			   return FALSE;
	   }
   }
      function setSesi($sesi){
   	  $this->CI->session->set_userdata('sesi',$sesi);
   }
   function reg_dosen($nama,$nip)
   {
       $this->CI->session->set_userdata('user_id',$nama);
	   $this->CI->session->set_userdata('nip',$nip);
   }
   function getUser()
   {
      return $this->CI->session->userdata('user_id');
   }
   function getSesi()
   {
      return $this->CI->session->userdata('sesi');
   }
   function is_login()
   {
      return (($this->CI->session->userdata('user_id'))?TRUE:FALSE);
   }
   function logout()
   {
      $this->CI->session->unset_userdata('user_id');
	  $this->CI->session->sess_destroy();
   }

}