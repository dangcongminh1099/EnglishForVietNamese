<body>
    

<h2 id="tieudetable">Câu hỏi, phương án và đáp án</h2>
<?php
    $connect=connect("project");
    utf8($connect);
    $query="select cauhoi.macau,cauhoi.noidung,maphuongan,tblphuongan.noidung,img,audio,dapan from cauhoi left join tblphuongan on cauhoi.macau=tblphuongan.macau";
    $excute=mysqli_query($connect,$query);
    $a=mysqli_fetch_array($excute,MYSQLI_NUM);            
        if($a!=null)
        {

            
            $k=0;
            $arr2=[];
            $count=0;
            while ($a !=null) 
            {
                $count=0;
                
                while (true) 
                {
                    if($count!=0)
                    {
                        if($arr2[$k][$count-1][0]!=$a[0])
                        {
                            
                            break;
                        }
                        else 
                        {
                            $arr2[$k][$count]=$a;
                            $a=mysqli_fetch_array($excute,MYSQLI_NUM);
                            $count++;
                        }
                    }
                    else 
                    {
                        $arr2[$k][$count]=$a;
                        $count++;
                        $a=mysqli_fetch_array($excute,MYSQLI_NUM);
                    }
                    
                    
                }
                $k++;
                
                
            }
            
            
            
?>
    <form action="?page=4" >
        <table border="1" cellspacing="0">
        <tr>
            <td>Mã câu</td>
            <td>Nội dung câu hỏi</td>
            <td>Mã phương án</td>
            <td>Nội dung phương án</td>
            <td>Hình ảnh </td>
            <td>Âm thanh</td>
            <td>Đáp án</td>
            <td>Chọn</td>
        </tr>
            
<?php
            for ($x=0; $x <count($arr2) ; $x++) 
            { 

                for ($y=0; $y <count($arr2[$x]) ; $y++) 
                {          
?>
        <tr>
            <?php 
                    if($y==0)
                    {
                ?>
                        <th rowspan="<?php echo count($arr2[$x])?>">
                            <?php echo $arr2[$x][$y][0]?>
                        </th>
                        <td rowspan="<?php echo count($arr2[$x])?>">
                            <?php echo $arr2[$x][$y][1]?>
                        </td>
                <?php
                    }
                ?>
            
            <th>
                <?php echo $arr2[$x][$y][2]?>
            </th>
            <td>
                <?php echo $arr2[$x][$y][3]?>
            </td>
            <th>
                <?php
                    if($arr2[$x][$y][4]!=null)
                    {
                ?>
                        <img src="../<?php echo $arr2[$x][$y][4]?>" alt="" width="88px" height="80px"> 
                <?php
                    }
                    else 
                    {
                ?>
                        <span>Không có ảnh</span>
                <?php
                    }

                ?>
                
            </th>
            <th>
                <?php 
                    if($arr2[$x][$y][5]!=null)
                    {
                ?>
                        <audio src="../<?php echo $arr2[$x][$y][5]?>"  ></audio>
                        <i class="fa fa-play-circle" style="font-size:50px" onclick="playaudio(<?php echo $y?>)"></i>
                <?php
                    }
                    else 
                    {
                ?>
                        <span>Không có audio</span>
                <?php
                    }
                ?>
                
            </th>
            <th>
                <?php 
                    if($arr2[$x][$y][6]!=null)
                    {       
                        if($arr2[$x][$y][6]==0) 
                            echo 'Đúng';
                        else 
                            echo 'Sai';
                    }
                    else 
                    {
                ?>
                        <span>Chưa có đáp án</span>
                <?php
                    }
                ?>
            </th>
            <?php
                    if($y==0)
                    {
                ?>
                        <th rowspan="<?php echo count($arr2[$x])?>"><input type="checkbox" name="checkboxcauhoi[]" value="<?php echo $arr2[$x][$y][0]?>"></th>
                <?php
                    }
                    
                ?>        
        </tr>
<?php
                    
                }
            }
    ?>
        <tr style="height:70px;">
            <th colspan="2" ><input type="submit" style="height:35px; width:100%;" name="action" value="Xóa câu hỏi" onclick="return changeAction(1)"></th>
            <th colspan="2"><input type="submit" style="height:35px; width:100%;" name="action" value="Xóa phương án" onclick=" changeAction(3)"></th>
            <th colspan="2"><input type="submit" style="height:35px; width:100%;" name="action" value="Sửa câu hỏi" onclick=" changeAction(0)"></th>
            <th><input type="submit" style="height:35px; width:100%;" name="action" value="Sửa phương án" onclick=" changeAction(0)"></th>
            <th><input type="submit" style="height:35px; width:100%;" name="action" value="Thêm" onclick=" changeAction(2)"></th>
            <input type="number" name="page" value="4" style="visibility:hidden;" readonly id="chuyentrang">
        </tr>
    </table>
    </form>
        
    <?php
        }
        else
        {
    ?>
            <h2>Chưa có câu hỏi trong phần bài tập này</h2>
    <?php
        }
        
    ?>
    <script>
        function changeAction(x)
        {
            var form;
            if(x==1)
            {
                
                form=document.querySelector("form");
                form.action="xoacauhoi,baitap.php";
                return confirmerase();
            }
            else if(x==0)
            {
                form=document.querySelector("form");
                form.action="menusetting.php";
                var input;
                input=document.getElementById("chuyentrang");
                input.value="8";
            }
            else if(x==3)
            {
                form=document.querySelector("form");
                form.action="menusetting.php";
                var input;
                input=document.getElementById("chuyentrang");
                input.value="11";
            }
            else
            {
                form=document.querySelector("form");
                form.action="menusetting.php";
                var input;
                input=document.getElementById("chuyentrang");
                input.value="9";
            }
            return false;
            
        }
        function  confirmerase() 
        {
            return confirm("Bạn có chắc chắn muốn xóa mục này");
        }
         function  playaudio(x) 
        {
            var audio;
            audio=document.querySelectorAll("audio");
            for(var i=0;i<audio.length;i++)
            {
                if(i==x)
                {
                    audio[i].play();
                }
                else
                {
                    audio[i].pause();
                    audio[i].currentTime="0";
                }
            }
            
        }
    </script>
</body>