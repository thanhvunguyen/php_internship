<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Max trong 3 so</title>
</head>
<body>
<div id="demo"></div>
<script>
    function maxNumber(a, b, c) {
        if(a >b && a>c) return a;
        else if(b> a && b>c)
            return b;
        else return c;
    }
    document.getElementById("demo").innerHTML += maxNumber(3,4,5);
</script>

</body>
</html>