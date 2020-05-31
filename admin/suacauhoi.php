<?php 
    session_start();
    include("../connect/connect.php");
    $connect=connect("project");
    utf8($connect);
    if(isset($_POST["macau"])&&isset($_POST["noidung"])&&isset($_POST["mabaiviet_baitap"])&&isset($_POST["action"])&&$_POST["action"]=="chinhsua")
    {
        $macau=$_POST["macau"];
        $noidung=$_POST["noidung"];
        $danhmuc=$_POST["madanhmuc"];
        $mabaiviet_baitap=$_POST["mabaiviet_baitap"];
        $urlmahoa="";
        if(is_array($macau))
        {
            for ($i=0; $i <count($macau) ; $i++) 
            { 
                if(isset($_FILES["audio"])&&$_FILES["audio"]["name"][$i]!=""&&$_FILES["audio"]["size"][$i]>0)
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
                        $audio[$i]=$linksavedatabase;
                        move_uploaded_file($saveVolatitle,$linksave);
                    }       
                }
                else if(isset($_POST["audiochuacs"]))
                {
                    $audio[$i]=$_POST["audiochuacs"][$i];
                }
                else {
                    $audio[$i]="";
                }
                if($audio[$i]=="")
                {
                    $query="update cauhoi set  noidung='".$noidung[$i]."',mabaiviet_baitap=".$mabaiviet_baitap[$i].",audio=NULL where macau=".$macau[$i];
                }
                else
                {
                    $query="update cauhoi set  noidung='".$noidung[$i]."',mabaiviet_baitap=".$mabaiviet_baitap[$i].",audio='".$audio[$i]."' where macau=".$macau[$i];
                }
                
                echo $query;
                $excute=mysqli_query($connect,$query);
                if($_SESSION["tkadmin"][3]==2)
                {
                    $query="update baiviet_baitap set tinhtrang=1 where mabaiviet_baitap=".$mabaiviet_baitap[$i];
                    $excute=mysqli_query($connect,$query);
                }

            }
            header("Location:menusetting.php?page=3&mabt=".$mabaiviet_baitap[0]."&option=1&trang=0");
        }
        else 
        {
            if(isset($_FILES["audio"])&&$_FILES["audio"]["name"]!=""&&$_FILES["audio"]["size"]>0)
            {
                $tenfile=$_FILES["audio"]["name"];
                $tenaudio=pathinfo($_FILES["audio"]["name"],PATHINFO_FILENAME);
                $duoifile=pathinfo($_FILES["audio"]["name"],PATHINFO_EXTENSION);
                $kieufile=pathinfo($_FILES["audio"]["type"],PATHINFO_BASENAME);
                $saveVolatitle=$_FILES["audio"]["tmp_name"];
                $error=$_FILES["audio"]["error"];
                $size=$_FILES["audio"]["size"];
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
                $audio=$_POST["audiochuacs"];
            }
            if($audio=="")
            {
                $query="update cauhoi set  noidung='$noidung',mabaiviet_baitap=$mabaiviet_baitap,audio=NULL where macau=$macau";
            }
            else
            {
                $query="update cauhoi set  noidung='$noidung',mabaiviet_baitap=$mabaiviet_baitap,audio='$audio' where macau=$macau";
            }
        
            echo $query;
            $excute=mysqli_query($connect,$query);
            if($_SESSION["tkadmin"][3]==2)
            {
                $query="update baiviet_baitap set tinhtrang=1 where mabaiviet_baitap=$mabaiviet_baitap";
                $excute=mysqli_query($connect,$query);
            }
            header("Location:menusetting.php?page=3&mabt=$mabaiviet_baitap&option=5&trang=0&macau=$macau&danhmuc=$danhmuc&success=5");
        }
    }
    else if(isset($_GET["action"])&&$_GET["action"]=="xoa"&&isset($_GET["macau"])&&isset($_GET["mabt"]))
    {
        $macau=$_GET["macau"];
        $mabt=$_GET["mabt"];
        if(is_array($macau))
        {
            $query="delete from cauhoi where macau in(";
            for ($i=0; $i < count($macau); $i++) 
            { 
                if($i==count($macau)-1)
                {
                    $query=$query.$macau[$i].")";
                }
                else 
                {
                    $query=$query.$macau[$i].",";
                }
                
            }
        }
        else 
        {
            $query="delete from cauhoi where macau =$macau";
        }
        echo $query;
        $excute=mysqli_query($connect,$query);
        header("Location:menusetting.php?page=3&mabt=$mabt&option=1&trang=0");
    }
    else 
    {
        header("Location:menusetting.php");
       
    }
?>