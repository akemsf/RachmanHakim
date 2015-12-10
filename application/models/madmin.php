<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Madmin extends CI_Model{

	
	function __construct(){
	   parent::__construct();
	}	
	
	public function insertMenu($menu){
		$query = $this->db->insert('menu',$menu);
		
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	public function insertContent($content){
		$query = $this->db->insert('content',$content);
		
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	
	public function deleteMenu($menu,$owner){
	    $this->db->where('name',$menu)->where('owner',$owner);
		$this->db->delete('menu');
		
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	public function deleteContent($content,$owner){
		$this->db->where('name',$content)->where('owner',$owner);
		$this->db->delete('content');
		
		return ($this->db->affected_rows() != 1) ? false : true;
	}	
}
