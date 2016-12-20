
<html>
<h1 style="text-align:center"> Returns the value largest of them</h1>
<body>
<form>
  First number:<br>
  <input type="number" id="a">
  <br>
  Second number:<br>
  <input type="number" id="b">
  <br>
  <button type="button"
   onclick="find();">
   <b>result</b></button>
</form>
  <p id="demo"></p>
<script>
function find(){
  var x,y,z;
  x = document.getElementById("a").value;
  y = document.getElementById("b").value;
  z = Math.max(x,y);
  document.getElementById("demo").innerHTML = z;
}
</script>
</body>