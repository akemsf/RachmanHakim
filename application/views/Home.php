
<html>
<head>
<title>Akemsf Comment</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href= "<?php echo base_url('./assets/css/main.css'); ?>" />
<script type="text/javascript">

</script>
</head>
<body>
<div id="wrapper">
<center>
<img src="<?php echo base_url('./assets/images/materials/gg1.png'); ?>" width="900" height="300" alt=""></td>
<

<?php

	
	$this->load->helper('form');
	$attributes = array('class'=>'login-form', 'name'=> 'login-form');
	
	echo form_open(base_url().'index.php/uic/login',$attributes);	
		
	echo "<div class='footer'>";
		  
	$submit = 'class = "button"';
	echo form_submit('submit','Yes, Im Curious',$submit);
    
	echo form_close();	  
?>
</center>	
		
</body>
</html>