
<?php
    session_start();
    include("../connect/connect.php");
    $connect=connect("project");
    utf8($connect);
    if(isset($_POST["mabaiviet_baitap"])&&isset($_POST["noidungcauhoi"])&&isset($_POST["action"])&&$_POST["action"]=="chinhsua"&&isset($_POST["macau"])&&isset($_POST["dapan"])&&isset($_POST["danhmuc"])&&isset($_POST["noidung"])&&isset($_POST["maphuongan"]))
    {
        $mabaiviet_baitap=$_POST["mabaiviet_baitap"];
        $noidung=$_POST["noidungcauhoi"];
        $macau=$_POST["macau"];
        $danhmuc=$_POST["danhmuc"];
        $maphuongan=$_POST["maphuongan"];
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
        else if(isset($_POST["audiochuacs"]))
        {
            $audio=$_POST["audiochuacs"];
        }
        else
        {
            $audio="";
        }
        if($audio=="")
        {
            $query="update cauhoi set noidung='$noidung',mabaiviet_baitap=$mabaiviet_baitap,audio=NULL where macau=$macau";
        }
        else
        {
            $query="update cauhoi set noidung='$noidung',mabaiviet_baitap=$mabaiviet_baitap,audio='$audio' where macau=$macau";
        }
        $excute=mysqli_query($connect,$query);
        echo $query;
        if(isset($_POST["audiogoc"])&&isset($_POST["imggoc"]))
        {
            $noidung=$_POST["noidung"];
            $dapan=$_POST["dapan"];
            $mabaitap=$_POST["mabaiviet_baitap"];
            $macau=$_POST["macau"];
            $imggoc=$_POST["imggoc"];
            $audiogoc=$_POST["audiogoc"];
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
                        $img[$i]=$imggoc[$i];
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
                        $audio[$i]=$audiogoc[$i];
                    }
                }
        
            }
            for ($i=0; $i <count($noidung) ; $i++) 
            { 
                
                if($i==$dapan)
                {
                    $query="update tblphuongan set noidung='".$noidung[$i]."',img='".$img[$i]."',audio='".$audio[$i]."',dapan=0 where maphuongan=".$maphuongan[$i];
                }
                else 
                {
                    $query="update tblphuongan set noidung='".$noidung[$i]."',img='".$img[$i]."',audio='".$audio[$i]."',dapan=1 where maphuongan=".$maphuongan[$i];
                }
                $excute=mysqli_query($connect,$query);
                
            }
            if($_SESSION["tkadmin"][3]==2)
            {
                $query="update baiviet_baitap set tinhtrang=1 where mabaiviet_baitap=$mabaiviet_baitap";
                $excute=mysqli_query($connect,$query);
            }
            header("Location:menusetting.php?page=3&option=7&macau=$macau&mabt=$mabaiviet_baitap&danhmuc=$danhmuc");
    
        }
        else
        {
            $noidung=$_POST["noidung"];
            $dapan=$_POST["dapan"];
            $macau=$_POST["macau"];
            for ($i=0; $i <count($noidung) ; $i++) 
            { 
                
                if($i==$dapan)
                {
                    $query="update tblphuongan set noidung='".$noidung[$i]."',img=NULL,audio=NULL,dapan=0 where maphuongan=".$maphuongan[$i];
                }
                else 
                {
                    $query="update tblphuongan set noidung='".$noidung[$i]."',img=NULL,audio=NULL,dapan=1 where maphuongan=".$maphuongan[$i];
                }
                echo $query;
                $excute=mysqli_query($connect,$query);
                if($_SESSION["tkadmin"][3]==2)
                {
                    $query="update baiviet_baitap set tinhtrang=1 where mabaiviet_baitap=$mabaiviet_baitap";
                    $excute=mysqli_query($connect,$query);
                }
                
            }
            echo $dapan;
            header("Location:menusetting.php?page=3&option=7&macau=$macau&mabt=$mabaiviet_baitap&danhmuc=$danhmuc");
        }
    }
    
    else if(isset($_GET["maphuongan"])&&isset($_GET["action"])&&$_GET["action"]=="xoa"&&isset($_GET["option"])&&isset($_GET["danhmuc"])&&isset($_GET["mabt"])&&isset($_GET["macau"]))
    {
        
        $maphuongan=$_GET["maphuongan"];
        $option=$_GET["option"];
        $danhmuc=$_GET["danhmuc"];
        $mabt=$_GET["mabt"];
        $macau=$_GET["macau"];
        $query="select count(maphuongan) from tblphuongan where macau=".$_GET["macau"];
        $excute=mysqli_query($connect,$query);
        $sophuongan=mysqli_fetch_array($excute)[0];
        if($sophuongan<=2)
        {
            header("Location:menusetting.php?page=3&option=$option&macau=$macau&mabt=$mabt&danhmuc=$danhmuc&errxoacau");
        }
        else
        {
            $query="delete from tblphuongan where maphuongan=$maphuongan";
            $excute=mysqli_query($connect,$query);
            header("Location:menusetting.php?page=3&option=$option&macau=$macau&mabt=$mabt&danhmuc=$danhmuc");
        }
    }
    else if(isset($_GET["maphuongan"])&&isset($_GET["action"])&&$_GET["action"]=="them"&&isset($_GET["option"])&&isset($_GET["danhmuc"])&&isset($_GET["mabt"])&&isset($_GET["macau"]))
    {
        $maphuongan=$_GET["maphuongan"];
        $option=$_GET["option"];
        $danhmuc=$_GET["danhmuc"];
        $mabt=$_GET["mabt"];
        $macau=$_GET["macau"];
        $query="select count(maphuongan) from tblphuongan where macau=".$_GET["macau"];
        $excute=mysqli_query($connect,$query);
        $sophuongan=mysqli_fetch_array($excute)[0];
        if($sophuongan>=5)
        {
            header("Location:menusetting.php?page=3&option=$option&macau=$macau&mabt=$mabt&danhmuc=$danhmuc&errthemcau");
        }
        else
        {
            $query="insert into tblphuongan(noidung,img,audio,dapan,macau) values('','','',1,'$macau')";
            $excute=mysqli_query($connect,$query);
            if($_SESSION["tkadmin"][3]==2)
            {
                $query="update baiviet_baitap set tinhtrang=1 where mabaiviet_baitap=$mabt";
                $excute=mysqli_query($connect,$query);
            }
            header("Location:menusetting.php?page=3&option=$option&macau=$macau&mabt=$mabt&danhmuc=$danhmuc");
        }
    }
    else 
    {
        header("Location:menusetting.php");
    }


?>
<pre>
    <?php var_dump( $_FILES)?>
</pre>