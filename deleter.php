<?php 
	$sql = mysqli_connect("loalhost","adm_webgenerator","webgenerator2020","webgenerator");
	$query = "DELETE FROM `webs` WHERE dominio = '".$_GET["web"]."'";
	$res = mysqli_query($sql,$query);
				
	shell_exec('rm -r '.$_GET["web"]);
	header('location: panel.php');

 ?>