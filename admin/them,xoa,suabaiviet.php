<?php 
    session_start();
    include("../connect/connect.php");
    $connect=connect("project");
    utf8($connect);
    if(isset($_POST["tieude"])&&isset($_POST["mota"])&&isset($_POST["noidung"])&&isset($_POST["matheloai"])&&$_POST["matheloai"]!=0&&isset($_POST["action"])&&$_POST["action"]=="thembaiviet")
    {
        $tieude=$_POST["tieude"];
        $mota=$_POST["mota"];
        $noidung=$_POST["noidung"];
        $matheloai=$_POST["matheloai"];
        $img="";
        if(isset($_FILES["uploadfile"]))
        {
            if($_FILES["uploadfile"]["name"]!=""&&$_FILES["uploadfile"]["size"]>0)
            {
                $tenfile=$_FILES["uploadfile"]["name"];
                $tenimg=pathinfo($_FILES["uploadfile"]["name"],PATHINFO_FILENAME);
                $duoifile=pathinfo($_FILES["uploadfile"]["name"],PATHINFO_EXTENSION);
                $kieufile=pathinfo($_FILES["uploadfile"]["type"],PATHINFO_BASENAME);
                $saveVolatitle=$_FILES["uploadfile"]["tmp_name"];
                $error=$_FILES["uploadfile"]["error"];
                $size=$_FILES["uploadfile"]["size"];
                $count=0;
                $duoifilechophep=["jpg","png"];
                $typechophep=["jpeg","png"];
                $linksave="../user/img baitap/img baiviet/$tenfile";
                $linksavedatabase="user/img baitap/img baiviet/$tenfile";
                for ($j=0; $j < count($duoifilechophep); $j++) 
                { 
                    if($duoifile==$duoifilechophep[$j])
                    {
                        for ($k=0; $k <count($typechophep) ; $k++) 
                        { 
                            if($kieufile==$typechophep[$k])
                            {
                                $count++;
                            }
                        }
                    }    
                }
                if(file_exists($linksave)==true)
                {
                    $kt=0;
                    $length=strlen($tenimg);
                
                    do 
                    {
                        
                        if($tenimg[$length-1]==')'&&$tenimg[$length-3]=='('&& $kt<=9)
                        {
                            $tenimg[$length-2]=$kt;
                        }
                        else 
                        {
                            $kt=0;
                            $tenimg=$tenimg."($kt)";
                            $length=strlen($tenimg);
                        }
                        $tenfile=$tenimg.".".$duoifile;
                        $kt++;
                        $linksave="../user/img baitap/img baiviet/$tenfile";
                        $linksavedatabase="user/img baitap/img baiviet/$tenfile";
                    } 
                    while (file_exists($linksave)==true);
                    $count++;
                }
                else 
                {
                    $count++;
                }
                if($size/1024/1024<10)
                {
                    $count++;

                }
                if($error==0)
                {
                    $count++;
                }
                if($count==4)
                {
                    $img=$linksavedatabase;
                    move_uploaded_file($saveVolatitle,$linksave);
                }
            }
            else 
            {
                $img="";
            } 
            
        }
        $mota=mysqli_real_escape_string($connect,$mota);
        $tieude=mysqli_real_escape_string($connect,$tieude);
        $noidung=mysqli_real_escape_string($connect,$noidung);
        if($_SESSION["tkadmin"][3]==1)
        {
            $query="insert into noidungbaiviet(tieude,mota,img,noidung,matheloai,tinhtrang) values('$tieude','$mota','$img','$noidung','$matheloai',0)";
        }
        else 
        {
            $query="insert into noidungbaiviet(tieude,mota,img,noidung,matheloai,tinhtrang) values('$tieude','$mota','$img','$noidung','$matheloai',1)";
        }
        
        if(mysqli_query($connect,$query))
        {
            echo "OK";
        }
        else {
            echo "not";
        }
        header("Location:menusetting.php?page=4");
    }
    else if(isset($_GET["mabaiviet"])&&isset($_GET["action"])&&$_GET["action"]=="xoa")
    {
        $mabaiviet=$_GET["mabaiviet"];
        $query="delete from noidungbaiviet where mabaiviet=$mabaiviet";
        mysqli_query($connect,$query);
        header("Location:menusetting.php?page=4");
    }
    else if(isset($_POST["action"])&&$_POST["action"]=="sua"&&isset($_POST["tieude"])&&isset($_POST["mota"])&&isset($_POST["noidung"])&&isset($_POST["matheloai"])&&isset($_POST["img"])&&isset($_POST["mabv"]))
    {
        $mabaiviet=$_POST["mabv"];
        $tieude=$_POST["tieude"];
        $mota=$_POST["mota"];
        $noidung=$_POST["noidung"];
        $matheloai=$_POST["matheloai"];  
        $mota=mysqli_real_escape_string($connect,$mota);
        $tieude=mysqli_real_escape_string($connect,$tieude);
        $noidung=mysqli_real_escape_string($connect,$noidung);   
        if(isset($_FILES["imgupload"]))
        {
            if($_FILES["imgupload"]["name"]!=""&&$_FILES["imgupload"]["size"]>0)
            {
                $tenfile=$_FILES["imgupload"]["name"];
                $tenimg=pathinfo($_FILES["imgupload"]["name"],PATHINFO_FILENAME);
                $duoifile=pathinfo($_FILES["imgupload"]["name"],PATHINFO_EXTENSION);
                $kieufile=pathinfo($_FILES["imgupload"]["type"],PATHINFO_BASENAME);
                $saveVolatitle=$_FILES["imgupload"]["tmp_name"];
                $error=$_FILES["imgupload"]["error"];
                $size=$_FILES["imgupload"]["size"];
                $count=0;
                $duoifilechophep=["jpg","png"];
                $typechophep=["jpeg","png"];
                $linksave="../user/img baitap/img baiviet/$tenfile";
                $linksavedatabase="user/img baitap/img baiviet/$tenfile";
                for ($j=0; $j < count($duoifilechophep); $j++) 
                { 
                    if($duoifile==$duoifilechophep[$j])
                    {
                        for ($k=0; $k <count($typechophep) ; $k++) 
                        { 
                            if($kieufile==$typechophep[$k])
                            {
                                $count++;
                            }
                        }
                    }    
                }
                if(file_exists($linksave)==true)
                {
                    $kt=0;
                    $length=strlen($tenimg);
                
                    do 
                    {
                        
                        if($tenimg[$length-1]==')'&&$tenimg[$length-3]=='('&& $kt<=9)
                        {
                            $tenimg[$length-2]=$kt;
                        }
                        else 
                        {
                            $kt=0;
                            $tenimg=$tenimg."($kt)";
                            $length=strlen($tenimg);
                        }
                        $tenfile=$tenimg.".".$duoifile;
                        $kt++;
                        $linksave="../user/img baitap/img baiviet/$tenfile";
                        $linksavedatabase="user/img baitap/img baiviet/$tenfile";
                    } 
                    while (file_exists($linksave)==true);
                    $count++;
                }
                else 
                {
                    $count++;
                }
                if($size/1024/1024<10)
                {
                    $count++;

                }
                if($error==0)
                {
                    $count++;
                }
                if($count==4)
                {
                    $img=$linksavedatabase;
                    move_uploaded_file($saveVolatitle,$linksave);
                }
            }
            else 
            {
                $img=$_POST["img"];
            } 
            
        }
        if($_SESSION["tkadmin"][3]==1)
        {
            $tinhtrang=$_POST["tinhtrang"];
            $query="update noidungbaiviet set tieude='$tieude',noidung='$noidung',mota='$mota',matheloai='$matheloai',img='$img',tinhtrang=$tinhtrang where mabaiviet=$mabaiviet";
        }
        else 
        {
            $query="update noidungbaiviet set tieude='$tieude',noidung='$noidung',mota='$mota',matheloai='$matheloai',img='$img',tinhtrang=1 where mabaiviet=$mabaiviet";
        }
        mysqli_query($connect,$query);
        header("Location:menusetting.php?page=4");
    }
    else 
    {
        header("Location:menusetting.php?page=4");
    }
?>