<?php 
	ob_start();
  	session_start();
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang Chu</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="style/custom.css" rel="stylesheet" type="text/css" >
	<link href="style/bootstrap.min.css" rel="stylesheet" type="text/css">

</head>
<body class="home_page">
	<?php
		if($_SESSION["user"] && $_SESSION["pass"]){
	?>
	
	
					
				<div class="contentRight col-sm-8">
					<?php 
						switch($_GET["page"]){
							
							case "quanlykhachhang": include_once("quanlykhachhang.php");
							break;
							case "formkhachhang": include_once("formkhachhang.php");
							break;
							case "suakhachhang": include_once("suakhachhang.php");
							break;
							case "xoakhachhang": include_once("xoakhachhang.php");
							break;

							
						}
					?>
		

	<?php
		}
		else{
			header("location:index.php");
		}
	?>
	
	<script src="style/jquery.js" type="text/javascript"></script>
	<script src="style/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>