<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CAtur_User extends User_Controller {
		
	function __construct()
	{
	   parent::__construct();
	   $this->load->model('matur_user');
	   $this->load->library('template_admin');
	   $this->load->helper('url');
	   $this->load->helper('form');	   	   
	}
	public function index($id=NULL,$error='0')
	{	  
	
	   $jml = $this->db->get('user');
	   
	   $config['base_url']   = base_url().'index.php/catur_user/index';
	   $config['total_rows'] = $jml->num_rows();
	   $config['per_page']   = '5';
	   $config['first_page'] = 'Awal';
	   $config['last_page']  = 'Akhir';
	   $config['next_page']  = '&laquo;';
	   $config['prev_page']  = '&raquo;';
	   
	   $this->pagination->initialize($config);
	   
	   $data['halaman'] = $this->pagination->create_links();	   	   	   	
	   $data['query']   = $this->matur_user->ambil_user($config['per_page'],$id);	   
	   $data['error']   = $error;
       $data['id_user'] = $jml->num_rows()+1;
	   $data['count'] = $jml->num_rows();
       $this->template_admin->display('templates/atur_user',$data);	    
	   
	   	 
	}
	function delete_user()
	{
	   $id = $this->uri->segment(3);
	   $this->matur_user->delete_user($id);
	   $this->index();
	}
	function olahuser()
	{ 
      $data['id_user']  = $this->input->post('id_user');
	  $data['username'] = $this->input->post('username');
	  $data['password'] = $this->input->post('password'); 
	  $data['role']     = $this->input->post('role'); 
	  
      if($this->isValid())
	  {
	    if($this->input->post('submit')=='Tambah'){
	       $this->matur_user->input_user($data);
	    }
	    else
	    {
	       $this->matur_user->update_user($data);
	    } 
	    $this->index();
	  }
	  else
	  {
	    $this->index('','1');
	  }
	}
	function ubahuser()
	{ 
	  $data['username'] = $this->input->post('username');
	  $data['password'] = $this->input->post('password_lama'); 
	  $data['newpass']  = $this->input->post('password_baru'); 
	  $data['konpass']  = $this->input->post('konfirmasi_password'); 
	  $data['role']	    = $this->input->post('role'); 
      if(strcmp($data['newpass'],$data['konpass'])==0)
	  {	    
		if($this->matur_user->isExist($data['username'],$data['password'])){
			
			$data['passsword'] = $data['newpass'];
			$this->matur_user->update_password($data);
			echo "<script type='text/javascript'>alert('Ubah Password Berhasil!')</script>";
						
		}
		else
		{
			echo "<script type='text/javascript'>alert('Password lama tidak cocok!')</script>";
		}	   
	  }
	  else
	  {
	    echo "<script type='text/javascript'>alert('Konfirmasi Password tidak cocok!')</script>";
	  }
	  
	  if($data['role']=='admin'){
	    $this->load->library('template_admin');
		$this->template_admin->display('templates/wellcome_admin');
	  }
	  else if($data['role']=='pimpinan'){
	    $this->load->library('template_pimpinan');
		$this->template_pimpinan->display('templates/wellcome_pimpinan');
	  }
	  else if($data['role']=='dosen'){
	    $this->load->library('template');
		$this->template->display('templates/wellcome_dosen');
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
	
}
