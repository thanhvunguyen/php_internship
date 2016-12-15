<?php
require('connect.php');	

$id=$_GET['id'];
			//echo $name." ".$class." ".$sex." ".$birthday." ".$email;
$sql = "DELETE FROM student WHERE id=".$id;
if ($conn->query($sql) === TRUE) {
	header("location: list.php?msg=3");
	exit();
} else {
	echo " <h4> Xóa thất bại!!! </h4>";
}

$conn->close();
?>