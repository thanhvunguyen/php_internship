<?php
require_once ('database.php');
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$phone_number = $_POST['phone_number'];
		$query = "SELECT * FROM customer WHERE phone_number = '".$phone_number."'";
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
