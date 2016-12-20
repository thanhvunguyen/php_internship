<!DOCTYPE html>
<html lang="en">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EXAMPLE BOOTSTRAP</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <style>
        .color_td{
            background-color: #eef1f5;
        }
        .button{
            text-align: center;
        }
    </style>
</head>
<h1 style="text-align:center"> Bootstrap and CSS</h1>
<style> 
p { 	color: red;
	text-align: center;
}
</style>
<body>

<form>
  <div style=" margin-top: 40px; " class="container">
	<div class="col-sm-4 col-md-4 left color_td">First name:</div>
		<div class="col-sm-8 col-md-8">
                       <div class="form-group">
                            <input type="text" class="form-control" name="Firstname" required="">
                        </div>
                 </div>
	<div class="col-sm-4 col-md-4 left color_td">Last name:</div>
		<div class="col-sm-8 col-md-8">
                       <div class="form-group">
                            <input type="text" class="form-control" name="Lastname" required="">
                        </div>
                 </div>
	<div class="col-sm-4 col-md-4 left color_td">Age:</div>
		<div class="col-sm-8 col-md-8">
                       <div class="form-group">
                            <input type="number" class="form-control" name="age" required="">
                        </div>
                 </div>

	<p> <b>Game favourite:</b>
</p>
  <input type="radio" name="game" value="male" checked> lol<br>
  <input type="radio" name="game" value="female"> Dota 2<br>
  <input type="radio" name="game" value="other"> Other 
</div>
</form>
	<p> <b>Statistical:</b>
</p>
<style>
table, th, td {
    border: 1px solid black;
}
</style><table style="width:100%">
  <tr>
    <td><b>Firstname</b></td>
    <td><b>Lastname</b></td> 
    <td><b>Age</b></td>
    <td><b>Game</b></td>
  </tr>
  <tr>
    <td>Tran Anh</td>
    <td>Thang</td>
    <td>22</td>
    <td>lol</td>
  </tr>
  <tr>
    <td>Ho Viet</td>
    <td>Nghia</td>
    <td>22</td>
    <td>dota 2</td>
  </tr>
  <tr>
    <td>Duong</td>
    <td>Qua</td>
    <td>56</td>
    <td>ff3(orther)</td>
  </tr>
  <tr>
    <td>Tieu Long</td>
    <td>Nu</td>
    <td>76</td>
    <td>nope</td>
  </tr>
</table>


</body>
</html>
