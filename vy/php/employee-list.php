<?php
    require './lib/employee.php';
    $employee = list_employee();
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
        <title>LIST Employee</title>
        <style>
            .btn{
                padding-right: 20px;
                display: inline-block;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container" style="padding-top: 30px;">
            <div class="row">
                <form method="post" action="employee-list.php">
                    <div style="col-md-12">
                        <table class="table-bordered">
                            <div class="col-md-12" style="padding-bottom: 20px;">
                                <a href="employee-add.php" class="btn btn-primary" style="float: right;">Create</a>
                            </div>
                            <tr class="row" style="height: 30px;">
                                <td class="col-md-1" style="font-weight: bold; text-align: center">ID</td>
                                <td class="col-md-3" style="font-weight: bold;text-align: center">NAME</td>
                                <td class="col-md-3" style="font-weight: bold;text-align: center">ADDRESS</td>
                                <td class="col-md-2" style="font-weight: bold;text-align: center">MAIL</td>
                                <td class="col-md-3" style="font-weight: bold;text-align: center">Option</td>
                            </tr>
                            <?php foreach ($employee as $item){ ?>
                                <tr class="row"style="height: 60px;">
                                    <td class="col-md-1"><?php echo $item['id']; ?></td>
                                    <td class="col-md-3"><?php echo $item['name'] ;?></td>
                                    <td class="col-md-3"><?php echo $item['address'];?></td>
                                    <td class="col-md-2"><?php echo $item['mail'];?></td>
                                    <td class="col-md-3" style="text-align: center">
                                        <div class="btn">
                                          <a href="employee-update.php?id=<?php echo $item['id']; ?>" class="btn btn-info">Update</a>
                                        </div>
                                        <a href="employee-delete.php?id=<?php echo $item['id']; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>