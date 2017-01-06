<?php
require_once ('database.php');
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$id_staff = $_POST['id_staff'];
		$query = "SELECT * FROM customer WHERE id_staff = '".$id_staff."'";
		$result = mysqli_query($connection, $query);
		$row = mysqli_fetch_assoc($result);
		if ($row['id'] == null) {
			echo 1;
		} else {
			echo 0;
		}
	} else {
		echo 404;
	}
 ?>
