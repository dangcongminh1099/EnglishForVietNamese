<?php 
session_start();
include("../../connect/connect.php");
$connect=connect("project");
if(isset($_GET["action"])&&$_GET["action"]=="quatrinh"&&isset($_GET["mabaitap"]))
{
    if(isset($_SESSION["tk"]))
    {
        $tentk=$_SESSION["tk"][0];
        $mabt=$_GET["mabaitap"];
        $query="select * from tblnguoidung where tentk='$tentk'";
        $excute=mysqli_query($connect,$query);
        $quatrinh=mysqli_fetch_array($excute)[4];
        $count=count(explode("||$mabt||",$quatrinh));
        if($count==1)
        {
            if($quatrinh==NULL ||$quatrinh=="")
            {
                $quatrinh="||$mabt||";
            }
            else 
            {
                $quatrinh=$quatrinh."$mabt||";
            }
            $query="update tblnguoidung set quatrinh='$quatrinh' where tentk='$tentk'";
            $excute=mysqli_query($connect,$query);
            $_SESSION["tk"]["quatrinh"]=$quatrinh;
        }
        
        
    }
    else {
        header("Location:index.php");
    }
}
else {
    header("Location:index.php");
}
?>