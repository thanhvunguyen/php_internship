<?php 
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
	$maKH = $_GET["maKH"];

	if($_POST["submit_sua"]){

		$tenKH = $_POST["tenKH"];
		$diachi = $_POST["diachi"];
		$cmnd = $_POST["cmnd"];

		$db_connect = mysql_connect("localhost","root","") or die ("Khong the ket noi duoc voi DATA CSDL");
		$db_select = mysql_select_db("thuctap",$db_connect);
		$db_lang = mysql_query("SET NAMES 'utf8'");

		$sql = "UPDATE quanly_khachhang SET tenKH = '$tenKH',diachi = '$diachi',cmnd = '$cmnd' WHERE maKH = '$maKH'";
		$query = mysql_query($sql);
		header("location:homePage.php?page=quanlykhachhang");
	}
	else{

		$db_connect = mysql_connect("localhost","root","") or die ("Khong the ket noi duoc voi DATA CSDL");
		$db_select = mysql_select_db("thuctap",$db_connect);
		$db_lang = mysql_query("SET NAMES 'utf8'");

		$sql = "SELECT * FROM quanly_khachhang WHERE maKH = $maKH";
		$query = mysql_query($sql);
		$rows = mysql_fetch_array($query);

	}
?>	
<div class="form">
	<section>
		<div class="login">
			<h1>SỮA KHÁCH HÀNG</h1>
			<form method="post">
				<label>Tên Khách Hàng</label>
				<p><input type="text" name="tenKH" value="<?php if($_POST["tenKH"]){echo $_POST["tenKH"];}else{echo $rows["tenKH"];}?>" ></p>
				<label>Địa Chỉ</label>
				<p><input type="text" name="diachi" value="<?php if($_POST["diachi"]){echo $_POST["diachi"];}else{echo $rows["diachi"];}?>"></p>
				<label>Số CMND</label>
				<p><input type="text" name="cmnd" value="<?php if($_POST["cmnd"]){echo $_POST["cmnd"];}else{echo $rows["cmnd"];}?>"></p>
				<p class="submit"><input type="submit" name="submit_sua" value="THÊM MỚI"></p>
				<p class="reset"><input type="reset" name="reset_them" value="LÀM MỚI"></p>
			</form>
		</div>
	</section>
</div>