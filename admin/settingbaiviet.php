<body>
    <?php 
        $connect=connect("project");
        utf8($connect);
        $query="select * from noidungbaiviet ";
        if(isset($_GET["search"])&&$_GET["search"]==0)
        {
                $tieude=$_GET["tieudetk"];
                $thoigian=$_GET["thoigiantk"];
                $query="select * from noidungbaiviet where tieude like '%$tieude%' and thoigian >'$thoigian'";
                if($_GET["tinhtrangtk"]!=-1)
                {
                    $tinhtrang=$_GET["tinhtrangtk"];
                    $query=$query." and tinhtrang=$tinhtrang";
                }
                if($_GET["matheloaitk"]!=0)
                {
                    $matheloai=$_GET["matheloaitk"];
                    $query=$query." and matheloai=$matheloai";
                }
                echo $query;
            

        }
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
        $query="select *from tbltheloai";
        
        $excute2=mysqli_query($connect,$query);
        $b=mysqli_fetch_array($excute2);
        

    ?>
    <form action="menusetting.php" id="formtk">
        <table>
            <tr>
            <input type="hidden" value="4" name="page">
                <th>Tên bài viết</th>
                <th>Ngày khởi tạo</th>
                <th>Tình trạng</th>
                <th>Mã thể loại</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="tieudetk" value="<?php if(isset($_GET["tieudetk"])) echo $_GET["tieudetk"] ?>">
                </td>
                <td>
                    <input type="date" name="thoigiantk" value="<?php if(isset($_GET['thoigiantk'])) echo $_GET['thoigiantk'];?>">
                </td>
                <td>
                    <select name="tinhtrangtk" id="" onchange="document.getElementById('formtk').submit();">
                        <option value="-1">Chọn tình trạng</option>
                        <option value="0" <?php if(isset($_GET["tinhtrangtk"])&&$_GET["tinhtrangtk"]==0) echo"selected"; ?>>Đã xuất bản</option>
                        <option value="1" <?php if(isset($_GET["tinhtrangtk"])&&$_GET["tinhtrangtk"]==1) echo"selected"; ?>>Chưa xuất bản</option>
                    </select>
                </td>
                <td>
                    <select name="matheloaitk" id="" onchange="document.getElementById('formtk').submit();">
                        <option value="0">Chọn mã thể loại</option>
                        <?php
                            while($b!=null)
                            {
                        ?>
                            <option <?php if(isset($_GET["matheloaitk"])&&$_GET["matheloaitk"]==$b[0]) echo"selected"; ?> value="<?php echo $b[0] ?>"><?php echo $b[1] ?></option>
                        <?php
                            $b=mysqli_fetch_array($excute2);
                            }
                        ?>
                    </select>
                </td>
            
            
            </tr>
            <tr>
                <input type="hidden"  name="search" value="0">
                <th colspan="4"><button tupe="button"> Tìm kiếm</button> </th>
            </tr>
        </table>
    </form>
    <br>
    <a href="?page=4&type=thembv"><button type="button">Thêm bài viết</button></a>
    <br>
    <br>
    <table id="lietkecacbv" cellspacing="0">
        <tr>
            <td style="width:7%">Mã bài</td>
            <td style="width:45%">Tiêu đề</td>
            <td style="width:15%">Thời gian tạo</td>
            <td>Thể loại</td>
            <td>Tình trạng</td>
            <td>Chi tiết</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>
    <?php
        while ($a !=null) 
        {
    ?>
            <tr>
                <td><?php echo $a[0] ?></td>
                <td><?php echo $a[1] ?></td>
                <td><?php echo date($a[6])?></td>
                <td><?php
                    $query="select tentheloai from tbltheloai where matheloai=".$a[5];
                    $excute2=mysqli_query($connect,$query);
                    $tentheloai=mysqli_fetch_array($excute2)[0];
                    echo $tentheloai;
                ?></td>
                <td><?php if($a[7]==1) echo "Chưa xuất bản";else echo"Xuất bản" ?></td>
                <td><a href="?page=4&mabaiviet=<?php echo $a[0]?>&hd=chitiet"><button>Chi tiết</button></a></td>
                <td><a href="?page=4&mabaiviet=<?php echo $a[0]?>&hd=sua"><button>Sửa</button></a></td>
                <td><a href="them,xoa,suabaiviet.php?mabaiviet=<?php echo $a[0]?>&action=xoa"><button type="button" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết');">Xóa</button></a></td>
            </tr>
            
    <?php
            $a=mysqli_fetch_array($excute);
        }
    ?>
    </table>
    <?php
        if(isset($_GET["type"])&&$_GET["type"]=="thembv")
        {
    ?>
    <div id="thembaiviet" >
        <div id="noidungctbv">
            <form action="them,xoa,suabaiviet.php" method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <th colspan="3" style="font-size:30px;background-color:#007ACC">Thêm bài viết</th>
                    </tr>
                    <tr>
                        <td>Tiêu đề</td>
                        <td><input type="text" name="tieude" style="width:100%;height:25px"></td>
                        <td class="err_tieude"></td>
                    </tr>
                    <tr >
                        <td>Mô tả</td>
                        <th><textarea name="mota"  cols="70" rows="8" style="width:100%"></textarea></th>
                        <td class="err_mota"></td>
                    </tr>
                    <tr>
                        <td>Nội dung</td>
                        <td><textarea class="textarea" name="noidung" id="" cols="30" rows="10"></textarea></td>
                        <td class="err_noidung"> </td>
                    </tr>
                    <tr>
                        <td>Mã thể loại</td>
                        <?php
                            $query="select *from tbltheloai";
                            $excute=mysqli_query($connect,$query);
                            $a=mysqli_fetch_array($excute);
                        ?>
                        <td><select name="matheloai" id="">
                            <option value="0">Chọn mã thể loại</option>
                            <?php
                                while ($a!=null ) 
                                {
                            ?>
                                    <option value="<?php echo $a[0] ?>"><?php echo $a[1] ?></option>
                            <?php
                                    $a=mysqli_fetch_array($excute);
                                }
                            ?>
                        </select></td>
                        <td class="err_theloai"></td>
                    </tr>
                    <tr>
                        <td>Upload hình ảnh</td>
                        <td>
                            <table>
                                <tr>
                                    <td colspan="2"><img src="" alt="" id="uploadha" style="width:100px;height:auto;"></td>
                                </tr>
                                <tr>
                                    <td><input type="file" name="uploadfile" onchange="disPlayImg('uploadha','uploadfile')"></td>
                                   
                                </tr>
                            </table>
                        </td>
                         <td><span class="err_ha"></span></td>
                    </tr>
                    <tr>
                        <th colspan="3" style="background-color:#007ACC;"><button name="action" value="thembaiviet" type="submit" style="height:35px;" onclick="return validateThemBV()">Thêm bài viết</button></th>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <?php
        }
    ?>
    <?php
        if(isset($_GET["mabaiviet"])&&$_GET["mabaiviet"]!=0&&isset($_GET["hd"])&&$_GET["hd"]=="chitiet")
        {
            $mabaviet=$_GET["mabaiviet"];
    ?>
    <div id="chitietbv">
        <div id="ndctbaiviet">
            <?php 
                $query="select * from noidungbaiviet where mabaiviet=$mabaviet";
                $excute=mysqli_query($connect,$query);
                $a=mysqli_fetch_array($excute);
            ?>
            <table>
                <tr>
                    <th colspan="3" style="font-size:30px;background-color:#007ACC">Chi tiết bài viết</th>
                </tr>
                <tr>
                    <td>Tiêu đề</td>
                    <td><?php echo $a[1]?></td>
                </tr>
                <tr>
                    <table>
                        <tr>
                            <th>Mô tả</th>
                            <th>Nội dung</th>
                        </tr>
                        <tr>
                            <th><textarea readonly cols="50" rows="20"><?php echo $a[2]?></textarea></th>
                            <td><textarea class="textarea" name="noidung" id="" cols="30" rows="17"><?php echo $a[4]?></textarea></td>
                        </tr>
                        <tr>
                            <th colspan="2">
                                <button onclick="document.getElementById('fullbv').style.display='block'"  style="background-color:#007ACC;height:30px;font-size:20px;border:none;cursor:pointer">Xem full bài viết</button>
                            </th>
                        </tr>
                    </table>
                </tr>
                <tr>
                    <table>
                        <tr>
                            <th>Mã thể loại</th>
                            <th>Hình ảnh</th>
                            <th>Tình trạng</th>
                            <th>Thời gian khởi tạo</th>
                        </tr>
                        <tr>
                    <?php
                        $query="select tentheloai from tbltheloai where matheloai=".$a[5];
                        $excute=mysqli_query($connect,$query);
                        $b=mysqli_fetch_array($excute)[0];
                    ?>
                            <th><?php echo $b; ?> </th>
                            <th><img src="../<?php echo $a[3]?>" alt="Chưa có hình ảnh" style="width:150px;height:auto"></th>
                            <th><?php if($a[7]==1) echo "Chưa xuất bản"; else echo"Xuất bản"; ?> </th>
                            <th><?php echo $a[6]; ?> </th>
                        </tr>
                    </table>
                </tr>
                
            </table>
        </div>
    </div>
    <div id="fullbv">
        <div id="ndfullbv">
            <h1>Xem full bài viết</h2>
            <?php echo $a[4];?>
        </div>
    </div>
    <?php
        }
        else if(isset($_GET["mabaiviet"])&&$_GET["mabaiviet"]!=0&&isset($_GET["hd"])&&$_GET["hd"]=="sua")
        {
        ?>
    <div id="chitietbv">
        <div id="ndctbaiviet">
            <?php 
                $mabaviet=$_GET["mabaiviet"];
                $query="select * from noidungbaiviet where mabaiviet=$mabaviet";
                $excute=mysqli_query($connect,$query);
                $a=mysqli_fetch_array($excute);
            ?>
        <form action="them,xoa,suabaiviet.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <input type="hidden" name="mabv" value="<?php echo $a[0]?>">
                    <th colspan="3" style="font-size:30px;background-color:#007ACC">Chi tiết bài viết</th>
                </tr>
                <tr>
                    <td>Tiêu đề</td>
                    <td>
                        <input type="text" value="<?php echo $a[1]?>" style="width:100%" name="tieude">
                    </td>
                    <td><span class="err_tieude"></span></td>
                </tr>
                <tr>
                    <table>
                        <tr>
                            <th colspan="2">Mô tả</th>
                            <th colspan="2">Nội dung</th>
                        </tr>
                        <tr>
                            <th><textarea name="mota" id="" cols="50" rows="20"><?php echo $a[2]?></textarea></th>
                            <td><span class="err_mota"></span></td>
                            <td><textarea class="textarea" name="noidung" id="" cols="30" rows="17"><?php echo $a[4]?></textarea></td>
                            <td><span class="err_noidung"></span></td>
                        </tr>
                    </table>
                </tr>
                <tr>
                    <table>
                        <tr>
                            <th>Mã thể loại</th>
                            <th>Hình ảnh</th>
                            <?php 
                            if ($_SESSION["tkadmin"][3]==1) {
                            ?>
                                <th>Tình trạng</th>
                            <?php
                            }
                            ?>
                            
                            <th>Thời gian khởi tạo</th>
                        </tr>
                        <tr>
                    <?php
                        $query="select * from tbltheloai";
                        $excute=mysqli_query($connect,$query);
                        $b=mysqli_fetch_array($excute);
                    ?>
                            <th>
                                <select name="matheloai" id="">
                                    <option value="0">Chọn thể loại</option>
                                    <?php 
                                        while ($b !=null) 
                                        {
                                    ?>
                                            <option value="<?php echo $b[0] ?>" <?php if($b[0]==$a[5]) echo "selected"; ?>><?php echo $b[1];?></option>
                                    <?php
                                            $b=mysqli_fetch_array($excute);
                                        }
                                    ?>
                                </select>
                                <span class="err_matheloai"></span>
                            </th>
                            <th>
                                <table>
                                    <tr>
                                        <th><img src="../<?php echo $a[3]?>" alt="Chưa có hình ảnh" style="width:150px;height:auto"></th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <input type="text" name="img" value="<?php echo $a[3]?>" readonly> 
                                            <input type="file" name="imgupload" >
                                            <span class="err_ha"></span>
                                        </th>
                                    </tr>
                                </table>
                            </th>
                            <?php
                                if($_SESSION["tkadmin"][3]==1)
                                {
                            ?>
                            <th>
                                <select name="tinhtrang" id="">
                                        <option value="-1">Chọn tình trạng</option>
                                        <option value="0" <?php if($a[7]==0) echo "selected"; ?>>Xuất bản</option>
                                        <option value="1"<?php if($a[7]==1) echo "selected"; ?>>Chưa xuất bản</option>
                                </select>
                                <span class="err_tinhtrang"></span>
                            </th>
                            <?php
                                }
                            ?>
                            <th><?php echo $a[6]; ?> </th>
                        </tr>
                        <tr>
                            <th colspan="5">
                                <button style="padding:10px;width:20%;" type="submit" value="sua" name="action" onclick="return validateSuaBV()">Xác nhận chỉnh sửa</button>
                            </th>
                        </tr>
                    </table>
                </tr>
                
            </table>
        </form>
        </div>
    </div>
        <?php
        }
    ?>
</body>
<script src="js/validateBaiViet.js?v<?php echo time()?>"></script>
<script>
    var thembaiviet,xemfullbv,chitietbv;
    thembaiviet=document.getElementById("thembaiviet");
    xemfullbv=document.getElementById('fullbv');
    chitietbv=document.getElementById('chitietbv')
    window.onclick = function (event) 
    {
        if(event.target == thembaiviet)
        {
            thembaiviet.style.display="none";
        }
        else if(event.target == xemfullbv)
        {
            xemfullbv.style.display="none";
        }
        else if(event.target == chitietbv)
        {
            location.replace("http://localhost/projectnew/admin/menusetting.php?page=4");
        }
        
    }
    function disPlayImg(x,y) 
    {
        var img,inputFile;
        img=document.getElementById(x);
        inputFile=document.getElementsByName(y);
        img.src=URL.createObjectURL(inputFile[0].files[0]);
    }
</script>