<?php 
	$maKH = $_GET["maKH"];

	$db_connect = mysql_connect("localhost","root","") or die ("Khong the ket noi duoc voi DATA CSDL");
	$db_select = mysql_select_db("thuctap",$db_connect);
	$db_lang = mysql_query("SET NAMES 'utf8'");

	$sql = "DELETE FROM quanly_khachhang WHERE maKH = $maKH";
	$query = mysql_query($sql);
	header("location:homePage.php?page=quanlykhachhang");
?>