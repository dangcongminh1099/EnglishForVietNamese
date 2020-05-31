<body>
    <h2>Các bài viết hoặc bài tập chưa được xuất hiện trên website</h2>
    <h3> >>> Bài tập</h3>
    <form action="">
        <table border="1" cellspacing="0">
            <tr>
                <td>Tiêu đề</td>    
                <td>Mô tả</td>
                <td>img</td>
                <td>link</td>
                <td>Xem chi tiết</td>
                <td>Chọn</td>
                
            </tr>
            <?php
            $connect=connect("project");
            utf8($connect);
            $query="select * from baiviet_baitap where tinhtrang=1";
            $excute=mysqli_query($connect,$query);
            $a=mysqli_fetch_array($excute);
                while($a!=null)
                {
            ?>
                <tr>
                    <td><?php echo $a["tieude"];?></td>
                    <td><?php echo $a["mota"];?></td>
                    <td><img src="../<?php echo $a["img"];?>" alt="" width="50px" height="50px"></td>
                    <td><?php echo $a["link"];?></td>
                    <td><a href="?page=3&&mabt=<?php echo $a[0]?>&option=1&trang=1"><button type="button">Chi tiết</button></a></td>
                    <td><input type="checkbox" name="array[]" value="<?php echo $a['mabaiviet_baitap'];?>"></td>
                </tr>
            <?php
                    $a=mysqli_fetch_array($excute);
                }
            ?>
            
        </table>
        <div id="congcu" style="position:fixed;top:17%;text-align:center;right:8%;">
            <button style="background-color:#007ACC" name="action" value="public" type="submit"  onclick="changeaction()">Hiện lên web</button>
        </div>
    
    <h3> >>> Bài viết</h3>
        <table border="1" cellspacing="0">
            <tr>
                <td>Tiêu đề</td>    
                <td>Mô tả</td>
                <td>img</td>
                <td>Ngày khởi tạo</td>
                <td>Xem chi tiết</td>
                <td>Chọn</td>
                
            </tr>
            <?php
            $query="select * from noidungbaiviet where tinhtrang=1";
            $excute=mysqli_query($connect,$query);
            $a=mysqli_fetch_array($excute);
                while($a!=null)
                {
            ?>
                <tr>
                    <td><?php if(strlen($a["tieude"])>25) echo substr($a["tieude"],0,25); else echo $a["tieude"];?></td>
                    <td><?php if(strlen($a["mota"])>80) echo substr($a["mota"],0,80); else echo $a["mota"];?></td>
                    <td><img src="../<?php echo $a["img"];?>" alt="" width="50px" height="50px"></td>
                    <td><?php echo $a["thoigian"];?></td>
                    <td><a href="?page=4&hd=chitiet&mabaiviet=<?php echo $a[0]?>"><button type="button">Chi tiết</button></a></td>
                    <td><input type="checkbox" name="array2[]" value="<?php echo $a['mabaiviet'];?>"></td>
                </tr>
            <?php
                    $a=mysqli_fetch_array($excute);
                }
            ?>
            
        </table>
        <div id="congcu" style="position:fixed;top:17%;text-align:center;right:8%;">
            <button style="background-color:#007ACC" name="action" value="public" type="submit"  onclick="changeaction()">Hiện lên web</button>
        </div>
    </form>
    <script>
        function playaudio(x) 
        {
            var a;
            a=document.querySelectorAll("audio");
            for(var i=0;i<a.length;i++)
            {
                if(i==x)
                {
                    a[i].play();

                }
                else
                {
                    a[i].pause();
                    a[i].currentTime=0;
                }
            }
        }
        function  changeaction() 
        {
            var action;
            action=document.querySelector("form");
            action.action="publicbaivietbaitap.php";
            return true;
        }
        function clicksss() 
        {
            var a;
            a=document.getElementsByName("action");
            a[0].click();
        }
    </script>
</body>
