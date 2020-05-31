<?php
            include("../connect/connect.php");
            $connect=connect("project");
            utf8($connect);
            if(isset($_GET["checkbox"])&&isset($_GET["action"])&&$_GET["action"]=="Xóa")
            {
                $madanhmuc=$_GET["checkbox"];
                $query="select tbldanhmuc.madanhmuc,count(matheloai) from tbldanhmuc left JOIN tbltheloai on tbltheloai.madanhmuc=tbldanhmuc.madanhmuc where tbldanhmuc.madanhmuc in(";
                for($i=0;$i<count($madanhmuc);$i++)
                {
                    if($i==count($madanhmuc)-1)
                    {
                        $query=$query.$madanhmuc[$i].") GROUP BY tbldanhmuc.madanhmuc having count(matheloai)>0";
                    }
                    else 
                    {
                        $query=$query.$madanhmuc[$i].",";
                    }
                    
                }

                $excute=mysqli_query($connect,$query);
                $a=mysqli_fetch_array($excute);
                if ($a!=null) 
                {
                    header("Location:menusetting.php?page=1&err=1");
                }
                else 
                {
                    $query="delete from tbldanhmuc where madanhmuc in(";
                    for($i=0;$i<count($madanhmuc);$i++)
                    {
                        if($i==count($madanhmuc)-1)
                        {
                            $query=$query.$madanhmuc[$i].")";
                        }
                        else
                        {
                            $query=$query.$madanhmuc[$i].",";
                        }
                        
                    }
                    $excute=mysqli_query($connect,$query);
                    header("Location:menusetting.php?page=1");
                }
                
            }
            else if (isset($_GET["tendanhmuc"])&&isset($_GET["madanhmuc"])&&$_GET["tendanhmuc"]!=null&&$_GET["action"]=="Thêm") 
            {
                $madanhmuc=$_GET["madanhmuc"];
                $tendanhmuc=$_GET["tendanhmuc"];
                $query="insert into tbldanhmuc values ('$madanhmuc','$tendanhmuc')";
                $excute=mysqli_query($connect,$query);
                header("Location:menusetting.php?page=1");

            }
            else if (isset($_GET["madanhmuc"])&&isset($_GET["tendanhmuc"])&&isset($_GET["action"])&&$_GET["action"]=="Chỉnh sửa") 
            {
                $madanhmuc=$_GET["madanhmuc"];
                $tendanhmuc=$_GET["tendanhmuc"];
                for ($i=0; $i <count($madanhmuc) ; $i++) 
                { 
                    $query="update tbldanhmuc set tendanhmuc='".$tendanhmuc[$i]."' where madanhmuc=".$madanhmuc[$i];
                    $excute=mysqli_query($connect,$query);
                }
                
                header("Location:menusetting.php?page=1");
            }
            else 
            {
                header("Location:menusetting.php?page=1&err=2");
            }
?>