<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

</head>
<body style='height:20;'>

Selamat datang,<b><?php $this->load->library('access'); echo $this->access->getUser();?></b>. 
<a style="color:#000" href='<?php echo base_url().'index.php/clogin/logout';?>'>logout</a>
</body>
</html>