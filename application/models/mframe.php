<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mframe extends CI_Model{

	
	function __construct(){
	   parent::__construct();
	}	
	
	public function getMenu($owner){
		$this->db->where('owner',$owner);
		$this->db->order_by("id", "asc"); 
		$query = $this->db->get('menu');
		
		if($query->num_rows()>0){		  
		  return $query;
		}
		else{
		  return FALSE; 
		}
	}
	public function getContent($owner){
		$query = $this->db->get_where('content',array('owner' => $owner));
		
		if($query->num_rows()>0){
		  
		  return $query;
		}
		else{
		  return FALSE; 
		}
	}	
}
