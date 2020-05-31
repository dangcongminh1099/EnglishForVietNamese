<?php 
include("../../connect/connect.php");
    $connect =connect("project");
    utf8($connect);
    if(isset($_GET["mabv"])&&isset($_GET["action"]))
    {  
        $mabv=$_GET["mabv"];
        $query="select noidung,tieude from noidungbaiviet where mabaiviet=$mabv";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
?>
        <h1 id="tieudebv"><?php echo $a[1] ?><i class="fa fa-close" data-icon="closeicon"></i></h1>
        <br><br>
<?php
        echo $a[0];
    }
    else if(isset($_GET["tk"])&&isset($_GET["action"]))
    {
        $tk=$_GET["tk"];
        $query="select tieude from noidungbaiviet where tieude like '%$tk%' and tinhtrang=0";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
        if($a==null)
        {
        ?>
            <li>Không có bài viết nào tìm thấy</li>
        <?php
        }
        else 
        {
            while($a!=null)
            {
                $arr=explode(" ",$a[0]);
                if(count($arr)>15)
                {
                ?>
                    <li><?php 
                            for ($i=0; $i <10 ; $i++) { 
                                echo ($arr[$i]." ");
                            }
                        ?></li>
                <?php
                }
                else {
                ?>
                    <li><?php echo $a[0]?></li>
                <?php
                }
                $a=mysqli_fetch_array($excute);
            }
        }
        
    }
    else if(isset($_GET["matheloai"])&&isset($_GET["action"])&&$_GET["action"]=="append")
    {
        $matheloai=$_GET["matheloai"];
        $query="select * from tbltheloai where matheloai in(select matheloai from noidungbaiviet) and matheloai > $matheloai limit 2";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
        $count=0;
        if($a==null)
        {

        }
        else 
        {
            while($a!=null)
            {
                $query="select * from noidungbaiviet where matheloai=".$a[0]." and tinhtrang=0 order by mabaiviet desc limit 4";
                $excute2=mysqli_query($connect,$query);
                $b=mysqli_fetch_array($excute2);
                $arr=[4];
                for ($i=0; $i <4 ; $i++) 
                { 
                    if($b==null)
                    {
                        $arr[$i]="";
                    }
                    else {
                        $arr[$i]=$b;
                        $b=mysqli_fetch_array($excute2);
                    }
                    
                    
                }
        ?>
            <div class="theloai" data-matheloai="<?php echo $a[0] ?>">
            <div class="btn_theloai"><a href="?option=5&matheloai=<?php echo $a[0] ?>"><button><?php echo $a[1] ?> >></button></div></a>
            <div class="nd">
                <div class="contentdong1">
                    <div class="blockcontent">
                        <?php if($arr[0]=="")
                        {
                        ?>
                            <a href="" >
                            <div class="img">
                                <img src="" alt="Chưa có hình ảnh">
                            </div>
                            </a>
                            <div class="contentnd">
                                <a href="" ><h3 class="ndtieude">Chưa có bài viết</h3></a>
                                <p class="ndmota"></p>
                            </div>
                        <?php
                        }
                        else {
                        ?>
                            <a href="" class="hienbv" data-mabv="<?php echo $arr[0][0] ?>">
                            <div class="img">
                                <img src="<?php echo $arr[0][3]?>" alt="">
                            </div>
                            </a>
                            <div class="contentnd">
                                <a href="" class="hienbv" data-mabv="<?php echo $arr[0][0] ?>"><h3 class="ndtieude"><?php echo $arr[0][1]?></h3></a>
                                <p class="ndmota"> <?php echo $arr[0][2]?></p>
                            </div>
                        <?php
                        }
                        ?>
                        
                    </div>
                    <div class="blockcontent">
                        <?php if($arr[1]=="")
                        {
                        ?>
                            <a href="" >
                            <div class="img">
                                <img src="" alt="Chưa có hình ảnh">
                            </div>
                            </a>
                            <div class="contentnd">
                                <a href=""><h3 class="ndtieude">Chưa có bài viết</h3></a>
                                <p class="ndmota"></p>
                            </div>
                        <?php
                        }
                        else {
                        ?>
                            <a href="" class="hienbv">
                            <div class="img" data-mabv="<?php echo $arr[1][0] ?>">
                                <img src="<?php echo $arr[1][3]?>" alt="">
                            </div>
                            </a>
                            <div class="contentnd">
                                <a href="" class="hienbv" data-mabv="<?php echo $arr[1][0] ?>"><h3 class="ndtieude"><?php echo $arr[1][1]?></h3></a>
                                <p class="ndmota"> <?php echo $arr[1][2]?></p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="contentdong2">
                    <div class="blockcontent">
                        <?php if($arr[2]=="")
                        {
                        ?>
                            <a href="" >
                            <div class="img">
                                <img src="" alt="Chưa có hình ảnh">
                            </div>
                            </a>
                            <div class="contentnd">
                                <a href=""><h3 class="ndtieude">Chưa có bài viết</h3></a>
                                <p class="ndmota"></p>
                            </div>
                        <?php
                        }
                        else {
                        ?>
                            <a href="" class="hienbv" data-mabv="<?php echo $arr[2][0] ?>">
                            <div class="img">
                                <img src="<?php echo $arr[2][3]?>" alt="">
                            </div>
                            </a>
                            <div class="contentnd">
                                <a href="" class="hienbv" data-mabv="<?php echo $arr[2][0] ?>"><h3 class="ndtieude"><?php echo $arr[2][1]?></h3></a>
                                <p class="ndmota"> <?php echo $arr[2][2]?></p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="blockcontent">
                        <?php if($arr[3]=="")
                        {
                        ?>
                            <a href="">
                            <div class="img">
                                <img src="" alt="Chưa có hình ảnh">
                            </div>
                            </a>
                            <div class="contentnd">
                                <a href=""><h3 class="ndtieude">Chưa có bài viết</h3></a>
                                <p class="ndmota"></p>
                            </div>
                        <?php
                        }
                        else {
                        ?>
                            <a href="" class="hienbv" data-mabv="<?php echo $arr[3][0] ?>">
                            <div class="img" >
                                <img src="<?php echo $arr[3][3]?>" alt="">
                            </div>
                            </a>
                            <div class="contentnd">
                                <a href="" class="hienbv" data-mabv="<?php echo $arr[3][0] ?>"><h3 class="ndtieude"><?php echo $arr[3][1]?></h3></a>
                                <p class="ndmota"> <?php echo $arr[3][2]?></p>
                            </div>
                        <?php
                        
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $a=mysqli_fetch_array($excute);
            }
        }
    }
?>