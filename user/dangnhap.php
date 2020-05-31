<?php
    session_start();
    include("../connect/connect.php");
    if(isset($_POST["tk"])&&isset($_POST["mk"]))
    { 
        $connect=connect("project");
        utf8($connect);
        $tk=$_POST["tk"];
        $mk=$_POST["mk"];
        $query= "select * from tblnguoidung where capdo=3";
        $ex=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($ex);
        $kt=1;
        while($a!=null)
        {
            if($a["tentk"]==$tk)
            {
                if($a["matkhau"]==$mk)
                {
                    $kt=0;
                    break;
                }
                else
                {
                    break;
                }
                
            }
            $a=mysqli_fetch_array($ex);
        }
        if($kt==1)
        {
            close($connect);
            header("Location:../index.php?err");

        }
        else
        {
            $_SESSION["tk"]=$a;
            close($connect);
            header("Location:../index.php?success");
        }
        
        
    }
    else if(isset($_POST["tk_register"])&&isset($_POST["mk_register"])&&isset($_POST["email"]))
    {
        $connect=connect("project");
        $tk=$_POST["tk_register"];
        $mk=$_POST["mk_register"];
        $email=$_POST["email"];
        $query="select*from tblnguoidung where tentk='$tk' or email='$email'";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
        if($a==null)
        {
            $query="insert into tblnguoidung(tentk,matkhau,email,capdo) values('$tk','$mk','$email',3)";
            $excute=mysqli_query($connect,$query);
            $query="select*from tblnguoidung where tentk='$tk'";
            $excute=mysqli_query($connect,$query);
            $a=mysqli_fetch_array($excute);
            $_SESSION["tk"]=$a;
            close($connect);
            header("Location:../index.php?success_register");
        }
        else
        {
            close($connect);
            header("Location:../index.php?err_register");
        }
        
        

    }
    else if(isset($_GET["logout"]))
    {
        
        unset($_SESSION["tk"]);
        close($connect);
        header("Location:../index.php");
        
    }
    else if(isset($_POST["tk_change"])&&isset($_POST["mk_change"])&&isset($_POST["mk2_change"]))
    {
        $tk=$_POST["tk_change"];
        $mk=$_POST["mk_change"];
        $mkms=$_POST["mk2_change"];
        $connect=connect("project");
        utf8($connect);
        $query="select tentk,matkhau from tblnguoidung where capdo=3";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute,MYSQLI_NUM);

        $kt=1;
        while ($a !=null) 
        {
            if($a[0]==$tk)
            {
                if($a[1]==$mk)
                {
                    $query="update  tblnguoidung set matkhau='$mkms' where capdo=3 and tentk='$tk'";
                    echo $query;
                    $excute=mysqli_query($connect,$query);
                    $kt=0;
                    break;

                }
                else 
                {
                    break;
                }
            }

            $a=mysqli_fetch_array($excute,MYSQLI_NUM);
            
            
        }
        if($kt==1)
        {
            header("Location:../index.php?err_change"); 
        }
        else 
        {
            header("Location:../index.php?success_change"); 
        }
        
    }
    else if(isset($_POST["tk_change"])&&isset($_POST["mk_change"])&&isset($_POST["email_change"]))
    {
        $tk=$_POST["tk_change"];
        $mk=$_POST["mk_change"];
        $email=$_POST["email_change"];
        $connect=connect("project");
        utf8($connect);
        $query="select tentk,matkhau from tblnguoidung where capdo=3";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute,MYSQLI_NUM);

        $kt=1;
        while ($a !=null) 
        {
            if($a[0]==$tk)
            {
                if($a[1]==$mk)
                {
                    $query="update  tblnguoidung set email='$email' where capdo=3 and tentk='$tk'";
                    echo $query;
                    $excute=mysqli_query($connect,$query);
                    $kt=0;
                    break;

                }
                else 
                {
                    break;
                }
            }

            $a=mysqli_fetch_array($excute,MYSQLI_NUM);
            
            
        }
        if($kt==1)
        {
            header("Location:../index.php?err_change_email"); 
        }
        else {
            header("Location:../index.php?success_change_email"); 
        }
        
    }
    else
    {
        close($connect);
        header("Location:../index.php");
    }
?>