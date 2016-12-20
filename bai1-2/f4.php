
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
  Third number:<br>
  <input type="number" id="c">
  <br>
  <button type="button"
   onclick="find2();">
   <b>result</b></button>
</form>
  <p id="demo"></p>
<script>
function find2(){
  var x,y,z;
  x = document.getElementById("a").value;
  y = document.getElementById("b").value;
  z = document.getElementById("c").value;
  var t = Math.max(x,y,z);
  document.getElementById("demo").innerHTML = t;
}
</script>
</body>