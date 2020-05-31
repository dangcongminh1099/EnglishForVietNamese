<body>
    
    <?php
    $connect=connect("project");
    utf8($connect);
    
    if(isset($_GET["checkbox"]))
    {
        $mabaiviet_baitap=$_GET["checkbox"]; 
        $query="select mabaiviet_baitap,tieude,matheloai,img,tinhtrang,link,mota from baiviet_baitap where mabaiviet_baitap in(";
        for ($i=0; $i <count($mabaiviet_baitap) ; $i++) 
        { 
            if($i==count($mabaiviet_baitap)-1)
            {
                $query=$query.$mabaiviet_baitap[$i].")";

            }
            else 
            {
                $query=$query.$mabaiviet_baitap[$i].",";
            }
        }
    $excute=mysqli_query($connect,$query);
    $a=mysqli_fetch_array($excute);
    $arr=[];
    $i=0;
    while($a!=null)
    {
        $arr[$i]=$a;
        $i++;
        $a=mysqli_fetch_array($excute);
    }
    for($i=0;$i<count($arr);$i++)
    {
    ?>
        <button onclick="displaybt(<?php echo $i;?>)"><?php echo $arr[$i][0]?></button>
    <?php
    }    
    ?>
    <br><br>
    <form action="kt_baitapbaiviet.php" id="formthem" enctype="multipart/form-data" method="POST" >
        <?php 
            for($i=0;$i<count($arr);$i++)
            {
        ?>
        <div class="bt">
            <table  cellpadding="10" >
                <tr style="background-color:#007ACC">
                    <th colspan="3"><h2 id="tieudetable">Sửa bài tập</h2></th>
                </tr>
                <tr>
                    <th>Mã bài tập <br><input type="number" name="mabaiviet_baitap[]" value="<?php echo $arr[$i][0]?>" readonly style="width:50px;"></th>
                    <th >Tiêu đề <input type="text" name="tieude[]" value="<?php echo $arr[$i][1]?>" style="width:100%;"></th>
                    <td><span class="err_tieude"></span></td>
                </tr>
                <tr>
                    <th>Mô tả</th>
                    <td><textarea  name="mota[]" id="" cols="30" rows="10"><?php echo $arr[$i][6]?></textarea></td>
                    <td><span class="err_mota"></span></td>
                </tr>
                <tr>
                    <th>Thể loại</th>
                    <td>
                        <select name="matheloai[]" id="">
                            <?php 
                                $query="select matheloai,tentheloai from tbltheloai";
                                $excute=mysqli_query($connect,$query);
                                $a=mysqli_fetch_array($excute);
                                while ($a!=null) 
                                {
                            ?>
                                    <option value="<?php echo $a[0]?>"
                                        <?php
                                            if($arr[0][2]==$a[0])
                                                echo "selected";
                                        ?>
                                    ><?php echo $a[1]?></option>
                            <?php
                                    $a=mysqli_fetch_array($excute);
                                }
                            ?>
                                    
                        </select>
                    </td>
                    <td><span class="err_matheloai"></span></td>
                </tr>
                <tr>
                    <th>Tình trạng</th>
                    <td>
                        <?php 
                        if($_SESSION["tkadmin"][3]==1) 
                        {
                        ?>
                            <select name="tinhtrang[]" id="" >
                                <option value="0">Xuất bản</option>
                                <option value="1">Chưa xuất bản</option>
                            </select>
                        <?php
                        }
                        else
                        {
                        ?>
                            <input type="number" name="tinhtrang[]" value="1" style="display:none" readonly>
                            Chưa xuất bản
                        <?php    
                        }
                        ?>
                        

                    </td>
                    <?php
                    if($_SESSION["tkadmin"][3]==1) 
                        {
                        ?>
                            <td><span class="err_tinhtrang"></span></td>
                        <?php
                        }
                    ?>
                </tr>
                <tr>
                    <th>Hình ảnh</th>
                    <td>
                        <table>
                            <tr>
                                <th><img src="../<?php if(isset($_FILES["newfile"])&&isset($_POST["maimg"])&&$_FILES["newfile"]["size"][$_POST["maimg"]]>0&&$maimg==$i) echo $saveDatabase; else echo $arr[$i][3];?>" id="hinhanhupload"  alt="Chưa có hình ảnh" style="width:150px;height:150px" class="hinhanh"></th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="img[]" value="<?php echo $arr[$i][3];?>" style="visibility:hidden;">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="file" name="newfile[]" value="<?php echo $arr[$i][0]?>" class="choosefile" onchange="preview_image(<?php echo $i?>)" multiple>
                                </td>
                            </tr>
                        </table>

                        <br>
                        
                        
                    </td>
                    <td><span class="err_ha"></span></td>
                </tr>
                <tr>
                    <th>Link bài tập</th>
                    <td><input style="width:100%;" type="link" name="link[]" value="<?php echo $arr[$i][5]; ?>" ></td>
                    <td><span class="err_link"></span></td>
                </tr>
            </table>
        </div>
        <?php    
            }
        ?>
        <button type="submit" name="action" onclick="return validateSuaThemBT()" value="Chỉnh sửa"style="background-color:#007ACC;border:none;color:white;width:35%;height:35px;font-size:25px;margin-bottom:50px">Xác nhận chỉnh sửa</button>
    </form>
    <?php
        }
        else 
        {
            header("Location:menusetting.php?page=3");
        }
    ?>
    <script src="js/validatesuabaitap.js?v<?php echo time()?>"></script>
    <script>
    function  canhbaoduoifile() 
    {
        alert("Đuôi file không hợp lệ chỉ cho phép đuôi(png, jpg, gif)");  
    }
    function kt_tenimg(n)
    {
        var inputfile;
        inputfile=document.getElementsByClassName("choosefile");
        if(inputfile[n].files[0]==null)
        {
            alert("Bạn chưa chọn file");
            return false;
            
        }
        else
        {
            return true;
        }
    }
    function preview_image(event) 
    {
        var img;
        img=document.getElementsByClassName("hinhanh");
        inputFile=document.getElementsByName("newfile[]");
        for(var i=0;i<img.length;i++)
        {
            if(i==event)
            {
                img[i].src=URL.createObjectURL(inputFile[i].files[0]);
            }
        }
    }
    function displaybt(x)
    {
        a=document.getElementsByClassName("bt");
        for(var i=0;i<a.length;i++)
        {
            if(i==x)
            {
                a[i].style.display="block";
            }
            else
            {
                a[i].style.display="none";
            }
        }
    }
    </script>
    
</body>