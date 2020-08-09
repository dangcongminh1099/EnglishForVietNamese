<body>
    <?php
    $connect=connect("project");
    utf8($connect);
    if(isset($_GET["tentheloai"]))
    {
        $tentheloai=$_GET["tentheloai"];
        $query="select tentheloai,tieude,img from tbltheloai where tentheloai=$tentheloai and tinhtrang=0";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
    }
    else 
    {
        
        $query="select baiviet_baitap.matheloai,mabaiviet_baitap,tentheloai,tieude,img from tbltheloai inner join baiviet_baitap on tbltheloai.matheloai=baiviet_baitap.matheloai where madanhmuc=3 and tinhtrang=0 order by baiviet_baitap.matheloai";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
        $matheloai=$a["matheloai"];
    }
        


?>    
    <form action="">
        <div id="search">
            <input type="text" value="" name="tentheloai"><i class="fa fa-search"></i>
            
        </div>
    </form>
    <table border="0" cellspacing="30" id="menutuvung" cellpadding="10">
        
        <tr>
            <td colspan="5"><h2><?php  echo $a["tentheloai"];?></h2></td>
        </tr>
        <tr>
    <?php
    $count=0;
    while($a!=null)
    {
       
    ?>
       
            <td class="icon">
                <a href="?option=3&mabaitap=<?php echo $a["mabaiviet_baitap"]?>">
                    <img src="<?php echo $a["img"]?>" width="100px" height="100px"alt="">
                    <p><?php echo $a["tieude"]; ?></p>
                    <?php if(isset($_SESSION["tk"])&&count(explode("||".$a["mabaiviet_baitap"]."||",$_SESSION["tk"]["quatrinh"]))==2) {?><i class="fa fa-check" style="font-size:35px;"></i><?php } ?>
                </a>
            </td>
        
    <?php
        $count++;
        $a=mysqli_fetch_array($excute);
        if($a==null)
            break;
        if($count==5 && $a["matheloai"]!=$matheloai)
        {
            $matheloai=$a["matheloai"];
            $count=0;
            
        ?>
            </tr>
            <tr>
                <td colspan="5"><h2><?php  echo $a["tentheloai"];?></h2></td>
            </tr>
            <tr>
        <?php
        }
        else if($count%5==0)
        {
            $count=0;
        ?>
            </tr>
            <tr>
        <?php  
        }
        else if ($a["matheloai"]!=$matheloai) 
        {
            $matheloai=$a["matheloai"];
            $count=0;
        ?>
            </tr>
            <tr>
                <td colspan="5"><h2><?php  echo $a["tentheloai"];?></h2></td>
            </tr>
            <tr>
        <?php
        }
    }
    close($connect);
    ?>

        </tr>

    </table>
        
    
    
</body>