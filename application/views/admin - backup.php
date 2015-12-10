<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrator</title>
<link rel="stylesheet" type="text/css" href= "<?php echo base_url('./assets/css/main-form.css'); ?>" />
</head>
<body marginwidth="0" marginheight="0">
Selamat datang,<b><?php $this->load->library('access'); echo $this->access->getUser();?></b>. 
<a style="color:#000" href='<?php echo base_url().'index.php/clogin/logout';?>'>logout</a>

</body>
</html>
