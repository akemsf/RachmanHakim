<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CAtur_Artikel extends User_Controller {
		
	function __construct()
	{
	   parent::__construct();
	   $this->load->model('matur_artikel');
	   $this->load->library('template_admin');
	   $this->load->helper('url');
	   $this->load->helper('form');	   	   
	}
	public function index($id=NULL,$error='0')
	{	  
	
	   $jml = $this->db->get('user');
	   $kat = $this->matur_kategori->ambil_kategori(NULL,NULL);
	   $config['base_url']   = base_url().'index.php/catur_artikel/index';
	   $config['total_rows'] = $jml->num_rows();
	   $config['per_page']   = '5';
	   $config['first_page'] = 'Awal';
	   $config['last_page']  = 'Akhir';
	   $config['next_page']  = '&laquo;';
	   $config['prev_page']  = '&raquo;';
	   
	   $this->pagination->initialize($config);
	   $data['kategori']= $kat->result();
	   $data['halaman'] = $this->pagination->create_links();	   	   	   	
	   $data['query']   = $this->matur_artikel->ambil_artikel($config['per_page'],$id);	   
	   $data['error']   = $error;
       $data['id_user'] = $jml->num_rows()+1;
	   $data['lastid'] = 'b'.$last;
	   $data['count'] = $jml->num_rows();
       $this->template_admin->display('templates/atur_artikel',$data);	    
	   
	   	 
	}
	function delete_artikel()
	{
	   $id = $this->uri->segment(3);
	   $this->matur_artikel->delete_artikel($id);
	   $this->index();
	}
	function olahartikel()
	{ 
      $data['id_artikel']  = $this->input->post('id_artikel');
	  $data['judul'] = $this->input->post('judul');
	  $data['kategori'] = $this->input->post('kategori'); 
	  
      if($this->isValid())
	  {
	    if($this->input->post('submit')=='Tambah'){
	       $this->matur_artikel->input_artikel($data);
	    }
	    else
	    {
	       $this->matur_artikel->update_artikel($data);
	    } 
	    $this->index();
	  }
	  else
	  {
	    $this->index('','1');
	  }
	}
	function ubahartikel()
	{ 
	  $data['id_artikel']  = $this->input->post('id_artikel');
	  $data['judul'] = $this->input->post('judul'); 
	  $data['kategori'] = $this->input->post('kategori'); 
      
	  if($this->matur_user->isExist($data['id_artikel'])){
						
			$this->matur_artikel->update_artikel($data);
			echo "<script type='text/javascript'>alert('Ubah Data Artikel Berhasil!')</script>";
						
		}
		else
		{
			echo "<script type='text/javascript'>alert('Ubah Data Artikel Gagal!')</script>";
		}	   
	  
	  $this->load->library('template_admin');
	  $this->template_admin->display('templates/wellcome_admin');
	  
	  	
	}
	
	public function isValid()
	{
	    $data['id_artikel']  = $this->input->post('id_artikel');
	    $data['judul'] = $this->input->post('judul'); 
	    $data['kategori'] = $this->input->post('kategori'); 
		
		if($data['id_artikel']==""||$data['judul']==""||$data['kategori']=="")
		{
		   return FALSE;
		}
		else
		{
		   return TRUE;
		}
	}
	
}
