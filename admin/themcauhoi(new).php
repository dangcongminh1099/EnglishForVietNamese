<?php
    session_start();
    include("../connect/connect.php");
    $connect=connect("project");
    utf8($connect);
    if(isset($_POST["noidungcauhoi"])&&isset($_POST["mabaiviet_baitap"])&&$_POST["mabaiviet_baitap"]!=0&&isset($_POST["action"])&&$_POST["action"]=="Thêm"&&isset($_POST["noidung"])&&isset($_POST["dapan"]))
    {
        $noidung=$_POST["noidungcauhoi"];
        $mabaiviet_baitap=$_POST["mabaiviet_baitap"];
        $query="select madanhmuc from tbltheloai where matheloai =(select matheloai from baiviet_baitap where mabaiviet_baitap=$mabaiviet_baitap)";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
        $madanhmuc=$a[0];
        $audio="";
        if(isset($_FILES["audiobt"])&&$_FILES["audiobt"]["name"]!=""&&$_FILES["audiobt"]["size"]>0)
        {
            $tenfile=$_FILES["audiobt"]["name"];
            $tenaudio=pathinfo($_FILES["audiobt"]["name"],PATHINFO_FILENAME);
            $duoifile=pathinfo($_FILES["audiobt"]["name"],PATHINFO_EXTENSION);
            $kieufile=pathinfo($_FILES["audiobt"]["type"],PATHINFO_BASENAME);
            $saveVolatitle=$_FILES["audiobt"]["tmp_name"];
            $error=$_FILES["audiobt"]["error"];
            $size=$_FILES["audiobt"]["size"];
            $count=0;
            $duoifilechophep=["mp3"];
            $typechophep=["mp3"];
            $linksave="../user/audio/audio cauhoi/$tenfile";
            $linksavedatabase="user/audio/audio cauhoi/$tenfile";
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
                    $linksave="../user/audio/audio cauhoi/$tenfile";
                    $linksavedatabase="user/audio/audio cauhoi/$tenfile";
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
                $audio=$linksavedatabase;
                move_uploaded_file($saveVolatitle,$linksave);
            }
        
        
        }
        else
        {
            $audio="";
        }
        ?>
            <pre>

            <?php var_dump($audio)?>
            </pre>
        <?php
        if($audio=="")
        {
            $query="insert into cauhoi(noidung,mabaiviet_baitap,audio) values('$noidung','$mabaiviet_baitap',NULL)";
        }
        else 
        {
            $query="insert into cauhoi(noidung,mabaiviet_baitap,audio) values('$noidung','$mabaiviet_baitap','$audio')";
        }

        $excute=mysqli_query($connect,$query);
        if($_SESSION["tkadmin"][3]==2)
        {
            $query="update baiviet_baitap set tinhtrang=1 where mabaiviet_baitap=$mabaiviet_baitap ";
            $excute=mysqli_query($connect,$query);
        }
        $query="select macau from cauhoi where mabaiviet_baitap=$mabaiviet_baitap order by macau desc";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
        $macau=$a["macau"];
        echo $macau;
        $noidung=$_POST["noidung"];
        $dapan=$_POST["dapan"];
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
                    $duoifilechophep=["mp3"];
                    $typechophep=["mp3"];
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
            echo $query;
            $excute=mysqli_query($connect,$query);
            
        }
        header("Location:menusetting.php?mabt=$mabaiviet_baitap&page=3&macau=$macau&success");
        ?>
    <?php
        
    }
    else 
    {
        header("Location:menusetting.php?mabt=$mabaiviet_baitap&page=3&err");
    ?>
        <pre>
            <?php var_dump($_POST);?>
        </pre>
    <?php
    }

?>