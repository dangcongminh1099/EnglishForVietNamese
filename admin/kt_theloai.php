<?php
            include("../connect/connect.php");
            $connect=connect("project");
            utf8($connect);
            if(isset($_GET["checkbox"])&&isset($_GET["action"])&&$_GET["action"]=="Xóa")
            {
                $matheloai=$_GET["checkbox"];
                $query="select tbltheloai.matheloai,count(mabaiviet_baitap) from tbltheloai left JOIN baiviet_baitap on tbltheloai.matheloai=baiviet_baitap.matheloai where tbltheloai.matheloai in(";
                
                for($i=0;$i<count($matheloai);$i++)
                {
                    if($i==count($matheloai)-1)
                    {
                        $query=$query.$matheloai[$i].") GROUP BY tbltheloai.matheloai having count(mabaiviet_baitap)>0";
                    }
                    else 
                    {
                        $query=$query.$matheloai[$i].",";
                    }
                    
                }
                echo $query;
                $excute=mysqli_query($connect,$query);
                $a=mysqli_fetch_array($excute);
                if ($a!=null) 
                {
                    header("Location:menusetting.php?page=2&err=1");
                }
                else 
                {
                    $query="delete from tbltheloai where matheloai in(";
                    for($i=0;$i<count($matheloai);$i++)
                    {
                        if($i==count($matheloai)-1)
                        {
                            $query=$query.$matheloai[$i].")";
                        }
                        else
                        {
                            $query=$query.$matheloai[$i].",";
                        }
                        
                    }
                    $excute=mysqli_query($connect,$query);
                    header("Location:menusetting.php?page=2");
                }
                
            }
            else if (isset($_GET["tentheloai"])&&isset($_GET["matheloai"])&&$_GET["tentheloai"]!=null&&$_GET["action"]=="Thêm"&&isset($_GET["madanhmuc"])&&$_GET["madanhmuc"]!=0) 
            {
                $matheloai=$_GET["matheloai"];
                $tentheloai=$_GET["tentheloai"];
                $madanhmuc=$_GET["madanhmuc"];
                $query="insert into tbltheloai(matheloai,tentheloai,madanhmuc) values ('$matheloai','$tentheloai','$madanhmuc')";
                $excute=mysqli_query($connect,$query);
                header("Location:menusetting.php?page=2");

            }
            else if (isset($_GET["matheloai"])&&isset($_GET["tentheloai"])&&isset($_GET["action"])&&$_GET["action"]=="Chỉnh sửa"&&isset($_GET["madanhmuc"])&&$_GET["madanhmuc"]!=0) 
            {
                $matheloai=$_GET["matheloai"];
                $tentheloai=$_GET["tentheloai"];
                $madanhmuc=$_GET["madanhmuc"];
                for ($i=0; $i <count($matheloai) ; $i++) 
                { 
                    $query="update tbltheloai set tentheloai='".$tentheloai[$i]."',madanhmuc='".$madanhmuc[$i]."' where matheloai=".$matheloai[$i];
                    $excute=mysqli_query($connect,$query);
                }
                echo $query;
                header("Location:menusetting.php?page=2");
            }
            else 
            {
                header("Location:menusetting.php?page=2&err=2");
            }
?>