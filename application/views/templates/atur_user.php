<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url('./assets/css/template.css'); ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function edit_form(id)
{
   document.getElementById('id_user').value = document.getElementById('id_user'+id).value;
   document.getElementById('username').value = document.getElementById('user'+id).value;
   document.getElementById('password').value = document.getElementById('pass'+id).value;
   document.getElementById('role').value     = document.getElementById('role'+id).value;

}
function reset_form(id_user)
{  
   document.getElementById('id_user').value = id_user;
   document.getElementById('username').value = '';
   document.getElementById('password').value = '';
   document.getElementById('role').value     = 'admin';

}
function delete_user(id)
{
   var pesan = 'Apakah anda yakin ingin menghapus data '+document.getElementById('user'+id).value;
   if(confirm(pesan))
   {
      window.location.href= url.value+id;
   }
}
</script>
</head>
<body>
<div class="template-form">
<?php 
     $url= base_url().'index.php/catur_user/delete_user/';
	 $hidden_url = array(
	                         'name'  => 'url',
							 'id'    => 'url',
							 'value' => $url,
							 'hidden'=>'hidden'							 							 
	                     );
	 echo form_input($hidden_url);	
?>
<table id="t_user" border="0" class="table-form">
  <tr>
    <th bgcolor="#b4e2f2" width="10px" align="center">ID</th>
    <th bgcolor="#b4e2f2" width="80px" align="center">USERNAME</th>
    <th bgcolor="#b4e2f2" width="80px" align="center">PASSWORD</th>
    <th bgcolor="#b4e2f2" width="80px" align="center">ROLE</th>
	<th bgcolor="#b4e2f2" width="80px" align="center">AKSI</th>
  </tr>
<?php
	 //kalo data tidak ada didatabase
	 				 
	 if($count==0)
	 {
	 echo "<tr><td colspan='5'>- User kosong -</td></tr>";
	 }else
	 {	 
	     $no = 1;  
	     foreach($query->result() as $row)
	    {	 
		   $iduser = array(	 'name' => 'id_user'.$no,           
							 'id'   => 'id_user'.$no,
							 'value'=> $row->id,
							 'hidden'=>'hidden'
	                     );						 				 
		   echo form_input($iduser); 
		   $user = array(	 'name' => 'user'.$no,           
							 'id'   => 'user'.$no,
							 'value'=> $row->username,
							 'hidden'=>'hidden'
	                     );						 				 
		   echo form_input($user);
		   $pass = array(	 'name' => 'pass'.$no,           
							 'id'   => 'pass'.$no,
							 'value'=> $row->password,
							 'hidden'=>'hidden'
	                     );						 				 
		   echo form_input($pass);
		   $role = array(	 'name' => 'role'.$no,           
							 'id'   => 'role'.$no,
							 'value'=> $row->role,
							 'hidden'=>'hidden'
	                     );						 				 
		   echo form_input($role);
		   
	 
	 ?>
	 
	       <tr>
		     <td style="padding-left:5px" width="10px" align="left"><?php echo $row->id;?></td>
	         <td style="padding-left:5px" width="80px" align="left"><?php echo $row->username;?></td>
	         <td style="padding-left:5px" width="80px" align="left"><?php echo $row->password;?></td>
	         <td style="padding-left:5px" width="80px" align="left"><?php echo $row->role;?></td>
			 <td width="80px" align="center"><?php echo "<a style='text-decoration:none; color:red' href='#' onClick='edit_form(".$no.")'>edit</a>&nbsp;|&nbsp;<a style='text-decoration:none; color:red' href='#' onClick='delete_user(".$no.")'>hapus</a>";?></td>
	       </tr>		   
<?php		   
           $no++;
		 }  
		 
	 }
?>	 
</table>
<div class="halaman">Halaman : <?php echo $halaman; ?></div>
<!-- form olah !-->
<table border="0" class="table-form">
  <tr>
    <th bgcolor="#b4e2f2" colspan="3" align="center"><H1>PENGOLAHAN USER</H1></th>
  </tr>
  <tr>
<?php

	$this->load->helper('form');
	$attributes = array('name'=> 'content-form', 'id' => 'content-form');

	echo form_open(site_url('catur_user/olahuser'),$attributes);
	echo "<td style='padding-left:10px' height='80px' colspan='3' align='left'>";
    echo "<span>";		 
	if($error == '0'){	 
     	echo "Isilah kolom dibawah ini dengan benar.";
	}	
	else if($error == '1'){	 
     	echo "<font color='red'>*Kolom tidak boleh kosong!</font>";
	}
	else if($error == '2'){	 
     	echo "<font color='red'>*Terdapat kesalahan pengisian!</font>";
	}
	
	echo "</span>
		 </td>";
?>	  
  </tr>
  <tr>
    <td height='40px' width="80px" align="right"><strong>ID</strong></td>
	<td style="padding-left:10px" width="100px" align="left">
	<?php 
	    
	     $id_input = array(
	                      'name' => 'id_user',
						  'id'   => 'id_user',
						  'type' => 'text',
						  'class'=> 'input',
						  'value'=> $id_user,
						  'readonly' => 'readonly'
					  );
	echo form_input($id_input);?>	</td>
	<td style='padding-left:80px'><?php echo form_button('reset','Reset&nbsp;&nbsp;&nbsp;','class="button" onClick="reset_form('.$id_user.')"');?></td>
  </tr>
  <tr>
    <td height='40px' width="80px" align="right"><strong>Username</strong></td>
	<td style="padding-left:10px" width="100px" align="left">
	<?php 
	    
	     $user_input = array(
	                      'name' => 'username',
						  'id'   => 'username',
						  'type' => 'text',
						  'class'=> 'input',
						  'placeholder' => 'Username'
					  );
	echo form_input($user_input);?>	</td>
	<td style='padding-left:80px'></td>
  </tr>
  <tr>
    <td height='40px' width="80px" align="right"><strong>Password</strong></td>
	<td style="padding-left:10px" width="100px" align="left">
	<?php
	$pass_input = array(
	                      'name' => 'password',
						  'id'   => 'password',
						  'type' => 'password',
						  'class'=> 'input',
						  'placeholder' => 'Password'
						);
	echo form_input($pass_input);
	?>	</td>
	<td style='padding-left:80px'><?php echo form_submit('submit','Tambah','class = "button"');?></td>
  </tr>
  <tr>
    <td height='40px' width="80px" align="right"><strong>Role</strong></td>
	<td style="padding-left:10px" width="100px" align="left">
	<?php
	$data_role = array('admin' => 'admin','pimpinan'=>'pimpinan');
	$role = 'class = "input" id="role"';
	echo form_dropdown('role',$data_role,'',$role);
	?>	</td>
	<td style="padding-left:80px"><?php echo form_submit('submit','Edit       ','class="button"');?></td>
  </tr>
  
  <tr>
  <td colspan="3">&nbsp;</td>
  </tr>
<?php
   echo form_close(); 
?>  
</table>

<!-- end form olah !-->
</div>
</body>
</html>
