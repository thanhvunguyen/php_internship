<?php
    require './lib/employee.php';
    $data['name']='';
    $data['address'] ='';
    $data['mail']='';
    // Nếu người dùng submit form
    if (isset($_REQUEST['add_employee']))
    {
        $data['name'] = isset($_POST['myname']) ? $_POST['myname'] : '';
        $data['address'] = isset($_POST['myaddress']) ? $_POST['myaddress'] : '';
        $data['mail'] = isset($_POST['mymail']) ? $_POST['mymail'] : '';
        $errors = array();
        if (empty($data['name'])){
            $errors['name'] = 'Chưa nhập tên nhân vien';
        }
        if (empty($data['address'])){
            $errors['address'] = 'Chưa nhập địa chỉ nhân vien';
        }
        if (empty($data['mail'])){
            $errors['mail'] = 'Chưa nhập mail nhân vien';
        }
        if (!$errors){
           add_employee($data['name'], $data['address'], $data['mail']);
           header("location: employee-list.php");
       }
    }
    disconnect_db();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Add Employee</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <form method="post" action="employee-add.php">
                <div class="col-md-12" style="padding-top: 30px;">
                    <table class="table-bordered">
                        <tr class="row" style="border: 1px solid #ececec ;height: 66px;" >
                            <td class="col-md-2" style="background:#eef1f5 ">Login Name</td>
                            <td class="col-md-10">
                                <div class="row" style="padding-left: 20px;">
                                    <input name="myname" style="width: 800px;height: 40px;" value="<?php echo $data['name'] ?>"/>
                                    <?php if (!empty($errors['name'])) echo $errors['name']; ?>
                                </div>
                            </td>
                        </tr>
                        <tr class="row" style="border: 1px solid #ececec ;height: 66px;" >
                            <td class="col-md-2" style="background:#eef1f5 ">Login Address</td>
                            <td class="col-md-10">
                                <div class="row" style="padding-left: 20px;">
                                    <input name="myaddress" style="width: 800px;height: 40px;" value="<?php echo $data['address'] ?>"/>
                                    <?php if (!empty($errors['address'])) echo $errors['address']; ?>
                                </div>
                            </td>
                        </tr>
                        <tr class="row" style="border: 1px solid #ececec ;height: 66px;" >
                            <td class="col-md-2" style="background:#eef1f5 ">Login Mail</td>
                            <td class="col-md-10">
                                <div class="row" style="padding-left: 20px;">
                                    <input name="mymail" style="width: 800px;height: 40px;" value="<?php echo $data['mail'] ?>"/>
                                    <?php if (!empty($errors['mail'])) echo $errors['mail']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-12" style="text-align: center;line-height: 50px;">
                    <div style="display: inline ;padding-right: 30px;">
                        <button type="submit" class="btn btn-primary" name="add_employee">Creat</button>
                    </div>
                    <button type="submit" class="btn btn-success">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
