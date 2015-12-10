<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Muser extends CI_Model{

	private $table= 'user';
	
	function __construct()
	{
	   parent::__construct();
	}	
	
	public function get_login_info($username)
	{
	  
	   $this->db->where('username',$username);
	   $this->db->limit(1);
	   
	   $query = $this->db->get($this->table);
	  
	   
	   return ($query->num_rows()>0) ? $query->row() : FALSE;
	}	

}
