<?php $this->load->view("templates/admin/header.php"); ?>
	<?php 
		$Controller=$this->router->fetch_class();
		$Controller=str_replace(array('Admin_','admin_'),array('',''),$Controller);
		$Method=$this->router->fetch_method();
		$this->load->view("/admin/{$Controller}/{$Method}")
	 ?>
<?php $this->load->view("templates/admin/footer.php") ?>