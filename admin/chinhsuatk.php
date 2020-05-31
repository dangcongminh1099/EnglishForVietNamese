<?php
    session_start();
    $connect=new mysqli("localhost","root","","project");
    if(isset($_GET["tk"])&&isset($_GET["tk2"])&&isset($_GET["capdo"])&&$_GET["capdo"]!=0&&isset($_GET["action"])&&$_GET["action"]=="sua"&&isset($_GET["mk"])&&isset($_GET["email"]))
    {
        $tk=$_GET["tk"];
        $tk2=$_GET["tk2"];
        $mk=$_GET["mk"];
        $email=$_GET["email"];
        $capdo=$_GET["capdo"];
        if($_SESSION["tkadmin"][3]==2)
        {
            if($capdo==1)
            {
                header("Location:menusetting.php?page=5&err");
            }
        }
        $query="select * from tblnguoidung ";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
        $count=0;
        while($a!=null)
        {
            if($a[0]==$tk)
            {
                $count++;
            }
            $a=mysqli_fetch_array($excute);
        }
        if($count==0)
        {
            $query="update tblnguoidung set tentk='$tk',matkhau='$mk',email='$email',capdo=$capdo where tentk='$tk2'";
            echo $query;
            mysqli_query($connect,$query);
            header("Location:menusetting.php?page=5&succe");
            
        }
        else
        {
            header("Location:menusetting.php?page=5&err");
        }
    }
    else if(isset($_GET["tk"])&&isset($_GET["mk"])&&isset($_GET["email"])&&isset($_GET["capdo"])&&isset($_GET["action"])&&$_GET["action"]=="them")
    {
        $tk=$_GET["tk"];
        $mk=$_GET["mk"];
        $email=$_GET["email"];
        $capdo=$_GET["capdo"];
        if($_SESSION["tkadmin"][3]==2)
        {
            if($capdo==1)
            {
                header("Location:menusetting.php?page=5&err");
            }
        }
        $query="insert into tblnguoidung values('$tk','$mk','$email','$capdo')";
        mysqli_query($connect,$query);
        header("Location:menusetting.php?page=5&succe");
    
    }
?>