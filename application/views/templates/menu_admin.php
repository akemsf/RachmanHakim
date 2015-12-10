<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url('./assets/css/menu.css'); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="menu">
      <?php 
	     $this->load->model('mframe');
		 $menu = $this->mframe->getMenu('admin');
		 
		 if($menu!=false)
		 {
		   $top = 270;
		   foreach($menu->result() as $data1)
		   {		     
			$this->load->helper('url');
			echo "<div class='menu_button' style='top:".$top."px;'>";
			echo "<a style='text-decoration:none; color:#fff;' href='";
			echo base_url()."index.php/".$data1->content."'>";
			echo $data1->value;
			echo "</a></div>";
			$top+=40;
		   }
		 }
	  ?>
</div>
</body>
</html>
