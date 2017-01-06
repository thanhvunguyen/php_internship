<?php
require_once 'database.php';

$id_staff = isset($_POST['id_staff'])? $_POST['id_staff'] : '';
$name = isset($_POST['name'])? $_POST['name'] : '';
$phone_number = isset($_POST['phone_number'])? $_POST['phone_number'] : '';
$address = isset($_POST['address'])? $_POST['address'] : '';
$email = isset($_POST['email'])? $_POST['email'] : '';
$birthday = isset($_POST['datepicker'])? $_POST['datepicker'] : '';
$successMesage = "";

if (isset($_POST['insert'])) {
    $successMesage .= insert($connection);
    mysqli_close($connection);
}

function insert($connection) {
    $successMesage = "";
    $id_staff = ($_POST['id_staff']);
    // Function addcslashes to avoid SQL Injection
    $address = $_POST['address'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone_number = addslashes($_POST['phone_number']);
    $birthday = $_POST['datepicker'];
    $sql = "INSERT INTO customer (id_staff, name, address, email, phone_number, birthday) VALUES ('{$id_staff}','{$name}','{$address}','{$email}', '{$phone_number}', '{$birthday}')";
    if (mysqli_query($connection, $sql)) {
        $successMesage .= '<div class="alert alert-success" role="alert">Insert Successfully, Welcome to NAL Solutions!</div>';
        header('Location:list.php');
    } else {
        $successMesage .= '<div class="alert alert-danger" role="alert">Insert fails, Please try again!</div>';
    }
    return $successMesage;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
    <!-- jQuery library -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="styleCreate.css">
</head>

<body>
<div class="container customize">
    <form method="POST" role="form" id="form">
        <legend class="text-center">Welcome to NAL</legend>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="error"><?php echo $successMesage; ?></div>
            </div>
        </div>
        <div class="row rowCustomize">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-left">
                    <label class="">Nhap vao ID Staff:</label>
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <input type="text" class="form-control col-md-8" name="id_staff" id="id_staff" value="<?php echo $id_staff ?>" placeholder="input your id">
                    <p id="idMessage" style="font-weight: bold;"></p>
                </div>
        </div>
        <!-- end .row -->
         <div class="row rowCustomize">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-left">
                    <label class="">Nhap vao Name:</label>
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <input type="text" class="form-control col-md-8" name="name" id="name" value="<?php echo $name ?>" placeholder="input your name" >
                    <p id="idName" style="font-weight: bold;"></p>
                </div>
        </div>
        <!-- end .row -->
        <div class="row rowCustomize">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-left">
                    <label class="">Nhap vao Address:</label>
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <input type="text" class="form-control col-md-8" name="address" id="address" value="<?php echo $address ?>" placeholder="input your address">
                    <p id="idAddress" style="font-weight: bold;"></p>
                </div>
        </div>
        <!-- end .row -->
        <div class="row rowCustomize">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-left">
                <label>Birthday:</label>
            </div>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <div class="input-group date col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <input type="text" class="form-control" data-date-format="yyyy-mm-dd" value="1990/01/01" id="datepicker" name="datepicker">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
                </div>
                <p id="idBirthday"></p>
            </div>
        </div> <!-- end .row in table -->
        <div class="row rowCustomize">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-left">
                    <label class="">Nhap vao Phone Number:</label>
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <input type="text" class="form-control col-md-8" name="phone_number" id="phone_number" value="<?php echo $phone_number ?>" placeholder="input your phone number" maxlength="11">
                    <p id="idPhoneNumber" style="font-weight: bold;"></p>
                </div>
        </div>
        <!-- end .row -->
        <div class="row rowCustomize">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-left">
                    <label class="">Nhap vao Email:</label>
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <input type="text" class="form-control col-md-8" name="email" id="email" value="<?php echo $email ?>" placeholder="input your email">
                    <p id="idEmail" style="font-weight: bold;"></p>
                </div>
        </div>
        <!-- end .row -->
        <div class="row text-center footer">
            <button type="submit" name="insert" id="submit" value="insert" class="btn btn-success button_left">Insert</button>
            <a href="list.php" class="btn btn-primary btn-success button_right">Show List</a>
        </div>
    </form> <!-- end form -->
</div>
 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $("#form").validate({
            rules: {
                id_staff:{
                    required: true,
                    minlength: 3,
                    maxlength: 10,
                },
                name:{
                    required: true,
                    minlength: 5,
                    maxlength: 30,
                },
                email:{
                    required: true,
                    email: true,
                },
                address:{
                    required: true,
                    minlength: 7,
                    maxlength: 50,
                },
                phone_number:{
                    required: true,
                    digits: true,
                    minlength: 9,
                    maxlength: 11,
                }
            },
            messages:{
                id_staff:{
                    required:"The id staff field is required!",
                    minlength:"The id staff too short!",
                    maxlength:"The id staff too long!",
                },
                name:{
                   required:"The name field is required!",
                   minlength:"The name too short!",
                   maxlength:"The name too long!",
                },
                  email:{
                    required: "The email field is required!",
                    email: "The email is not correct!",
                },
                address:{
                    required:"The address field is required!",
                    minlength:"The address too short!",
                    maxlength:"The address too long!",
                },
                phone_number:{
                    required:"The phone number field is required!",
                    digits:"The phone number field is digits",
                    minlength:"The phone number too short!",
                    maxlength:"The phone number too long!",
                },
            }
        });
    });
</script>

<script>
    $(document).ready(function(){
        $(function() {
            $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
        });

        $("#id_staff").blur(function(){
            var id_staff = $("#id_staff").val();
            if (id_staff != '') {
                $.ajax({
                    url: 'xyLyId.php',
                    type: 'POST',
                    data: {id_staff : id_staff},
                    })
                    .done(function(output) {
                        console.log(output);
                        if (output == 0) {
                            $('#idMessage').html('ID already exists in the database.!');
                        } else {
                            $('#idMessage').html('ID correct!');
                    }   
                });
            }
        });

        $("#phone_number").blur(function(){
            var phone_number = $("#phone_number").val();
            if (phone_number != '') {
                $.ajax({
                    url: 'xuLyPhoneNumber.php',
                    type: 'POST',
                    data: {phone_number : phone_number},
                    })
                    .done(function(output) {
                        console.log(output);
                        if (output == 0) {
                            $('#idPhoneNumber').html('Phone number already exists in the database.!');
                        } else {
                            $('#idPhoneNumber').html('Phone number correct!');
                    }   
                });
            }
        });

        $("#email").blur(function(){
            var email = $("#email").val();
            if (email != '') {
                $.ajax({
                    url: 'xuLyEmail.php',
                    type: 'POST',
                    data: {email : email},
                    })
                    .done(function(output) {
                        console.log(output);
                        if (output == 0) {
                            $('#idEmail').html('Email already exists in the database.!');
                        } else {
                            $('#idEmail').html('Email correct!');
                    }   
                });
            }
        });
    });
</script>
</body>
</html>
