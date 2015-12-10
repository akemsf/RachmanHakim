<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mlogin extends CI_Model{

	
	function __construct(){
	   parent::__construct();
	}	
	
	public function getUser($user){
		$query = $this->db->get_where('user',array('username' => $user['user']));
		
		if($query->num_rows()>0){
		  foreach($query->result_array() as $result){}
		  return $result;
		}
		else{
		  return FALSE; 
		}
	}	
}
