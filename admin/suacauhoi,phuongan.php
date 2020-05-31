<body>
    
    <?php
        $connect=connect("project");
        utf8($connect);
        if(isset($_GET["checkboxcauhoi"])&&isset($_GET["action"])&&$_GET["action"]=="Sửa câu hỏi")
        {
        ?>
            <h2 id="tieudetable">Sửa câu hỏi</h2>
        <?php
            $checkboxcauhoi=$_GET["checkboxcauhoi"];
            $query="select * from cauhoi where macau in(";
            for ($i=0; $i <count($checkboxcauhoi); $i++) 
            { 
                if($i==count($checkboxcauhoi)-1)
                {
                    $query=$query.$checkboxcauhoi[$i].")";
                }
                else 
                {
                    $query=$query.$checkboxcauhoi[$i].",";
                }
            }
            $excute=mysqli_query($connect,$query);
            $a=mysqli_fetch_array($excute,MYSQLI_NUM);

        ?>
        <form action="suacauhoi.php">
            <table border="1" cellspacing="0">
                <tr>
                    <td>Mã câu</td>
                    <td>Nội dung</td>
                    <td>Mã bài viết, bài tập</td>
                </tr>
            <?php
                while ($a !=null) 
                {
            ?>

            
                <tr>
                    <td><input type="number" readonly name="macau[]" value="<?php echo $a[0]?>"></td>
                    <td><input type="text"  name="noidung[]" value="<?php echo $a[1]?>"></td>
                    <td>
                        <select name="mabaiviet_baitap[]" id="">
                        <?php
                            $query="select mabaiviet_baitap,tieude from baiviet_baitap";
                            $excute_baiviet=mysqli_query($connect,$query);
                            $b=mysqli_fetch_array($excute_baiviet,MYSQLI_NUM);
                            while ($b !=null) 
                            {
                        ?>
                                <option value="<?php echo $b[0]?>"><?php echo $b[1]?></option>
                        <?php
                                $b=mysqli_fetch_array($excute_baiviet,MYSQLI_NUM);
                            }
                        ?>
                        </select>
                    </td>

                </tr>
            <?php
                $a=mysqli_fetch_array($excute,MYSQLI_NUM);
                }
            ?>
            <tr>
                <th colspan="3"><a href=""><button>Thay đổi</button></a></th>
            </tr>
            </table>
        </form>
        <?php
        }
        else if(isset($_GET["checkboxcauhoi"])&&isset($_GET["action"])&&$_GET["action"]=="Sửa phương án")
        {
        ?>
            <h2 id="tieudetable">Sửa phương án</h2>
        <?php
            $checkboxcauhoi=$_GET["checkboxcauhoi"];
            $query="select * from tblphuongan where macau in(";
            for ($i=0; $i <count($checkboxcauhoi); $i++) 
            { 
                if($i==count($checkboxcauhoi)-1)
                {
                    $query=$query.$checkboxcauhoi[$i].")";
                }
                else 
                {
                    $query=$query.$checkboxcauhoi[$i].",";
                }
            }
            $excute=mysqli_query($connect,$query);
            $a=mysqli_fetch_array($excute,MYSQLI_NUM);
            $count=0;
        ?>
        <form action="">
            <table border="1" cellspacing="0">
                <tr>
                    <td>Mã phương án</td>
                    <td>Câu hỏi</td>
                    <td>hình ảnh</td>
                    <td>Audio </td>
                    <td>Đáp án</td>
                </tr>
            <?php
                while ($a !=null) 
                {
            ?>

            
                <tr>
                    <td><input type="number" readonly name="macau[]" value="<?php echo $a[0]?>"></td>
                    <td><input type="text"  name="noidung[]" value="<?php echo $a[1]?>"></td>
                    <td>
                        <?php
                            if ($a[2]!=null) 
                            {
                        ?>
                                <img src="../<?php echo $a[2]?>" alt="" style="width:70px;height:70px">
                                <br>
                                <button>Sửa hình ảnh</button>
                        <?php
                            }
                            else 
                            {
                        ?>
                                <button>Thêm hình ảnh</button>
                        <?php        
                            }
                        ?>
                        
                    </td>
                    <th>
                        <audio src="../<?php echo $a[3]?>"></audio>
                        <?php if($a[3]!=null)
                        {
                        ?>
                        
                            <i class="fa fa-play-circle" style="font-size:50px" onclick="playaudio(<?php if($a!=null) echo $count; $count++; ?>)"></i>
                            <br>    
                            <button>Chỉnh âm thanh</button>
                        <?php
                        }
                        else 
                        {
                        ?>
                            <button>Thêm âm thanh</button>
                        <?php   
                        }
                        ?>

                    
                    </th>
                        
                    

                    <th>
                        <select name="dapan" id="">
                            <option value="1" <?php if($a[4]==1) echo"selected" ?>>Sai</option>
                            <option value="0" <?php if($a[4]==0) echo"selected" ?>>Đúng</option>
                        </select>
                    </th>
                </tr>
            <?php
                $a=mysqli_fetch_array($excute,MYSQLI_NUM);
                }
            ?>
            <tr>
                <th colspan="6"><a href=""><button>Thay đổi</button></a></th>
            </tr>
            </table>
        </form>
        <?php
        }
    ?>
    <script>
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