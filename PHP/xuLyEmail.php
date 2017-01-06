<?php
require_once ('database.php');
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$email = $_POST['email'];
		$query = "SELECT * FROM customer WHERE email = '".$email."'";
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
