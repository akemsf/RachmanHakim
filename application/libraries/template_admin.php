<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_Admin{
   protected $__ci;
   
   function __construct(){
      $this->__ci = &get_instance();	  
   }
   
   function display($template,$data=NULL)
   {
      $data1['__content']   = $this->__ci->load->view($template,$data,true);
	  $data1['__header']    = $this->__ci->load->view('templates/user_banner',$data,true);
	  $data1['__menu']      = $this->__ci->load->view('templates/menu_admin',$data,true);	  	  
	  
	  $this->__ci->load->view('/admin',$data1);
	  
   }
   function buka_template($template)
   {	   
	     $this->display('templates/'.$template);	   
   }
}