<?php
/**
 * Created by PhpStorm.
 * User: tranthanh
 * Date: 14/12/2016
 * Time: 16:08
 */

require_once ('database.php');
	$id = "";
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $id = $_GET['id'];
        $query = "DELETE FROM customer WHERE id = '$id'";
		$result = mysqli_query($connection, $query);
		if($result) {
			header('Location:list.php');
		}
		mysql_close($connection);

	} else {
		echo "Page not found!";
	}

?>