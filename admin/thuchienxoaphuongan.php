<?php
    if(isset($_GET["maphuongan"]))
    {
        include("../connect/connect.php");
        $connect=connect("project");
        $maphuongan=$_GET["maphuongan"];
        $query="delete from tblphuongan where maphuongan in(";
        for ($i=0; $i <count($maphuongan) ; $i++) 
        {
            if($i==count($maphuongan)-1)
            {
                $query=$query.$maphuongan[$i].")";
            }
            else 
            {
                $query=$query.$maphuongan[$i].",";
            }
        }
        $excte=mysqli_query($connect,$query);
        header("Location:menusetting.php?page=4");
    }
    else 
    {
        header("Location:menusetting.php?page=4");
    }

?>