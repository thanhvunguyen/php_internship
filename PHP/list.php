<?php
 $id = "";
 mysql_connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="styleList.css">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h1>Danh sách nhân viên công ty NAL Solutions</h1>
        </div>
    </div> <!-- end .row -->
    <div class="row">
        <div class="buttonCustomize pull-right">
            <button type="button" class="btn btn-success" onclick="window.location.href='create.php'">Create</button>
        </div>
    </div> <!-- end .row -->
    <div class="row">
        <table class="table table-hover table-bordered table-responsive">
            <thead class="head">
            <tr class="row">
                <th>ID</th>
                <th>ID Staff</th>
                <th>Name</th>
                <th>Address</th>
                <th>Birthday</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Options</th>
            </tr>
            </thead>
            <?php
            require_once('database.php');
                $sql = 'SELECT * FROM customer ORDER BY id_staff asc';
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                	$id=$row["id"];
                	displayRow($row);
                }

                //function display row.
                function displayRow($row) {
                	echo '<tbody>';
                	echo '<tr class="row">';
                	echo '<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">' . $row["id"] . '</td>';
                	echo '<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">' . $row['id_staff'] . '</td>';
                	echo '<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">' . $row['name'] . '</td>';
                    echo '<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">' . $row['address'] . '</td>';
                	echo '<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">' . date('d-m-Y', strtotime($row['birthday'])) . '</td>';
                	echo '<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">' . $row['phone_number'] . '</td>';
                	echo '<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">' . $row['email'] . '</td>';
                	echo '<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">';
                	echo '<a type="button" href="update.php?id='.$row['id'].'" class="btn btn-primary button_left">Update<a>';
                	echo '<a type="button" data-id="'.$row["id"].'" class="btn btn-danger button_right deleteItem">Delete</a>';
                	echo '</td>';
                	echo '</tr>';
                	echo '</tbody>';
                }
                ?>
        </table> <!--end table-->
        
                
            <?php
            $sqlBirthday = "SELECT * FROM customer WHERE DAY(birthday) = '".date("d")."' AND MONTH(birthday) = '".date("m")."' ORDER BY id_staff asc";
            $resultBirthday = mysqli_query($connection, $sqlBirthday);
            if (mysqli_num_rows($resultBirthday) >= 1) {
                while ($birthdayToday = mysqli_fetch_assoc($resultBirthday)) {
                    displayHeader();
                    displayBirthday($birthdayToday);
                }
            } else {
                echo '<label>Hôm nay không có ai sinh nhật (>_<) </label>';
            }

            function displayHeader(){
                echo '<label>Danh sách nhân viên có sinh nhật hôm nay:</label>';
                echo '<table class="table table-hover table-bordered table-responsive">';
                echo '<thead class="head">';
                echo '<tr class="row">';
                echo '<th>ID</th>';
                echo '<th>ID Staff</th>';
                echo '<th>Name</th>';
                echo '<th>Address</th>';
                echo '<th>Birthday</th>';
                echo '<th>Phone Number</th>';
                echo '<th>Email</th>';
                echo '<th>Age</th>';
                echo '</tr>';
                echo '</thead>';
            }

            
            //function display row.
            function displayBirthday($birthdayToday) {
                echo '<tbody>';
                echo '<tr class="row">';
                echo '<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">' . $birthdayToday["id"] . '</td>';
                echo '<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">' . $birthdayToday['id_staff'] . '</td>';
                echo '<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">' . $birthdayToday['name'] . '</td>';
                echo '<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">' . $birthdayToday['address'] . '</td>';
                echo '<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">' . date('d-m-Y', strtotime($birthdayToday['birthday'])) . '</td>';
                echo '<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">' . $birthdayToday['phone_number'] . '</td>';
                echo '<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">' . $birthdayToday['email'] . '</td>';
                echo '<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">';
                $yearNow = (int)date("Y");
                $year = (int)date('Y', strtotime($birthdayToday['birthday']));
                echo $yearNow - $year;
                echo '</td>';
                echo '</tr>';
                echo '</tbody>';
            } ?>
        </table> <!-- end of table -->
    </div> <!-- end .row -->
</div> <!-- end .container -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script>
    $(document).ready(function() {
        $('.deleteItem').click(function() {
            var id = $(this).data('id');
            bootbox.confirm({
                title: "Delete!",
                message: "Are you want delete?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result) {
                        document.location.href = "delete.php?id="+id;
                    }
                }
            });
        });
    });
</script>

</body>
</html>
