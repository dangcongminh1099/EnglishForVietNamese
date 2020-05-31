 <?php
 session_start();
    include("../connect/connect.php");
    if(isset($_POST["tk"])&&isset($_POST["mk"]))
    { 
        $connect=connect("project");
        utf8($connect);
        $tk=$_POST["tk"];
        $mk=$_POST["mk"];
        $query= "select * from tblnguoidung where capdo in(1,2)";
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
            header("Location:index.php?err");

        }
        else
        {
            $_SESSION["tkadmin"]=$a;
            close($connect);
            header("Location:menusetting.php");
        }
        
        
    }
    else if(isset($_GET["logout"]))
    {
        
        unset($_SESSION["tkadmin"]);
        close($connect);
        header("Location:index.php");
        
    }
    else
    {
        close($connect);
        header("Location:index.php");
    }
?>