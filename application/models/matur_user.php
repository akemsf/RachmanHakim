<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MAtur_User extends CI_Model{


	private $table= 'user';
	
	function __construct()
	{
	   parent::__construct();
	}	
	
	public function ambil_user($num,$offset){
	   $result = $this->db->get($this->table,$num,$offset);	   
	   return $result;
	}
	public function isExist($username, $password){
	   $this->db->where('username',$username);
	   $this->db->where('password',md5($password));
	   
	   $result = $this->db->get($this->table);
	   
	   return ($result->num_rows()>0)? true:false;
	}
	public function update_user($data){
	  
	   $attr = array(
	           'username' => $data['username'], 
               'password' => md5($data['password']),
			   'role'     => $data['role']
            );
      
      $this->db->where('id',$data['id_user']);	  
      $this->db->update($this->table,$attr); 
	}
	public function update_Password($data){
	  
	   $attr = array(
               'password' => md5($data['password']),
            );
      
      $this->db->where('username',$data['username']);	  
      $this->db->update($this->table,$attr); 
	}
	public function input_user($data){
	  
	   $attr = array(
	           'id' => $data['id_user'],
			   'username' => $data['username'], 
               'password' => md5($data['password']),
			   'role' => $data['role']
            );
      $this->db->insert($this->table, $attr);      
	}
	public function delete_user($id)
	{
	  $this->db->delete($this->table, array('id' => $id)); 
	}
	public function get_login_info($username)
	{
	  
	   $this->db->where('username',$username);
	   $this->db->limit(1);
	   
	   $query = $this->db->get($this->table);
	  
	   
	   return ($query->num_rows()>0) ? $query->row() : FALSE;
	}
}
