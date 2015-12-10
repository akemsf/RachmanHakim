<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url('./assets/css/template.css'); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="template-form">
<H1 style="padding">PANEL ADMINISTRATOR</H1>

<h3>UBAH PASSWORD</h3>
<?php

	$this->load->helper('form');
	$this->load->library('access');
	$attributes = array('name'=> 'content-form', 'id' => 'content-form');

	echo form_open(site_url('catur_user/ubahuser'),$attributes);
	
	$role_input = array(
	                      'name' => 'role',
						  'id'   => 'role',
						  'type' => 'text',
						  'hidden'=>'hidden',
						  'value'=> 'admin'
					  );
	echo form_input($role_input);
?>	
<table align="center" width="400px" class="table-form" style="background:#f3f3f3; width:400px; margin-left:25%;">
  <tr>
  <td colspan="2" height="80px"></td>
  </tr> 	
  <tr>
    <td height='60px' width="170px" align="right"><strong>Username</strong></td>
	<td style="padding-left:10px" align="left">
	<?php 
	    
	     $user_input = array(
	                      'name' => 'username',
						  'id'   => 'username',
						  'type' => 'text',
						  'class'=> 'input',
						  'value'=> $this->access->getUser(),
						  'readonly'=> 'readonly'
					  );
	echo form_input($user_input);?>	</td>
  </tr>
  <tr>
    <td height='60px' width="170px" align="right"><strong>Password Lama</strong></td>
	<td style="padding-left:10px" align="left">
	<?php
	$pass_input = array(
	                      'name' => 'password_lama',
						  'id'   => 'password_lama',
						  'type' => 'password',
						  'class'=> 'input',
						  'placeholder' => 'Password Lama'
						);
	echo form_input($pass_input);
	?>	</td>
  </tr>
  <tr>
    <td height='60px' width="170px" align="right"><strong>Password Baru</strong></td>
	<td style="padding-left:10px" align="left">
	<?php
	$newpass_input = array(
	                      'name' => 'password_baru',
						  'id'   => 'password_baru',
						  'type' => 'password',
						  'class'=> 'input',
						  'placeholder' => 'Password Baru'
						);
	echo form_input($newpass_input);
	?>	</td>
  </tr>
  <tr>
    <td height='60px' width="170px" align="right"><strong>Konfirmasi Password</strong></td>
	<td style="padding-left:10px"align="left">
	<?php
	$konpass_input = array(
	                      'name' => 'konfirmasi_password',
						  'id'   => 'konfirmasi_password',
						  'type' => 'password',
						  'class'=> 'input',
						  'placeholder' => 'Konfirmasi Password'
						);
	echo form_input($konpass_input);
	?>	</td>
  </tr>
  <tr>
  <td height="20px" colspan="2"></td>
  </tr>
    <tr>
  <td colspan="2" height="40px"><?php echo form_submit('submit','Submit','class="button" style="width:100%"');?></td>
  </tr>
</table>
<?php echo form_close(); ?>
</div>
</div>
</body>
</html>
