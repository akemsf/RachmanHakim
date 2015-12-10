
<html>
<head>
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href= "<?php echo base_url('./assets/css/login.css'); ?>" />
<script type="text/javascript">
function kembali()
{
   window.location.href="<?php echo base_url().'clogin/kembali';?>";
}
</script>
</head>
<body>
<div id="wrapper">
<?php

	$this->load->helper('form');
	$attributes = array('class'=>'login-form', 'name'=> 'login-form');
	
	echo form_open(base_url().'index.php/clogin/ceklogin',$attributes);	
	
	echo "<div class='header'>
		 <h1>Login</h1>
		 <span>";
	if($error == '0'){	 
     	echo "Isilah kolom username dan password dibawah ini dengan benar.";
	}	
	else if($error == '1'){	 
     	echo "<font color='red'>*Kolom username dan password tidak boleh kosong!</font>";
	}
	else if($error == '2'){	 
     	echo "<font color='red'>*username/password salah atau tidak terdaftar!</font>";
	}
	
	echo "</span>
		 </div>";
		
	echo "<div class='content'>";	
	
	$user_input = array(
	                      'name' => 'username',
						  'type' => 'text',
						  'class'=> 'input username',
						  'placeholder' => 'Username'
						);
	echo form_input($user_input);
	echo "<div class='user-icon'></div>";
	
	$pass_input = array(
	                      'name' => 'password',
						  'type' => 'password',
						  'class'=> 'input password',
						  'placeholder' => 'Password'
						);
	echo form_input($pass_input);
	echo "<div class='pass-icon'></div>";

	echo "</div>
		  <div class='footer'>";
		  
	$submit = 'class = "button"';
	echo form_submit('submit','Login',$submit);
    
	echo "<div class='button'>";
	echo "<a style='text-decoration:none; color:#fff;' href='";
	echo base_url()."clogin/kembali";
	echo "'>
          Kembali
          </a>
          </div>
	      </div>
		  ";
	echo form_close();	  
echo "</div>
	      <div class='gradient'></div>	     
		 ";
?>	
		
</body>
</html>