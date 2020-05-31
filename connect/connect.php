<?php
function connect($x)
{
    return new mysqli("localhost","root","","$x");
}
function close($x)
{
    mysqli_close($x);
}
function utf8($x)
{
    mysqli_set_charset($x,"utf8");
}

?>
