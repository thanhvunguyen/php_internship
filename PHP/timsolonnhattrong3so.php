<?php
$a = 20;
$b = 15;
$c = 12;

{
    if($a > $b )
    {
//echo $a;
        $max1 = $a;
    }
    else
    {
//echo $b;
        $max1 = $b;
    }
    if($c > $max1)
    {
        $max = $c;
    }
    else
    {
        $max = $max1;
    }
    echo "So lon nhat trong 3 so la $max ";
}
?>
