<?php
    require './lib/employee.php';
    $myid = isset($_GET['id']) ? ($_GET['id']) : '';
    if ($myid){
        delete_employee($myid);
    }
    header("location: employee-list.php");
?>
