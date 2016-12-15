<html>
<head>
	<title>CRUD_LIST</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<style>
		table td{
			text-align: center;
		}
	</style>
</head>
<body>
	<?php
	require('connect.php');
	?>
	<div class="container">
		
		<h2 style="margin-left: 350px; " class="">
			<?php
			if($_GET){
				$msg = $_GET['msg'];
				switch($msg){
					case 1: echo "<span style='color:#00afec;margin-left: -350px;margin-right: 185px;'>Thêm thành công</span>"; break;
					case 2: echo "<span style='color:#00afec;margin-left: -350px;margin-right: 185px;'>Sửa thành công</span>"; break;
					case 3: echo "<span style='color:#00afec;margin-left: -350px;margin-right: 185px;'>Xóa thành công</span>"; break;
				}
			} 	
			?>
			Danh sách sinh viên
			<a style=" float: right;" href="add.php" class="btn btn-primary btn-lg active" role="button">Thêm sinh viên</a>
			<div style="clear: both;">	</div>
		</h2>
		
		<table class="table table-bordered" id="myTable" style="">
			<thead>
				<tr>
					<th width="5%" style=" text-align: center;" >#</th>
					<th width="13%" style=" text-align: center;" >MSSV</th>
					<th width="20%" style=" text-align: center;">Họ và tên</th>
					<th width="10%" style=" text-align: center;" >Lớp</th>
					<th width="15%" style=" text-align: center;">Ngày sinh</th>
					<th width="9%" style=" text-align: center;">Giới tính</th>
					<th width="18%" style=" text-align: center;">Email</th>
					<th width="10%" style=" text-align: center;">
						Chức năng
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
	//	require('connect.php');
				$sql="select * from student";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
    // output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<tr> 
						<td> " .$row["id"]. " </td>
						<td> ". $row["id_student"]. " </td>
						<td> " . $row["name"]. " </td>
						<td> " . $row["class"]. " </td>
						<td> " . $row["birthday"]. " </td>";

						if($row["sex"] == 1){
							echo "
							<td> Nam </td>";
						}else{
							echo "
							<td>  Nữ  </td>";
						}

						echo "
						<td>" . $row["email"]. " </td>
						<td > 
							<a href='edit.php?id=".$row["id"]."' title='Sửa'>
								<span class='glyphicon glyphicon-edit' style='font-size: 20px; margin-right: 8px;'></span>
							</a>
							|
							<a href='dell.php?id=".$row["id"]."' onclick='return confirmAction()' title='Sửa'>
								<span class='glyphicon glyphicon-remove' style='font-size: 20px; margin-left: 8px;'></span>
							</a>
						</td>
					</tr>";
				}
			}
			$conn->close();
			?>
		</tbody>
	</table>
	<script type="text/javascript">
	function confirmAction() {
		return confirm("Bạn có chắc muốn xóa?")
	}
</script>
	<script>
		$(document).ready(function(){
			$('#myTable').DataTable();
		});
	</script>
</div>
</body>
</html>