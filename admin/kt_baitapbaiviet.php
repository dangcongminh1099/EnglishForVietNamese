<?php
    session_start();
    include("../connect/connect.php");
    $connect=connect("project");
    utf8($connect);
    if(isset($_GET["checkbox"])&&isset($_GET["action"])&&$_GET["action"]=="Xóa")
    {
        $mabaiviet_baitap=$_GET["checkbox"];
        $query="select baiviet_baitap.mabaiviet_baitap,count(macau) from baiviet_baitap left JOIN cauhoi on cauhoi.mabaiviet_baitap=baiviet_baitap.mabaiviet_baitap where baiviet_baitap.mabaiviet_baitap in(";
        for($i=0;$i<count($mabaiviet_baitap);$i++)
        {
            if($i==count($mabaiviet_baitap)-1)
            {
                $query=$query.$mabaiviet_baitap[$i].") GROUP BY baiviet_baitap.mabaiviet_baitap having count(macau)>0";
            }
            else 
            {
                $query=$query.$mabaiviet_baitap[$i].",";
            }
            $quatrinh[$i]="||".$mabaiviet_baitap[$i]."||";
        }
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
        if ($a!=null) 
        {
            header("Location:menusetting.php?page=3&err=1");
        }
        else 
        {
            $query="delete from baiviet_baitap where mabaiviet_baitap in(";
            for($i=0;$i<count($mabaiviet_baitap);$i++)
            {
                if($i==count($mabaiviet_baitap)-1)
                {
                    $query=$query.$mabaiviet_baitap[$i].")";
                }
                else
                {
                    $query=$query.$mabaiviet_baitap[$i].",";
                }
                
            }
            $excute=mysqli_query($connect,$query);
            $query="select quatrinh,tentk from tblnguoidung where quatrinh is not null and capdo=3 ";
            $excute=mysqli_query($connect,$query);
            $a=mysqli_fetch_array($excute);
            while($a!=null)
            {
                for ($i=0; $i <count($quatrinh); $i++) 
                { 
                    $a[0]=str_replace($quatrinh[$i],"||",$a[0]);
                    
                }
                $query="update tblnguoidung set quatrinh='".$a[0]."'where tentk='".$a[1]."'";
                mysqli_query($connect,$query);
                $a=mysqli_fetch_array($excute);
            }
            header("Location:menusetting.php?page=3");
        }
        
    }
    else if (isset($_POST["tieude"])&&isset($_POST["mabaiviet_baitap"])&&$_POST["tieude"]!=""&&isset($_POST["action"])&&$_POST["action"]=="Thêm"&&isset($_POST["matheloai"])&&$_POST["matheloai"]!=0&&isset($_POST["mota"])&&isset($_POST["link"])) 
    {
        if(isset($_FILES["newimg"])&&$_FILES["newimg"]["size"]>0&&$_FILES["newimg"]["name"]!=""&&$_FILES["newimg"]["error"]==0)
        {
            $duoifile=pathinfo($_FILES["newimg"]["type"],PATHINFO_BASENAME);
            $size=$_FILES["newimg"]["size"];
            $stringname=$_FILES["newimg"]["name"];
            $name=pathinfo($_FILES["newimg"]["name"],PATHINFO_FILENAME);
            $extension=pathinfo($_FILES["newimg"]["name"],PATHINFO_EXTENSION);
            $save_volatitle=$_FILES["newimg"]["tmp_name"];
            $save="../user/img baitap/imgbaiviet_baitap/$stringname";
            $filetype=['png','jpeg','gif'];
            $count=0;
            
            if($size/1024/1024<10)
            {
                $count++;
            }
            if(file_exists($save)==false)
            {
                
                $count++;
            }
        
            else 
            {
                $kt=0;
                
                $length=strlen($name);
                
                do 
                {
                    
                    if($name[$length-1]==')'&&$name[$length-3]=='('&& $kt<=9)
                    {
                        $name[$length-2]=$kt;

                    }
                    else 
                    {
                        $kt=0;
                        $name=$name."($kt)";
                        $length=strlen($name);
                    }
                    $stringname=$name.".".$extension;
                    $kt++;
                    $save="../user/img baitap/imgbaiviet_baitap/$stringname";
                } 
                while (file_exists($save)==true);
                $count++;
                
            }
            for ($j=0; $j <count($filetype) ; $j++)
            { 
                if($duoifile==$filetype[$j])
                {
                    $count++;
                    break;
                }
            }
            
            if ($count==3) 
            {
                move_uploaded_file($_FILES["newimg"]["tmp_name"],$save);
                $img2="user/img baitap/imgbaiviet_baitap/$stringname";
            }

        }
        else 
        {
            header("Location:menusetting.php?page=3");
        }
        
        $mabaiviet_baitap=$_POST["mabaiviet_baitap"];
        $tieude=$_POST["tieude"];
        $matheloai=$_POST["matheloai"];
        $mota=$_POST["mota"];
        $link=$_POST["link"];
        if($_SESSION["tkadmin"][3]==1)
        {
            $query="insert into baiviet_baitap(mabaiviet_baitap,tieude,matheloai,mota,link,img,tinhtrang) values ('$mabaiviet_baitap','$tieude','$matheloai','$mota','$link','$img2',0)";
        }
        else {
            
            $query="insert into baiviet_baitap(mabaiviet_baitap,tieude,matheloai,mota,link,img,tinhtrang) values ('$mabaiviet_baitap','$tieude','$matheloai','$mota','$link','$img2',1)";
        }
        
        echo $query;
        $excute=mysqli_query($connect,$query);
        header("Location:menusetting.php?page=3&option2=thembt&success=0&mabaitap=$mabaiviet_baitap");

    }
    else if (isset($_POST["mabaiviet_baitap"])&&isset($_POST["tieude"])&&isset($_POST["action"])&&$_POST["action"]=="Chỉnh sửa"&&isset($_POST["matheloai"])&&$_POST["matheloai"]!=0&&isset($_POST["mota"])&&isset($_POST["link"])&&isset($_POST["tinhtrang"])&&isset($_POST["img"])) 
    {
        $mabaiviet_baitap=$_POST["mabaiviet_baitap"];
        $tieude=$_POST["tieude"];
        $matheloai=$_POST["matheloai"];
        $mota=$_POST["mota"];
        $link=$_POST["link"];     
        $img=$_POST["img"];
        $tinhtrang=$_POST["tinhtrang"];
        $img2="";
        for ($i=0; $i <count($_FILES["newfile"]["name"]) ; $i++) 
        { 
            if(isset($_FILES["newfile"])&&$_FILES["newfile"]["size"][$i]>0&&$_FILES["newfile"]["name"][$i]!=""&&$_FILES["newfile"]["error"][$i]==0)
            {
                $duoifile=pathinfo($_FILES["newfile"]["type"][$i],PATHINFO_BASENAME);
                $size=$_FILES["newfile"]["size"][$i];
                $stringname=$_FILES["newfile"]["name"][$i];
                $name=pathinfo($_FILES["newfile"]["name"][$i],PATHINFO_FILENAME);
                $extension=pathinfo($_FILES["newfile"]["name"][$i],PATHINFO_EXTENSION);
                $save_volatitle=$_FILES["newfile"]["tmp_name"][$i];
                $save="../user/img baitap/imgbaiviet_baitap/$stringname";
                $filetype=['png','jpeg','gif'];
                $count=0;
                
                if($size/1024/1024<10)
                {
                    $count++;
                }
                if(file_exists($save)==false)
                {
                    
                    $count++;
                }
            
                else 
                {
                    $kt=0;
                    
                    $length=strlen($name);
                    
                    do 
                    {
                        
                        if($name[$length-1]==')'&&$name[$length-3]=='('&& $kt<=9)
                        {
                            $name[$length-2]=$kt;

                        }
                        else 
                        {
                            $kt=0;
                            $name=$name."($kt)";
                            $length=strlen($name);
                        }
                        $stringname=$name.".".$extension;
                        $kt++;
                        $save="../user/img baitap/imgbaiviet_baitap/$stringname";
                    } 
                    while (file_exists($save)==true);
                    $count++;
                    
                }
                for ($j=0; $j <count($filetype) ; $j++)
                { 
                    if($duoifile==$filetype[$j])
                    {
                        $count++;
                        break;
                    }
                }
                
                if ($count==3) 
                {
                    move_uploaded_file($_FILES["newfile"]["tmp_name"][$i],$save);
                    $img2[$i]="user/img baitap/imgbaiviet_baitap/$stringname";
                }

            }
            else 
            {
                $img2[$i]=$img[$i];
            }
        }
        
        for ($i=0; $i <count($mabaiviet_baitap) ; $i++) 
        { 
            $query="update baiviet_baitap set tieude='".$tieude[$i]."',matheloai='".$matheloai[$i]."',mota='".$mota[$i]."',link='".$link[$i]."',tinhtrang=".$tinhtrang[$i].",img='";
            if($img2[$i]=="")
            {
                $query=$query."NULL where mabaiviet_baitap=".$mabaiviet_baitap[$i];
            }
            else 
            {
                $query=$query.$img2[$i]."' where mabaiviet_baitap=".$mabaiviet_baitap[$i];
            }
            echo $query;
            $excute=mysqli_query($connect,$query);
        }
        header("Location:menusetting.php?page=3");
    }
    else 
    {
        header("Location:menusetting.php?page=3");
    }
?>