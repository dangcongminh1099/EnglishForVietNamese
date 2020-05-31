<?php
    include("../connect/connect.php");
    $connect=connect("project");
    if(isset($_GET["checkboxcauhoi"])&&isset($_GET["action"])&&$_GET["action"]=="Xóa câu hỏi")
    {
        $checkboxcauhoi=$_GET["checkboxcauhoi"];  
        $query="select  cauhoi.macau,cauhoi.noidung,count(maphuongan) from cauhoi left join tblphuongan on tblphuongan.macau=cauhoi.macau where cauhoi.macau in(";
        for ($i=0; $i <count($checkboxcauhoi); $i++) 
        { 

            if ($i==count($checkboxcauhoi)-1) 
            {
                $query=$query.$checkboxcauhoi[$i].")  group by cauhoi.macau having count(maphuongan)>0 ";
            }
            else 
            {
                $query=$query.$checkboxcauhoi[$i].",";
            }
            
        }
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
        if($a!=null)
        {
            header("Location:menusetting.php?page=4&err");
        }
        else 
        {
            $query="delete from cauhoi where macau in(";
            for ($i=0; $i <count($checkboxcauhoi); $i++) 
            { 

                if ($i==count($checkboxcauhoi)-1) 
                {
                    $query=$query.$checkboxcauhoi[$i].")";
                }
                else 
                {
                    $query=$query.$checkboxcauhoi[$i].",";
                }
                
            }
            $excute=mysqli_query($connect,$query);
            header("Location:menusetting.php?page=4");

        }
    }
    
    else 
    {
        header("Location:menusetting.php?page=4&err");
    }
?>
   
