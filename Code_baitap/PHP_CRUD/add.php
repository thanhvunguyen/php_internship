<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD_ADD</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<style>
		.color_td{
			background-color: #eef1f5;
		}
		.button{
			text-align: center;
		}
		h4{
			color: red;
			margin-left: 555px;
		}
	</style>
</head>
<body>
	<?php
	require('connect.php');
	if(isset($_POST['submit'])){
		$id_student=$_POST['id_student'];
		$sql="select * from student where id_student='".$id_student."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0)
		{
		//	document.getElementById("erro").innerHTML  "Mã sinh viên đã tồn tại";
			echo " <h4> Mã sinh viên đã tồn tại!!! </h4>";
		}else{
			$name=$_POST['name'];
			$class=$_POST['class'];
			$sex=$_POST['sex'];
			$birthday=$_POST['birthday'];
			$email=$_POST['email'];
		//	echo $name." ".$class." ".$sex." ".$birthday." ".$email;
			$sql = "INSERT INTO student (id_student, name, class,birthday,sex,email)
			VALUES ('".$id_student."', '".$name."','".$class."','".$birthday."',".$sex.",'".$email."')";
			//echo $sql;
			if ($conn->query($sql) === TRUE) {
				header("location: list.php?msg=1");
				exit();
			} else {
				echo " <h4> Thêm thất bại!!! </h4>";
			}

			$conn->close();
		}
	}
	?>
	<div style="padding-left: 250px;"  class="container">
		<h2  style="margin-left: 210px; ">Thêm sinh viên </h2>
		<form method="POST" action="add.php">
			<div class="col-xs-12 col-md-8">
				<div class="row">
					<div class="col-sm-4 col-md-4 left color_td">Mã sinh viên: </div>
					<div class="col-sm-4 col-md-4">
						<div class="form-group">
							<input type="text" class="form-control" name="id_student" minlength="6"  required>
						</div>
					</div>
					<span id="erro" class=""></span>
				</div>
				<div class="row">
					<div class="col-sm-4 col-md-4 left color_td">Họ và tên: </div>
					<div class="col-sm-8 col-md-8">
						<div class="form-group">
							<input type="text" class="form-control" name="name" required="">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-md-4 left color_td">Lớp: </div>
					<div class="col-sm-4 col-md-4">
						<div class="form-group">
							<input type="text" class="form-control" name="class" required="" minlength="4">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-md-4 left color_td">Giới tính:</div>
					<div class="col-sm-8 col-md-8">
						<div class="form-group">
							<input type="radio" class="" name="sex" required="" value="1"> Nam
							<input type="radio" class="" name="sex" required="" value="0"> Nữ  
						</div>
					</div>
				</div>
				<div class="row" style="margin-bottom: 15px;">
					<div class="col-sm-4 col-md-4 left color_td">Ngày sinh</div>
					<div class="col-sm-8 col-md-8">
						<div class="input-group date" data-provide="datepicker">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
							<input type="date" name="birthday" class="form-control" required="">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-md-4 left color_td">Email</div>
					<div class="col-sm-8 col-md-8">
						<div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="abc@gmail.com" required="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="button">
			<input class="btn btn-primary btn-lg active" type="submit" name="submit" value="Thêm">
			<input class="btn btn-primary btn-lg active" type="reset" name="reset" value="Nhập lại">
		</div>
	</form>
</body>
</html>