<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD_EDIT</title>
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
	$id = $_GET['id'];
	if(isset($_POST['submit'])){
		$id_student=$_POST['id_student'];
		$name=$_POST['name'];
		$class=$_POST['class'];
		$sex=$_POST['sex'];
		$birthday=$_POST['birthday'];
		$email=$_POST['email'];
			//echo $name." ".$class." ".$sex." ".$birthday." ".$email;
		$sql = "UPDATE student SET id_student='".$id_student."',name='".$name."',class='".$class."',sex=".$sex.",birthday='".$birthday."',email='".$email."' WHERE id=".$id;
		echo $sql;
		if ($conn->query($sql) === TRUE) {
			header("location: list.php?msg=2");
			exit();
		} else {
			echo " <h4> Sửa thất bại!!! </h4>";
		}

		$conn->close();
		
	}else{
		
		if("" != $id){
			$sql = "SELECT * FROM student where id = $id";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
		}
	}
	?>
	<div style="padding-left: 250px;"  class="container">
		<h2  style="margin-left: 210px; ">Sửa thông tin sinh viên </h2>
		<form method="POST" action="edit.php?id=<?php echo $row['id'] ;?>">
			<div class="col-xs-12 col-md-8">
				<div class="row">
					<div class="col-sm-4 col-md-4 left color_td">Mã sinh viên: </div>
					<div class="col-sm-4 col-md-4">
						<div class="form-group">
							<input type="text" class="form-control" value="<?php echo $row['id_student'] ;?>" name="id_student" minlength="6"  required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-md-4 left color_td">Họ và tên: </div>
					<div class="col-sm-8 col-md-8">
						<div class="form-group">
							<input type="text" class="form-control" value="<?php echo $row['name'] ;?>" name="name" required="">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-md-4 left color_td">Lớp: </div>
					<div class="col-sm-4 col-md-4">
						<div class="form-group">
							<input type="text" class="form-control"  value="<?php echo $row['class'] ;?>" name="class" required="" minlength="4">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-md-4 left color_td">Giới tính:</div>
					<div class="col-sm-8 col-md-8">
						<div class="form-group">
							<?php
							if(1== $row['sex'] ){
								echo "<input checked type='radio'  name='sex' required value='1'> Nam
								<input type='radio' name='sex' required value='0'> Nữ 
								";
							}else{
								echo "<input  type='radio'  name='sex' required value='1'> Nam
								<input checked type='radio' name='sex' required value='0'> Nữ 
								";
							}
							?>

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
							<input type="date" name="birthday" class="form-control" required="" value="<?php echo $row['birthday'] ;?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-md-4 left color_td">Email</div>
					<div class="col-sm-8 col-md-8">
						<div class="form-group">
							<input type="email" class="form-control" name="email" value="<?php echo $row['email'] ;?>" required="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="button">
			<input class="btn btn-primary btn-lg active" type="submit" name="submit" value="Sửa">
			<input class="btn btn-primary btn-lg active" type="reset" name="reset" value="Nhập lại">
		</div>
	</form>
</body>
</html>