<?php 
	if($_POST["submit_them"]){
		if($_POST["tenKH"]){
			$tenKH = $_POST["tenKH"];
		}
		else{
			$erro = "khong duoc bo trong truong nao";
		}

		if($_POST["diachi"]){
			$diachi = $_POST["diachi"];
		}
		else{
			$erro = "khong duoc bo trong truong nao";
		}
		if($_POST["cmnd"]){
			$cmnd = $_POST["cmnd"];
		}
		else{
			$erro = "khong duoc bo trong truong nao";
		}
		if($erro){
			echo "<script>alert(\"$erro\")</script>";
			echo "<meta http-equiv=\"refresh\" content=\"0;url=homePage.php?page=formkhachhang\">";
		}
		else{
			$connect_db = mysql_connect("localhost", "root", "");
			$select_db = mysql_select_db("thuctap", $connect_db);
			$set_lang = mysql_query("SET NAMES 'utf8'");	
			$sql = "INSERT INTO quanly_khachhang(tenKH,diachi,cmnd) 
					VALUES('$tenKH', '$diachi', '$cmnd')";
			$query = mysql_query($sql);
			header("location:homePage.php?page=quanlykhachhang");
		}
	}
?>
<div class="form">
	<section>
		<div class="login">
			<h1>THÊM KHÁCH HÀNG</h1>
			<form method="post">
				<label>Tên Khách Hàng</label>
				<p><input type="text" name="tenKH" value="" ></p>
				<label>Địa Chỉ</label>
				<p><input type="text" name="diachi" value=""></p>
				<label>Số CMND</label>
				<p><input type="text" name="cmnd" value=""></p>
				<p class="submit"><input type="submit" name="submit_them" value="THÊM MỚI"></p>
				<p class="reset"><input type="reset" name="reset_them" value="LÀM MỚI"></p>
			</form>
		</div>
	</section>
</div>