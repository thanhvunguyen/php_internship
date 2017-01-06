<?php
require_once ('database.php');

$id = isset($_GET['id'])? $_GET['id'] : '';
$id_staff = isset($_POST['id_staff'])? $_POST['id_staff'] : '';
$name = isset($_POST['name'])? $_POST['name'] : '';
$phone_number = isset($_POST['phone_number'])? $_POST['phone_number'] : '';
$address = isset($_POST['address'])? $_POST['address'] : '';
$email = isset($_POST['email'])? $_POST['email'] : '';
$birthday = isset($_POST['birthday'])? $_POST['birthday'] : '';
$successMesage = "";

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $sql = "UPDATE customer SET address = '$address', email = '$email',name = '$name', phone_number = '$phone_number' WHERE id = '".$id."'";
    if (mysqli_query($connection, $sql)) {
        $successMesage .= '<div class="alert alert-success" role="alert">Insert Successfully, Welcome to NAL Solutions!</div>';
        header('Location:list.php');
    } else {
        $successMesage .= '<div class="alert alert-danger" role="alert">Insert fails, Please try again!</div>';
    }
    mysqli_close($connection);
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $GLOBALS['id'] = $_GET['id'];
    $query = "SELECT * FROM customer WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result)==1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $id_staff = $row['id_staff'];
        $address = $row['address'];
        $phone_number = $row['phone_number'];
        $email = $row['email'];
        $birthday = $row['birthday'];
    }
} ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Update</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styleUpdate.css">
</head>
<body>
    <div class="container customize">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <h1>Update Information</h1>
            </div>
        </div> <!-- end .row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="error"><?php echo $successMesage; ?></div>
            </div>
        </div>
        <form action="" method="POST" role="form" id="form">
            <table class="table table-hover table-bordered">
                <tbody>
                    <tr class="row">
                        <td class="col-xs-3 col-sm-3 col-md-3 col-lg-3">ID Staff:</td>
                        <td class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <input class="matchParent" type="text" name="id_staff" id="id_staff"
                            value="<?php echo $id_staff ?>" readonly="true" disabled>
                        </td>
                    </tr>
                    <!-- end .row -->
                    <tr class="row">
                        <td class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Name:</td>
                        <td class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <input class="matchParent" type="text" name="name" id="name"
                            value="<?php echo $name ?>" >
                            <p id="idName" style="font-weight: bold;"></p>
                        </td>
                    </tr>
                    <!-- end .row -->
                    <tr class="row">
                        <td class="col-xs-3 col-sm-3 col-md-3 col-lg-3">address:</td>
                        <td class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <input class="matchParent" type="text" name="address" id="address"
                            value="<?php echo $address;?>" >
                            <p id="idAddress" style="font-weight: bold;"></p>
                        </td>
                    </tr>
                    <!-- end .row-->
                    <tr class="row">
                        <td class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Birthday:</td>
                        <td class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <div class="input-group date col-xs-3 col-sm-3 col-md-3 col-lg-3" id="birthday">
                                <input type="text" class="form-control" name="birthday" id="birthday" value="<?php echo date('d-m-Y', strtotime($birthday)); ?>" readonly="true" disabled>
                                <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
                            </div>
                            <span id="errorBirthday"></span>
                        </td>
                    </tr>
                    <!-- end .row -->
                    <tr class="row">
                        <td class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Phone Number:</td>
                        <td class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <input class="matchParent" type="text" name="phone_number" id="phone_number" value="<?php echo $phone_number ?>" >
                            <p id="idPhoneNumber" style="font-weight: bold;"></p>
                        </td>
                    </tr>
                    <!-- end .row -->
                    <tr class="row">
                        <td class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Email:</td>
                        <td class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <input class="matchParent" type="text" name="email" id="email"
                            value="<?php echo $email ?>" >
                            <p id="idEmail" style="font-weight: bold;"></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row footer">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                        <button type="submit" id="submit" class="btn btn-success">Update</button>
                        <a href="list.php" class="btn btn-danger" title="">Cancel</a>
                </div>
            </div>
        </form> <!--end form-->
    </div>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
 <script>
    $(document).ready(function() {
        $("#form").validate({
            rules: {
                id:{
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
                address
:{
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
                id:{
                    required:"The id field is required!",
                    minlength:"The name too short!",
                    maxlength:"The name too long!",
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
                    required:"The address field is not required!",
                    minlength:"The address too short!",
                    maxlength:"The address too long!",
                },
                phone_number:{
                    required:"The phone number field is not required!",
                    digits:"The phone number field is digits",
                    minlength:"The phone number too short!",
                    maxlength:"The phone number too long!",
                },
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#phone_number").blur(function(){
            var phone_number = $("#phone_number").val();
            if (phone_number == '') {
                $('#idPhoneNumber').html('The phone number field is not required!');
            } else {
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
            if (email == '') {
                $('#idEmail').html('The email field is not required!');
            } else {
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
                    })
                });
            }
        });


        $.ajax({
            url: '/path/to/file',
            type: 'default GET (Other values: POST)',
            dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            data: {param1: 'value1'},
        })
        .done(function() {
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
    });
</script>

</body>
</html>
