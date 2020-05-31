<?php
    include("../connect/connect.php");
    $connect=connect("project");
    utf8($connect);
    if ((isset($_GET["array"])||isset($_GET["array2"]))&&isset($_GET["action"])&&$_GET["action"]=="public") 
    {
        if(isset($_GET["array"]))
        {
            $arr=$_GET["array"];   
            
            $query="update baiviet_baitap set tinhtrang=0 where mabaiviet_baitap in(";
            for ($i=0; $i < count($arr) ; $i++) 
            { 
                if($i==count($arr)-1)
                {
                    $query=$query.$arr[$i].")";
                }
                else 
                {        
                    $query=$query.$arr[$i].",";
                }
            }
            $excute=mysqli_query($connect,$query);
        }
        if(isset($_GET["array2"])) 
        {
            $arr2=$_GET["array2"];
            $query="update noidungbaiviet set tinhtrang=0 where mabaiviet in (";
            for ($i=0; $i <count($arr2) ; $i++) 
            { 
                if($i==count($arr2)-1)
                {
                    $query=$query.$arr2[$i].")";
                }
                else {
                    $query=$query.$arr2[$i].",";
                }
                
            }
            $excute=mysqli_query($connect,$query);
            echo $query;
        }
        header("Location:menusetting.php?page=7");
    }
    
    else 
    {
        header("Location:menusetting.php?page=7");
    }
?>