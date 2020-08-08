<?php
    if(isset($_POST["noidung"])&&isset($_POST["dapan"])&&isset($_POST["mabaitap"])&&isset($_POST["macau"]))
    {
        echo "ok";
        include("../connect/connect.php");
        $connect=connect("project");
        $noidung=$_POST["noidung"];
        $dapan=$_POST["dapan"];
        $mabaitap=$_POST["mabaitap"];
        $macau=$_POST["macau"];
        $img=[];
        $audio=[];
        if(isset($_FILES["img"]))
        {
            for ($i=0; $i <count($_FILES["img"]["name"]) ; $i++) 
            { 
                if($_FILES["img"]["name"][$i]!=""&&$_FILES["img"]["size"][$i]>0)
                {
                    $tenfile=$_FILES["img"]["name"][$i];
                    $tenimg=pathinfo($_FILES["img"]["name"][$i],PATHINFO_FILENAME);
                    $duoifile=pathinfo($_FILES["img"]["name"][$i],PATHINFO_EXTENSION);
                    $kieufile=pathinfo($_FILES["img"]["type"][$i],PATHINFO_BASENAME);
                    $saveVolatitle=$_FILES["img"]["tmp_name"][$i];
                    $error=$_FILES["img"]["error"][$i];
                    $size=$_FILES["img"]["size"][$i];
                    $count=0;
                    $duoifilechophep=["jpg","png"];
                    $typechophep=["jpeg","png"];
                    $linksave="../user/img baitap/imgphuongan/$tenfile";
                    $linksavedatabase="user/img baitap/imgphuongan/$tenfile";
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
                            $linksave="../user/img baitap/imgphuongan/$tenfile";
                            $linksavedatabase="user/img baitap/imgphuongan/$tenfile";
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
                        $img[$i]=$linksavedatabase;
                        move_uploaded_file($saveVolatitle,$linksave);
                    }
                }
                else 
                {
                    $img[$i]="";
                }
            }
               
            
        }
        if(isset($_FILES["audio"]))
        {
            for ($i=0; $i <count($_FILES["audio"]["name"]) ; $i++) 
            { 
                if($_FILES["audio"]["name"][$i]!=""&&$_FILES["audio"]["size"][$i]>0)
                {
                    $tenfile=$_FILES["audio"]["name"][$i];
                    $tenaudio=pathinfo($_FILES["audio"]["name"][$i],PATHINFO_FILENAME);
                    $duoifile=pathinfo($_FILES["audio"]["name"][$i],PATHINFO_EXTENSION);
                    $kieufile=pathinfo($_FILES["audio"]["type"][$i],PATHINFO_BASENAME);
                    $saveVolatitle=$_FILES["audio"]["tmp_name"][$i];
                    $error=$_FILES["audio"]["error"][$i];
                    $size=$_FILES["audio"]["size"][$i];
                    $count=0;
                    $duoifilechophep=["mp3","mpeg"];
                    $typechophep=["mp3","mpeg"];
                    $linksave="../user/audio/$tenfile";
                    $linksavedatabase="user/audio/$tenfile";
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
                        $length=strlen($tenaudio);
                    
                        do 
                        {
                            
                            if($tenaudio[$length-1]==')'&&$tenaudio[$length-3]=='('&& $kt<=9)
                            {
                                $tenaudio[$length-2]=$kt;
                            }
                            else 
                            {
                                $kt=0;
                                $tenaudio=$tenaudio."($kt)";
                                $length=strlen($tenaudio);
                            }
                            $tenfile=$tenaudio.".".$duoifile;
                            $kt++;
                            $linksave="../user/audio/$tenfile";
                            $linksavedatabase="user/audio/$tenfile";
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
                        $audio[$i]=$linksavedatabase;
                        move_uploaded_file($saveVolatitle,$linksave);
                    }
                }
                else 
                {
                    $audio[$i]="";
                }
            }
               
            
        }
        for ($i=0; $i <count($noidung) ; $i++) 
        { 
            if($i==$dapan)
            {
                $query="insert into tblphuongan(noidung,img,audio,dapan,macau) values('".$noidung[$i]."','".$img[$i]."','".$audio[$i]."','0','$macau')";
            }
            else 
            {
                $query="insert into tblphuongan(noidung,img,audio,dapan,macau) values('".$noidung[$i]."','".$img[$i]."','".$audio[$i]."','1','$macau')";
            }
            $excute=mysqli_query($connect,$query);
            
        }

        header("Location:menusetting.php?addquestion=1&page=3&success&success2");
    }
    else 
    {
        header("Location:menusetting.php?addquestion=1&page=3&success&err2");
    }

