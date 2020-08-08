<body <?php if(isset($_GET["option"])&&$_GET["option"]==6) echo "onload='hientiny()'"?>>
    <h2 id="tieudetable">Bảng bài viết, bài tập</h2>
    <?php
        $connect=connect("project");
        utf8($connect);
        $query="select count(*) from baiviet_baitap";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute,MYSQLI_NUM);
        $max=$a[0];
    ?>
    <form action="" id="timkiem">
        <input type="text" name="timkiem" value="Nhập tên cần tìm" onclick="timkiem1()" autocomplete="off">
        <select name="searchtheloai" id="searchtheloai" onchange="searchtheloai1()">
            <option value="0">Thể loại</option>
        <?php 
            $query2="select *from tbltheloai";
            $excute2=mysqli_query($connect,$query2);
            $b=mysqli_fetch_array($excute2);
            while ($b !=null) 
            {
            ?>
                <option value="<?php echo $b[0]?>" <?php if(isset($_GET["searchtheloai"])&&$_GET["searchtheloai"]==$b[0]) echo "selected"; ?>><?php echo $b[1]?></option>
            <?php
                $b=mysqli_fetch_array($excute2);
            }
        ?>
        
        </select>
        <?php
            if(isset($_GET["searchtheloai"])&&$_GET["searchtheloai"]!=0)
            {
        ?>
                <select name="mabaiviet_baitap" id="mabaiviet_baitap" style="margin:auto">
                <option value="0">Hãy chọn mã bài tập</option>
                <?php
                $query="select mabaiviet_baitap,tieude from baiviet_baitap where matheloai=".$_GET["searchtheloai"];
                $excute=mysqli_query($connect,$query);
                $a=mysqli_fetch_array($excute,MYSQLI_NUM);
                    while($a!=null)
                    {
                    ?>
                        <option value="<?php echo $a[0]?>" <?php if(isset($_GET['mabaiviet_baitap'])&&$_GET["mabaiviet_baitap"]==$a[0]) echo "selected";?>><?php echo $a[1]?></option>
                    <?php
                        $a=mysqli_fetch_array($excute,MYSQLI_NUM);
                    }
                ?>

        </select>
        <?php
            }
        ?>
        <input type="hidden" name="page" value="3">
        <div id="divhintsearch">
            <i class="fa fa-times-circle"></i>
            <table id="hintsearch" border="0" cellpadding="2" cellspacing="0" >
                
            </table>
        </div>
        <br>
        <br>
        <button type="submit"><i class="fa fa-search"></i>Tìm kiếm</button>
    </form>

    <br>
    
    <?php
    if(isset($_GET["trang"]))
    {
        $trang=$_GET["trang"]*10;
    }
    else {
        $trang=0;
    }
        if(isset($_GET["timkiem"])&&$_GET["timkiem"]!="Nhập tên cần tìm"&&isset($_GET["searchtheloai"])&&$_GET["searchtheloai"]==0)
        {
            $tieude=$_GET["timkiem"];
            $query="select baiviet_baitap.mabaiviet_baitap,tieude,matheloai,count(macau),img,tinhtrang,link  from baiviet_baitap left JOIN cauhoi on cauhoi.mabaiviet_baitap=baiviet_baitap.mabaiviet_baitap where baiviet_baitap.tieude like '%$tieude%'  and  baiviet_baitap.mabaiviet_baitap GROUP BY baiviet_baitap.mabaiviet_baitap";
        }
        else if(isset($_GET["timkiem"])&&$_GET["timkiem"]=="Nhập tên cần tìm"&&isset($_GET["searchtheloai"]))
        {
            if ($_GET["searchtheloai"]==0) 
            {
                $query="select baiviet_baitap.mabaiviet_baitap,tieude,matheloai,count(macau),img,tinhtrang,link  from baiviet_baitap left JOIN cauhoi on cauhoi.mabaiviet_baitap=baiviet_baitap.mabaiviet_baitap where  baiviet_baitap.mabaiviet_baitap GROUP BY baiviet_baitap.mabaiviet_baitap limit $trang,10";
            }
            else
            {
                if(isset($_GET["mabaiviet_baitap"])&&$_GET["mabaiviet_baitap"]!=0)
                {
                    $mabaiviet_baitap=$_GET["mabaiviet_baitap"];
                    $query="select baiviet_baitap.mabaiviet_baitap,tieude,matheloai,count(macau),img,tinhtrang,link  from baiviet_baitap left JOIN cauhoi on cauhoi.mabaiviet_baitap=baiviet_baitap.mabaiviet_baitap where baiviet_baitap.mabaiviet_baitap=$mabaiviet_baitap and  baiviet_baitap.mabaiviet_baitap GROUP BY baiviet_baitap.mabaiviet_baitap";
                }
                else 
                {
                    $matheloai=$_GET["searchtheloai"];
                    $query="select baiviet_baitap.mabaiviet_baitap,tieude,matheloai,count(macau),img,tinhtrang,link  from baiviet_baitap left JOIN cauhoi on cauhoi.mabaiviet_baitap=baiviet_baitap.mabaiviet_baitap where matheloai=$matheloai and  baiviet_baitap.mabaiviet_baitap GROUP BY baiviet_baitap.mabaiviet_baitap";
                }
            }
        }
        else if(isset($_GET["timkiem"])&&$_GET["timkiem"]!="Nhập tên cần tìm"&&isset($_GET["searchtheloai"])&&$_GET["searchtheloai"]!=0)
        {
            if(isset($_GET["mabaiviet_baitap"])&&$_GET["mabaiviet_baitap"]!=0)
            {
                $mabaiviet_baitap=$_GET["mabaiviet_baitap"];
                $query="select baiviet_baitap.mabaiviet_baitap,tieude,matheloai,count(macau),img,tinhtrang,link  from baiviet_baitap left JOIN cauhoi on cauhoi.mabaiviet_baitap=baiviet_baitap.mabaiviet_baitap where baiviet_baitap.mabaiviet_baitap=$mabaiviet_baitap and  baiviet_baitap.mabaiviet_baitap GROUP BY baiviet_baitap.mabaiviet_baitap";
            }
            else 
            {
                $matheloai=$_GET["searchtheloai"];
                $tieude=$_GET["timkiem"];
                $query="select baiviet_baitap.mabaiviet_baitap,tieude,matheloai,count(macau),img,tinhtrang,link  from baiviet_baitap left JOIN cauhoi on cauhoi.mabaiviet_baitap=baiviet_baitap.mabaiviet_baitap where matheloai=$matheloai and baiviet_baitap.tieude like '%$tieude%' and  baiviet_baitap.mabaiviet_baitap  GROUP BY baiviet_baitap.mabaiviet_baitap";
            }
        }
        else 
        {
            $query="select baiviet_baitap.mabaiviet_baitap,tieude,matheloai,count(macau),img,tinhtrang,link  from baiviet_baitap left JOIN cauhoi on cauhoi.mabaiviet_baitap=baiviet_baitap.mabaiviet_baitap where  baiviet_baitap.mabaiviet_baitap  GROUP BY baiviet_baitap.mabaiviet_baitap limit $trang,10";
        }
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute,MYSQLI_NUM);
        $arr=[];
        $i=0;
        while($a!=null)
        {    
            $arr[$i]=$a;
            $mabaiviet_baitap=$arr[$i][0];
            $a=mysqli_fetch_array($excute,MYSQLI_NUM);
            $i++;
        }
    ?>
    <a href="?page=3&option2=thembt"><button type="button" style="font-size:18px;" >Thêm bài tập</button></a>
    <?php
        if(isset($_GET["option2"])&&$_GET["option2"]=="thembt")
        {
    ?>

    
    <div id="thembaitap">
        <div id="dienthongtin">
            <a href="?page=3"><i class="fa fa-close" id="closethembaitap"></i></a>
            <h2>Thêm bài tập, câu hỏi, đáp án</h2>
            <?php 
            if(isset($_GET["success"])&&$_GET["mabaitap"])
            {
                $mabaitap=$_GET["mabaitap"];
                $query="select * from baiviet_baitap where mabaiviet_baitap=$mabaitap";
                $thongtinbt=mysqli_query($connect,$query);
                $laytt=mysqli_fetch_array($thongtinbt);
                $query="select * from tbltheloai where matheloai=".$laytt["matheloai"];
                $theloai=mysqli_query($connect,$query);
                $laytl=mysqli_fetch_array($theloai);
            ?>
                <h1>Thêm bài tập</h1>
                <div id="tbtthanhcong">
                
                    Đã thêm bài tập thành công 
                    <br>
                    <br>
                    Phần bài tập chưa có câu hỏi đáp án  <a href="?page=3&mabt=<?php echo $mabaitap ?>&option=1&trang=2">Thêm câu hỏi & đáp án</a>
                    <br>
                    <br>
                    <a href="?page=3">Quay lại</a> bảng tóm tắt bài viết bài tập
                
                </div>
                <br>
                <br>
                <br>
                <table border="1">
                    <tr>
                        <th>Mã bài</th>
                        <th>Tên bài tập</th>
                        <th>Thể loại</th>
                        <th>Hình ảnh</th>
                        <th>Link tài liệu</th>
                    </tr>
                    <tr>
                        <th><?php echo $laytt["mabaiviet_baitap"]; ?></th>
                        <td><?php echo $laytt["tieude"]; ?></td>
                        <td><?php echo $laytl[1]; ?></td>
                        <td><img src="../<?php echo $laytt['img']?>" alt="" style="width:150px;height:auto;"></td>
                        <td><?php echo $laytt["link"]; ?></td>
                    </tr>
                </table>
            <?php
            }    
            else 
            {
                $query="select matheloai,tentheloai from tbltheloai";
                $excute=mysqli_query($connect,$query);
                $a=mysqli_fetch_array($excute);
            ?>

            <br>
            <br>
            <form action="kt_baitapbaiviet.php" enctype="multipart/form-data" method="POST">
                <table border="0" cellspacing="0" cellpadding="10" style="background-color:#ded9d9;">
                    <tr>
                        <th colspan="3"><h1>Thêm bài tập</h1></th>
                    </tr>
                    <tr style="visibility:hidden">
                        <td colspan="3"><input type="number" readonly value="<?php echo $max+1?>" style="width:70px;" name="mabaiviet_baitap"></td>
                    </tr>
                    <tr>
                        <td>Tiêu đề bài tập</td>
                        <td><input type="text" style="width:550px;height:25px" name="tieude"></td>
                        <td><span style="color:red" id="err_tieude"></span></td>
                    </tr>
                    <tr>
                        <td>Mô tả</td>
                        <td><textarea  name="mota" id="" cols="70" rows="10" style="width:548px;height:117px"></textarea></td>
                        <td><span style="color:red" id="err_mota"></span></td>
                    </tr>
                    <tr>
                        <td>Trong thể loại</td>
                        <td>
                            <select name="matheloai" id="" style="width:100%;">
                                <option value="0">Chọn thể loại</option>
                                <?php
                                    while ($a !=null)
                                    {
                                ?>
                                        <option value="<?php echo $a[0]?>"><?php echo $a[1]?></option>
                                <?php
                                        $a=mysqli_fetch_array($excute);
                                    }
                                ?>
                            </select>
                        </td>
                        <td><span style="color:red" id="err_matheloai"></span></td>
                    </tr>
                    <tr>
                        <td>Hình ảnh </td>
                        <td>
                            <img src="" alt="Chưa có hình ảnh" class="themanhbaitap" style="width:200px;height:auto">
                            <br>
                            <input type="file" class="chonimgadd" onchange="previewImg(0)" name="newimg">
                        </td>
                        <td> <span style="color:red" class="err_ha"></span></td>
                    </tr>
                    <tr>
                        <td>Link tài liệu</td>
                        <td >
                            <input type="url" name="link" style="width:550px;height:25px">
                        </td>
                        <td><span style="color:red" id="err_tl"></span></td>
                    </tr>
                    <tr>

                        <th colspan="3"><button name="action" value="Thêm" type="submit" onclick="return validateThemBT()">Thêm bài tập</button></th>
                    </tr>
                </table>
            </form>
        </form>
            <?php
            }
            ?>
        </div>
    </div>
    <?php
        }
        if(isset($_GET["mabt"])&&$_GET["mabt"]!=null)
        {
        ?>
            <div id="themcauhoi">
                <div id="ndthemcauhoi">
                <i class="fa fa-close" id="closethemcauhoi" onclick="document.getElementById('themcauhoi').style.display='none'"></i>
                <h1>Cài đặt câu hỏi và phương án</h1>
        <?php
            if (isset($_GET["success"])&&$_GET["success"]!=5) 
            {

        ?>
                <div id="tbthanhcong" style="border-left: 5px solid green;">
                    Thêm câu hỏi thành công
                    <br>
                    <br>
                    <a href="?page=3&option=1&trang=0&mabt=<?php echo $_GET["mabt"] ?>" style="text-decoration:none;">Trở về </a>   trang thống kê bài tập
                    <br>
                    <br>
                </div>
        <?php
            }
            else if(isset($_GET["err"])&&$_GET["err"]!=5) 
            {

            ?>
                <div id="tbthanhcong" style="border-left: 5px solid red;">
                    Thêm câu hỏi không thành công
                    <br>
                    <br>
                    Trở về trang thống kê bài tập
                    <br>
                    <br>
                </div>
            <?php
            }
            
            $mabt=$_GET["mabt"];
            $query="select madanhmuc from tbltheloai where matheloai =(select matheloai from baiviet_baitap where mabaiviet_baitap=$mabt)";
            $excute5=mysqli_query($connect,$query);
            $laymadanhmuc=mysqli_fetch_array($excute5);
        ?>
                
                        <?php
                        
                    if(isset($_GET["option"])&&$_GET["option"]==2)//thêm câu hỏi
                    {
                ?>
                    <button id="btn_menutool" data-slide="0" onclick="menutool()" type="button">Menu tool</button>
                    <div id="menutool">
                        <h3 id="tieudetool">Công cụ</h3>
                        <a href="?mabt=<?php echo $_GET["mabt"]; ?>&page=3&option=1&trang=0"><button type="button"><i class="fa fa-plus"></i> Thống kê câu hỏi</button></a>
                        

                    </div>
                    <form action="themcauhoi(new).php" id="formthemcauhoi" method="POST" enctype="multipart/form-data">
                        <input type="text" name="mabaiviet_baitap" value=<?php echo $_GET["mabt"];?> style="display:none;">
                        <table  cellspacing="0" cellpadding="10" >
                            <tr>
                                <th colspan="3"><h2>Thêm câu hỏi</h2></th>
                                
                            </tr>
                            <tr style="background-color:#eaeaea;">
                                <td>Nội dung câu hỏi</td>
                                <td>
                                    
                                    <?php 
                                    if($laymadanhmuc[0]==2 ||$laymadanhmuc[0]==4)
                                    {
                                    ?>

                                        <textarea class="textarea" name="noidungcauhoi">Vế đầu câu hỏi ______ vế sau câu hỏi ?</textarea>

                                        Trong thể loại câu hỏi này có khoảng trống để minh họa vị trí cần đặt đáp án đúng
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                        <textarea  class="textarea" name="noidungcauhoi">Nội dung câu hỏi ?</textarea>
                                        
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td><span class="err_noidungcauhoi"></span></td>
                            </tr>
                            <?php
                                if($laymadanhmuc[0]==2 ||$laymadanhmuc[0]==4)
                                {
                            ?>
                                    <tr style="color:white;background-color:#333333">
                                        <td>Âm thanh</td>
                                        <td class="cotaudio">
                                            <i style="font-size:22px" class="fa fa-play-circle" onclick="playaudios(0,'audioadd')"></i>
                                            <input type="file" name="audiobt" onchange="alldisplayadio('audioadd','audiobt',0)">
                                            <audio src="" class="audioadd"></audio>
                                        </td>
                                        <td><span class="err_audiobt"></span></td>
                                    </tr>
                            <?php
                                }

                            ?>
                            <tr>
                                <td colspan="3">
                            <?php
                                if($laymadanhmuc[0]==2 ||$laymadanhmuc[0]==4)
                                {
                            ?>   
                                    <table border="0" id="multiplechoice" cellspacing="10">
                                        <tr >
                                            <th colspan="3">Thêm nhiều phương án</th>
                                            <th>Đáp án đúng</th>
                                            <th>Xóa</th>
                                        </tr>
                                        <tr class="rows">
                                        
                                        <td colspan="3">
                                            
                                            <table>
                                                <tr>
                                                    <td>Phương án 1</td>
                                                    <td><input type="text" name="noidung[]"></td>
                                                    <td><span class="err_noidung"></span></td>                                                  
                                                </tr>
                                            </table>
                                        </td>
                                        
                                        <th><input type="radio" name="dapan" value="0"></th>
                                        <th><i class="fa fa-trash-o" style="font-size:30px;color:red;cursor:pointer" onclick="xoaElePhuongan(0,0)"></i></th>
                                        <tr class="rows">
                                        <td colspan="3">
                                            <table>
                                                <tr>
                                                    <td>Phương án 2</td>
                                                    <td><input type="text" name="noidung[]"></td>
                                                    <td><span class="err_noidung"></span></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <th><input type="radio" name="dapan" value="1"></th>
                                        <th><i class="fa fa-trash-o" style="font-size:30px;color:red;cursor:pointer" onclick="xoaElePhuongan(1,0)"></i></th>
                                        </tr>
                                        <tr class="rows">
                                        <td colspan="3">
                                            <table>
                                                <tr>
                                                    <td>Phương án 3</td>
                                                    <td><input type="text" name="noidung[]"></td>
                                                    <td><span class="err_noidung"></span></td>                                    
                                                </tr>
                                            </table>
                                        </td>
                                        <th ><input type="radio" name="dapan" value="2"></th>
                                        <th><i class="fa fa-trash-o" style="font-size:30px;color:red;cursor:pointer" onclick="xoaElePhuongan(2,0)"></i></th>
                                        </tr>
                                    </table>
                                    <table>
                                        <tr id="footertable">
                                            <th colspan="3"><button onclick="themphuongan(1)" type="button"><i class="fa fa-plus" style="font-size:25px;color:green"></i> Thêm phương án</button></th>
                                        </tr>
                                    </table>
                                
                            <?php
                                }
                                else 
                                {
                            ?>
                                    <table border="0" id="multiplechoice" cellspacing="2">
                                        <tr >
                                            <th colspan="3">Thêm nhiều phương án</th>
                                            <th>Hình ảnh</th>
                                            <th>Âm thanh</th>
                                            <th>Đáp án đúng</th>
                                            <th>Xóa</th>       
                                        </tr>
                                        <tr class="rows">
                                        
                                        <td colspan="3">
                                            
                                            <table>
                                                <tr>
                                                    <td>Phương án 1</td>
                                                    <td><input type="text" name="noidung[]"></td>
                                                    <td><span class="err_noidung"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>upload hình ảnh</td>
                                                    <td><input type="file" name="img[]" onchange="displayimg(0)"></td>
                                                    <td><span class="err_ha"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>upload âm thanh</td>
                                                    <td><input type="file" name="audio[]" onchange="displayaudio(0)"></td>
                                                    <td><span class="err_at"></span></td>
                                                </tr>
                                                
                                            </table>
                                        </td>  
                                        <th><img src="" alt="Chưa có hình ảnh" style="width:150px;height:auto;" class="imgupload"></th>
                                        <th class="iconaudio">
                                            <i class="fa fa-play-circle" onclick="playaudios(0,'audioupload')"></i>
                                            <audio src="" class="audioupload"></audio>
                                        </th>
                                        <th><input type="radio" name="dapan" value="0"></th>
                                        <th><i class="fa fa-trash-o" style="font-size:30px;color:red;cursor:pointer" onclick="xoaElePhuongan(0,0)"></i></th>
                                        <tr class="rows">
                                        <td colspan="3">
                                            <table>
                                                <tr>
                                                    <td>Phương án 2</td>
                                                    <td><input type="text" name="noidung[]"></td>
                                                    <td><span class="err_noidung"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>upload hình ảnh</td>
                                                    <td><input type="file" name="img[]" onchange="displayimg(1)"></td>
                                                    <td><span class="err_ha"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>upload âm thanh</td>
                                                    <td><input type="file" name="audio[]" onchange="displayaudio(1)"></td>
                                                    <td><span class="err_at"></span></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <th><img src="" alt="Chưa có hình ảnh" style="width:150px;height:auto;" class="imgupload"></th>
                                        <th class="iconaudio">
                                            <i class="fa fa-play-circle" onclick="playaudios(1,'audioupload')"></i>
                                            <audio src="" class="audioupload"></audio>
                                        </th>
                                        <th><input type="radio" name="dapan" value="1"></th>
                                        <th ><i class="fa fa-trash-o" style="font-size:30px;color:red;cursor:pointer" onclick="xoaElePhuongan(1,0)"></i></th>
                                        </tr>
                                        <tr class="rows">
                                        <td colspan="3">
                                            <table>
                                                <tr>
                                                    <td>Phương án 3</td>
                                                    <td><input type="text" name="noidung[]"></td>  
                                                    <td><span class="err_noidung"></span></td>                                  
                                                </tr>
                                                <tr>
                                                    <td>upload hình ảnh</td>
                                                    <td><input type="file" name="img[]" onchange="displayimg(2)"></td>
                                                    <td><span class="err_ha"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>upload âm thanh</td>
                                                    <td><input type="file" name="audio[]" onchange="displayaudio(2)"></td>
                                                    <td><span class="err_at"></span></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <th><img src="" alt="Chưa có hình ảnh" style="width:150px;height:auto;" class="imgupload"></th>
                                        <th class="iconaudio">
                                            <i class="fa fa-play-circle" onclick="playaudios(2,'audioupload')"></i>
                                            <audio src="" class="audioupload" ></audio>
                                        </th>
                                        <th ><input type="radio" name="dapan" value="2"></th>
                                        <th ><i class="fa fa-trash-o" style="font-size:30px;color:red;cursor:pointer" onclick="xoaElePhuongan(2,0)"></i></th>
                                        </tr>
                                    </table>
                                    <table cellpadding="10">
                                        <tr>
                                            <th colspan="3"><button onclick="themphuongan(0)" type="button"><i class="fa fa-plus" style="font-size:25px;color:green"></i> Thêm phương án</button></th>
                                        </tr>
                                    </table>
                            <?php
                                }
                            ?>
                                </td>
                            </tr>
                            <tr style="padding:30px">
                                <th colspan="3"><button type="submit" name="action" value="Thêm" onclick="return validateThemCauHoi(<?php if($laymadanhmuc[0]==2 ||$laymadanhmuc[0]==4) echo '0'; else echo '1';?> )">Thêm câu hỏi</button></th>
                            </tr>
                            
                        </table>
                    </form>
                <?php
                    }
                    else if(isset($_GET["option"])&&$_GET["option"]==1&&isset($_GET["mabt"]))// hiện danh sách câu hỏi
                    {
                        $mabt=$_GET["mabt"];
                        $trang=$_GET["trang"];
                    ?>
                    <form action="" id="formndcauhoi">
                        <button id="btn_menutool" data-slide="0" onclick="menutool()" type="button">Menu tool</button>
                        <div id="menutool">
                            <h3 id="tieudetool">Công cụ</h3>
                            <a href="?mabt=<?php echo $mabt ?>&page=3&option=2"><button type="button"><i class="fa fa-plus"></i> Thêm câu hỏi</button></a>
                            <br>
                            <button name="option" value="5" disabled><i class="fa fa-edit"></i> Sửa câu hỏi</button>
                            <br>
                            <button id="xoacauhoi" disabled onclick="changeaction(1);return confirm('Bạn có chắc chắn muốn xóa');" name="action" value="xoa"><i class="fa fa-trash-o"></i> Xóa câu hỏi</button>
                            <br>
                            <a href="menusetting.php?page=3&option=1&trang=0"><button type="button"><i class="fa fa-align-justify"></i> Danh sách bài tập</button></a>
                            <br>
    
                        </div>

                    <?php
                        $query="select count(macau) from cauhoi where mabaiviet_baitap=$mabt";
                        $excute=mysqli_query($connect,$query);
                        $tongsocau=mysqli_fetch_array($excute)[0];
                        $trangcauhoi=0;
                        $socautrong1trang=$trangcauhoi+9;
                        if($tongsocau>9 &&!isset($_GET["trangcauhoi"]))
                        {
                            $query="select cauhoi.macau,cauhoi.noidung,mabaiviet_baitap,cauhoi.audio,count(tblphuongan.maphuongan) from cauhoi left join tblphuongan on cauhoi.macau=tblphuongan.macau where mabaiviet_baitap=$mabt GROUP BY cauhoi.macau limit $trangcauhoi,$socautrong1trang";
                        }
                        else if($tongsocau>9&&isset($_GET["trangcauhoi"]))
                        {
                            $trangcauhoi=$_GET["trangcauhoi"]*9;
                            $socautrong1trang=$trangcauhoi+9;
                            $query="select cauhoi.macau,cauhoi.noidung,mabaiviet_baitap,cauhoi.audio,count(tblphuongan.maphuongan) from cauhoi left join tblphuongan on cauhoi.macau=tblphuongan.macau where mabaiviet_baitap=$mabt GROUP BY cauhoi.macau limit $trangcauhoi,$socautrong1trang";
                        }
                        else 
                        {
                            $query="select cauhoi.macau,cauhoi.noidung,mabaiviet_baitap,cauhoi.audio,count(tblphuongan.maphuongan) from cauhoi left join tblphuongan on cauhoi.macau=tblphuongan.macau where mabaiviet_baitap=$mabt GROUP BY cauhoi.macau";
                        }
                        $excute6=mysqli_query($connect,$query);
                        $layttch=mysqli_fetch_array($excute6);
                    ?>
                        <input type="number" name="mabt" value="<?php echo $mabt?>" readonly style="visibility:hidden">
                        <input type="number" name="danhmuc" value="<?php echo $laymadanhmuc[0]?>" readonly style="visibility:hidden">
                        <input type="number" name="page" value="3" readonly style="visibility:hidden">
                        <div id="lietkecauhoi">
                            <ul id="listcauhoi">
                                
                                <li class="rowli" style="background-color:#333333;color:white;">
                                    <ul>
                                        <li class="colli">Nội dung câu hỏi</li>
                                        <li class="colli">Audio</li>
                                        <li class="colli">Xóa</li>
                                        <li class="colli">Sửa</li>   
                                        <li class="colli">Chi tiết</li>
                                        <li class="colli">Chọn</li>
                                    </ul>
                                </li>
                            
                            <?php
                            if ($layttch==null) 
                            {
                            ?>
                                <li class="rowli">
                                    Không có câu hỏi
                                </li>
                            <?php
                            }
                                $count=0;
                                while ($layttch != null) 
                                {
                                    
                            ?>
                                    <li class="rowli">
                                        <ul>
                                            <li class="colli"><?php if($layttch[1]=="") echo "Chưa có câu hỏi và đáp án !!!"; 
                                                else 
                                                {
                                                    $array=explode(" ",$layttch[1]);
                                                    $tong=count(explode(" ",$layttch[1]));
                                                    if($tong<=10)
                                                    {
                                                        echo $layttch[1];
                                                    }
                                                    else if($tong>10)
                                                    {
                                                        $b="";
                                                        for($i=0;$i<6;$i++)
                                                        {
                                                            $b=$b.$array[$i]." ";
                                                        }
                                                        $b=$b."........... ";

                                                        echo $b;
                                                    }
                                                
                                                } ?>
                                            </li>
                                            <li class="colli" >
                                                <i class="fa fa-play-circle" onclick="playaudios(<?php echo $count;?>,'audiocauhoi')" style="<?php if($laymadanhmuc[0]==2 ||$laymadanhmuc[0]==4) echo "color:green";
                                            else echo "color:red";
                                            ?>"></i>
                                                <audio class="audiocauhoi" src="../<?php if($layttch[3]=="") echo""; else echo $layttch[3];?>"></audio>
                                            </li>
                                            <li class="colli"><a href="suacauhoi.php?action=xoa&macau=<?php echo $layttch[0]; ?>&mabt=<?php echo $mabt?>" onclick="<?php if($layttch[4]==0) echo "return confirm('Bạn có chắc chắn muốn xóa');"; else echo " alert('Không được xóa câu hỏi đã có phương án');return false;"?>"><button class="buttonxoacau" type="button">Xóa</button></a></li>
                                            <li class="colli"><a href="?page=3&mabt=<?php echo $_GET["mabt"];?>&option=5&trang=0&macau=<?php echo $layttch[0];?>&danhmuc=<?php echo $laymadanhmuc[0];?>"><button type="button">Sửa</button></a></li>
                                            <li class="colli"><a href="?page=3&option=6&macau=<?php echo $layttch[0] ?>&mabt=<?php echo $mabt?>"><button type="button">Chi tiết</button></a></li>
                                            <li class="colli" ><input type="checkbox" <?php if($layttch[4]>0) echo "onclick='canhbaoxoacau($count)'"; ?> name="macau[]" value="<?php echo $layttch[0]; ?>" onchange="suapacauhoi()"></li>
                                            
                                        </ul>
                                        <?php
                                            $query="select noidung,dapan from tblphuongan where macau=".$layttch[0];
                                            $excute7=mysqli_query($connect,$query);
                                            $layttpa=mysqli_fetch_array($excute7);                                               
                                        ?>
                                    
                                        <ul class="ulphuongan">
                                            <li class="rowphuongan">Phương án</li>
                                            <?php
                                            if ($layttpa==null) 
                                            {
                                            ?>
                                                <li class="rowphuongan">Chưa có phương án</li>
                                            <?php
                                            }
                                            else 
                                            {
                                            ?>
                                            <li class="rowphuongan">
                                                <ul>
                                            <?php
                                                while ($layttpa!=null) 
                                                {
                                            ?>                                              
                                                
                                                    <li><input type="radio" disabled <?php if($layttpa[1]==0) echo "checked"; ?>> <?php echo $layttpa[0];?></li>
                                                
                                            <?php
                                                $layttpa=mysqli_fetch_array($excute7);  
                                                }
                                            ?>
                                                </ul>
                                            </li>
                                            <?php               
                                            }  
                                            ?>                                             
                                        </ul>
                                        <?php
                                            if($tong>10)
                                            {
                                            ?>
                                                <textarea readonly class="bangthongtinch"><?php echo $layttch[1]; ?></textarea>
                                            <?php
                                            }
                                        ?>
                                    </li>
                                <?php
                                $count++;
                                $layttch=mysqli_fetch_array($excute6);    
                                }
                            ?>
                            <?php
                                if ($tongsocau>9) 
                                {
                            ?>
                                <div id="trangcauhoi">
                                        <?php
                                        for ($i=0; $i <$tongsocau/9 ; $i++) 
                                        { 
                                        ?>
                                            <a href="?page=3&mabt=<?php echo $mabt ?>&option=1&trang=<?php echo $trang?>&trangcauhoi=<?php echo $i?>">
                                                <button type="button"> <?php echo $i+1 ?></button>
                                            </a>
                                        <?php
                                        }
                                        ?>
                                </div>
                            <?php
                                }
                            ?>
                            </ul>
                        </div>
                        
                    </form>
                    
                    <?php
                    }
                    else if(isset($_GET["option"])&&$_GET["option"]==5&&isset($_GET["mabt"])&&isset($_GET["macau"])&&isset($_GET["danhmuc"]))//sửa câu hỏi
                    {
      
                        $macau=$_GET["macau"];
                        $mabt=$_GET["mabt"];
                        $danhmuc=$_GET["danhmuc"];
                        $query="select mabaiviet_baitap,tieude from baiviet_baitap where matheloai in (select matheloai from tbltheloai where madanhmuc=$danhmuc)";
                        $excute2=mysqli_query($connect,$query);
                        $b=mysqli_fetch_array($excute2);
                        if(is_array($macau)==false)
                        {              
                            $query="select * from cauhoi where macau=$macau";
                            $excute=mysqli_query($connect,$query);
                            $a=mysqli_fetch_array($excute);
                            if(isset($_GET["success"])&&$_GET["success"]==5)
                            {
                                $query="select mabaiviet_baitap,tieude from baiviet_baitap where mabaiviet_baitap=$mabt";
                                $excute3=mysqli_query($connect,$query);
                                $c=mysqli_fetch_array($excute3);
                            ?>
                                <div id="tbthanhcong" style="border-left: 5px solid green;">
                                    Sửa câu hỏi thành công
                                    <br>
                                    <br>
                                    <a href="?page=3&option=1&mabt=<?php echo $mabt?>&trang=1" style="text-decoration:none;">Trở về </a>   trang thống kê câu hỏi
                                    <br>
                                    <br>
                                </div>
                                <br>
                                <br>
                                <table cellpadding="10" cellspacing="0">
                                    <tr style="background-color:#007ACC">
                                        <td>Mã câu</td>
                                        <td>Nội dung</td>
                                        <td>Nằm trong bài tập</td>
                                        <td>Âm thanh</td>
                                    </tr>
                                    <tr style="background-color:white">
                                        <td><?php echo $a[0]; ?></td>
                                        <td><?php echo $a[1]; ?></td>
                                        <td><?php echo $c[1]; ?></td>
                                        <td>
                                            <i class="fa fa-play-circle" onclick="playaudios(0,'csaudio')" style="font-size:30px"></i>
                                            <audio src="../<?php echo $a[3]?>" class="csaudio" ></audio>
                                        </td>
                                        
                                    </tr>
                                </table>
                            <?php
                            }
                            else 
                            {
                                if(isset($_GET["err"])&&$_GET["err"]==5)
                                {
                                ?>
                                    <div id="tbthanhcong" style="border-left: 5px solid red;">
                                        Sửa câu hỏi không thành công
                                        <br>
                                        <br>
                                        <a href="?page=3&option=1&mabt=<?php echo $mabt?>&trang=1" style="text-decoration:none;">Trở về </a>   trang thống kê câu hỏi
                                        <br>
                                        <br>
                                    </div>
                                    <br>
                                    <br>    
                                <?php
                                }
                            ?>
                    
                        
                                <form action="suacauhoi.php" method="POST" enctype="multipart/form-data">
                                    <table id="bangchinhsuacauhoi">
                                        <tr>
                                            <th colspan="2">Chỉnh sửa câu hỏi</th>
                                        </tr>
                                        <tr>
                                            <td>Mã câu</td>
                                            <td><input type="number" readonly disable name="macau" value="<?php echo $a[0];?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Nội dung</td>
                                            <td>
                                                <textarea class="textarea" id="" cols="30" rows="10" name="noidung"><?php echo $a[1]; ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nằm trong bài tập</td>
                                            <td>
                                            
                                                <select name="mabaiviet_baitap" id="" >
                                                    <?php 
                                                        while($b!=null)
                                                        {
                                                    ?>
                                                            <option <?php if($a[2] ==$b[0]) echo "selected"; ?> value="<?php echo $b[0]; ?>"><?php echo $b[1];?></option>
                                                    <?php
                                                        $b=mysqli_fetch_array($excute2);
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <?php 
                                            if($danhmuc==2 ||$danhmuc==4)
                                            {
                                        ?>

                                        
                                        <tr>
                                            <td>Âm thanh</td>
                                            <th class="audiochinhsuacauhoi">
                                                <table>
                                                    <tr>
                                                        <td><audio src="../<?php echo $a[3]?>" class="csaudio" ></audio><input type="text" style="display:inline" name="audiochuacs" value="<?php echo $a[3]?>"></td>
                                                        <th style="background-color:#ececec;" class="cotaudio"><i class="fa fa-play-circle" onclick="playaudios(0,'csaudio')"></i></th>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><input type="file" name="audio" onchange="displayaudiosingle('cotaudio')"></td>
                                                    </tr>
                                                
                                                </table>
                                            </th>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                        <tr>
                                            <th colspan="2"><input type="number" name="madanhmuc" value="<?php echo $danhmuc; ?>" style="display:none;"></th>
                                        </tr>
                                        <tr>
                                            <th colspan="2"><button type="submit" name="action" value="chinhsua">Chỉnh sửa</button></th>
                                        </tr>
                                    </table>
                                </form>
                    <?php
                            }
                        }
                        else 
                        {
                        ?>
                        <br>
                            <div id="chuyencau">
                                <?php
                                    for ($i=0; $i <count($macau) ; $i++) 
                                    { 
                                ?>
                                        <button onclick="choncaucs(<?php echo $i?>)">Câu <?php echo $macau[$i]; ?></button>
                                <?php
                                    }
                                ?>
                            </div>
                            <form action="suacauhoi.php" method="POST" enctype="multipart/form-data" id="formsuacauhoi">
                        <?php
                            for ($i=0; $i <count($macau) ; $i++) 
                            { 
                                $query="select * from cauhoi where macau=".$macau[$i];
                                $excute=mysqli_query($connect,$query);
                                $a=mysqli_fetch_array($excute);
                                $query="select mabaiviet_baitap,tieude from baiviet_baitap where matheloai in (select matheloai from tbltheloai where madanhmuc=$danhmuc)";
                                $excute2=mysqli_query($connect,$query);
                                $b=mysqli_fetch_array($excute2);
                            ?>
                            <br>
                                <div <?php if($i>0) echo "style='display: none;'" ?> class="divchinhsuacauhoi">
                                    <table class="bangchinhsuacauhoi" >
                                        <tr>
                                            <th colspan="2">Chỉnh sửa câu hỏi</th>
                                        </tr>
                                        <tr>
                                            <td>Mã câu</td>
                                            <td><input type="number" readonly disable name="macau[]" value="<?php echo $a[0];?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Nội dung</td>
                                            <td>
                                                <textarea class="textarea" id="" cols="30" rows="10" name="noidung[]"><?php echo $a[1]; ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nằm trong bài tập</td>
                                            <td>
                                            
                                                <select name="mabaiviet_baitap[]" id="" >
                                                    <?php 
                                                        while($b!=null)
                                                        {
                                                    ?>
                                                            <option <?php if($a[2] ==$b[0]) echo "selected"; ?> value="<?php echo $b[0]; ?>"><?php echo $b[1];?></option>
                                                    <?php
                                                        $b=mysqli_fetch_array($excute2);
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <?php 
                                            if($danhmuc==2 ||$danhmuc==4)
                                            {
                                        ?>

                                        
                                        <tr>
                                            <td>Âm thanh</td>
                                            <th class="audiochinhsuacauhoi">
                                                <table>
                                                    <tr>
                                                        <td><audio src="../<?php echo $a[3]?>" class="csaudio" ></audio><input type="text" style="display:inline" name="audiochuacs[]" value="<?php echo $a[3]?>"></td>
                                                        <th style="background-color:#ececec;"><i class="fa fa-play-circle" onclick="playaudios(<?php echo $i?>,'csaudio')"></i></th>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><input type="file" name="audio[]" onchange="displayaudio2(<?php echo $i?>)"></td>
                                                    </tr>
                                                
                                                </table>
                                            </th>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                        <tr>
                                            <th colspan="2"><input type="number" name="madanhmuc[]" value="<?php echo $danhmuc; ?>" style="display:none;"></th>
                                        </tr>
                                    </table>
                                </div>
                            <?php
                            }
                            ?>
                                <button id="btchinhcauhoi" name="action" value="chinhsua">Hoàn thành và lưu thay đổi</button>
                            </form>
                        <?php
                        }
                    }
                    else if (isset($_GET["option"])&&$_GET["option"]==6) // hiện chi tiết phương án và câu hỏi
                    {
                        $mabt=$_GET["mabt"];
                        $macau=$_GET["macau"];      
                        $query="select madanhmuc from tbltheloai where matheloai=(select matheloai from baiviet_baitap where mabaiviet_baitap=$mabt)";
                        $excute=mysqli_query($connect,$query);
                        $madanhmuc=mysqli_fetch_array($excute)[0];
                        $query="select cauhoi.macau,cauhoi.noidung,mabaiviet_baitap,cauhoi.audio,tblphuongan.noidung,img,tblphuongan.audio,dapan from cauhoi left join tblphuongan on cauhoi.macau=tblphuongan.macau where cauhoi.macau=$macau ";
                        $excute=mysqli_query($connect,$query);
                        $a=mysqli_fetch_array($excute);

                    ?>
                    <button id="btn_menutool" data-slide="0" onclick="menutool()" type="button">Menu tool</button>
                    <div id="menutool">
                            <h3 id="tieudetool">Công cụ</h3>
                            <a href="?mabt=<?php echo $mabt ?>&page=3&option=2"><button type="button"><i class="fa fa-plus"></i> Thêm câu hỏi</button></a>
                            <br>
                            <a href="?page=3&mabt=<?php echo $mabt?>&danhmuc=<?php echo $madanhmuc?>&option=5&macau=<?php echo $macau?>"><button type="button"><i class="fa fa-edit"></i> Sửa câu hỏi</button></a>
                            <br>
                            <a href="?page=3&option=7&macau=<?php echo $macau?>&mabt=<?php echo $mabt?>&danhmuc=<?php echo $madanhmuc?>"><button type="button"><i class="fa fa-edit"></i> Sửa phương án</button></a>
                            <br>
                            <a href="?page=3&option=1&mabt=<?php echo $mabt?>&trang=0"><button><i class="fa fa-align-justify"></i> Danh sách bài tập</button></a>
                            <br>
    
                        </div>

                    <br>
                    <br>

                        <table border="0" id="multiplechoice" cellspacing="6" cellpadding="5">
                            <tr style="background-color:#007ACC">
                                <th >Nội dung câu hỏi</th>
                                <th colspan="4">Audio</th>
                                
                            </tr>
                            <tr>
                                <th ><textarea class="textarea" name=""  id="noidungch" cols="30" rows="10"><?php echo $a[1];?></textarea> </th>
                                <th colspan="4"><i class="fa fa-play-circle" style="font-size:50px" onclick="playaudios(0,'audioupload')"></i></th>
                            </tr>
                            
                            <tr style="background-color:#007ACC">
                                <th colspan="2">Các phương án trong câu</th>
                                <th>Hình ảnh</th>
                                <th>Audio</th>
                                <th>Đáp án đúng</th>
                            </tr>
                            <?php
                                if($a[4]==null)
                                {
                            ?>
                                <tr class="rows">
                                    <th colspan="5">Chưa có phương án</th>
                                </tr>
                            <?php
                                }
                                else 
                                {
                                    $count=0;
                                    while ($a !=null) 
                                    {
                                ?>
                                    <tr class="rows">
                                        <td colspan="2">
                                            
                                            <table cellspacing="5" cellpadding="2" style="margin:unset;">
                                                <tr>
                                                    <td style="background-color:#007ACC">Nội dung phương án <?php echo $count+1?>: </td>
                                                    <td ><?php echo $a[4]?></td>                                                  
                                                </tr>
                                            </table>
                                        </td>
                                        <th><img src="../<?php echo $a[5]?>" alt="Chưa có hình ảnh" style="width:70px;height:auto;"></th>
                                        <th>
                                            <audio src="../<?php echo $a[6]?>" class="audio"></audio>
                                            <i class="fa fa-play-circle" style="font-size:35px" onclick="playaudios(<?php echo $count;?>,'audio')"></i>
                                        </th>
                                        <th><input type="radio" name="dapan" value="<?php echo $count;?>" <?php if($a[7]==0) echo"checked";?>></th>
                                    </tr>
                                <?php
                                    $a=mysqli_fetch_array($excute);
                                    $count++;
                                    }
                            ?>
                            <?php     
                                }
                            ?>
                        </table>
                            
                    <?php
                    }
                    else if (isset($_GET["option"])&&$_GET["option"]==7&&isset($_GET["danhmuc"])&&isset($_GET["macau"])) // sửa phương án
                    {
                        $madanhmuc=$_GET["danhmuc"];
                        $macau=$_GET["macau"];
                        $query="select count(maphuongan) from tblphuongan where macau=$macau";
                        $excute=mysqli_query($connect,$query);
                        $sophuongan=mysqli_fetch_array($excute)[0];
                        $query="select cauhoi.macau,cauhoi.noidung,cauhoi.audio,maphuongan,tblphuongan.noidung,img,tblphuongan.audio,dapan from cauhoi left join tblphuongan on cauhoi.macau=tblphuongan.macau where cauhoi.macau=$macau";
                        $excute=mysqli_query($connect,$query);
                        $a=mysqli_fetch_array($excute);
                        
                    ?>
                    <button id="btn_menutool" data-slide="0" onclick="menutool()" type="button">Menu tool</button>
                    <div id="menutool">
                        <h3 id="tieudetool">Công cụ</h3>
                        <a href="?mabt=<?php echo $_GET["mabt"]; ?>&page=3&option=1&trang=0"><button type="button"><i class="fa fa-plus"></i> Thống kê câu hỏi</button></a>
                        

                    </div>
                <?php
                    if(isset($_GET["errxoacau"])) 
                    {

                    ?>
                        <div id="tbthanhcong" style="border-left: 5px solid red;">
                            Xóa phương án không thành công
                            <br>
                            <br>
                        </div>
                    <?php
                    }
                    else if(isset($_GET["errthemcau"]))
                    {
                ?>
                        <div id="tbthanhcong" style="border-left: 5px solid red;">
                            Thêm phương án không thành công
                            <br>
                            <br>
                        </div>
                <?php
                    }
                ?> 
                    <br>
                    <br>
                        <form action="chinhsuacauhoi,phuongan.php" id="formthemcauhoi" method="POST" enctype="multipart/form-data">
                        <input type="text" name="mabaiviet_baitap" value=<?php echo $_GET["mabt"];?> style="display:none;">
                        <input type="text" name="macau" value=<?php echo $_GET["macau"];?> style="display:none;">
                        <input type="text" name="danhmuc" value=<?php echo $_GET["danhmuc"];?> style="display:none;">
                        <table  cellspacing="0" cellpadding="10" >
                            <tr>
                                <th colspan="3"><h2>Sửa câu hỏi và phương án</h2></th>
                                
                            </tr>
                            <tr style="background-color:#eaeaea;">
                                <td>Nội dung câu hỏi</td>
                                <td colspan="2">
                                    
                                    <?php 
                                    if($laymadanhmuc[0]==2 ||$laymadanhmuc[0]==4)
                                    {
                                    ?>

                                        <textarea class="textarea" name="noidungcauhoi"><?php echo $a[1]?></textarea>

                                        Trong thể loại câu hỏi này có khoảng trống để minh họa vị trí cần đặt đáp án đúng
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                        <textarea class="textarea" name="noidungcauhoi"><?php echo $a[1]?></textarea>
                                        
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                                if($laymadanhmuc[0]==2 ||$laymadanhmuc[0]==4)
                                {
                            ?>
                                    <tr style="color:white;background-color:#333333">
                                        <td>Âm thanh</td>
                                        <td class="cotaudio">
                                            <i style="font-size:22px" class="fa fa-play-circle" onclick="playaudios(0,'audiocs')"></i>
                                            <input type="text" name="audiochuacs" value="<?php echo $a[2]?>" style="display:none;">
                                            <input type="file" name="audiobt" onchange="alldisplayadio('audiocs','audiobt',0)">
                                            <audio src="../<?php echo $a[2]?>" class="audiocs"></audio>
                                        </td>
                                        <td><span class="err_at"></span></td>
                                    </tr>
                            <?php
                                }

                            ?>
                            <tr>
                                <td colspan="3">
                            <?php
                                if($laymadanhmuc[0]==2 ||$laymadanhmuc[0]==4)
                                {
                            ?>   
                                    <table border="0" id="multiplechoice" cellspacing="10">
                                        <tr>
                                            <th colspan="2">Thêm nhiều phương án</th>
                                            <th>Đáp án đúng</th>
                                            <th>Xóa</th>
                                        </tr>
                                        <?php 
                                        if($sophuongan>0)
                                        {

                                        
                                        $count=0;         
                                            while ($a!=null) 
                                            {
                                        ?>
                                            <tr class="rows">
                                                <td colspan="2">
                                                <table>
                                                    <tr>
                                                        <td>Phương án <?php echo $count+1?><input style="display:none" type="number" name="maphuongan[]" value="<?php echo $a[3]?>"></td>
                                                        <td><input type="text" name="noidung[]" value="<?php echo $a[4]; ?>"></td>   
                                                        <td><span class="err_noidung"></span></td>                                               
                                                    </tr>
                                                </table>
                                            </td>
                                            
                                            <th><input type="radio" name="dapan" value="<?php  echo $count?>" <?php if($a[7]==0) echo 'checked'; ?>></th>
                                            <th class="cotxoa"><a href="chinhsuacauhoi,phuongan.php?maphuongan=<?php echo $a[3]?>&option=<?php echo $_GET["option"]; ?>&danhmuc=<?php echo $_GET["danhmuc"]; ?>&mabt=<?php echo $_GET["mabt"]; ?>&macau=<?php echo $_GET["macau"]; ?>&action=xoa"><i class="fa fa-trash-o" style="font-size:30px;color:red;cursor:pointer"></i></a></th>
                                        </tr>
                                        <?php
                                            $a=mysqli_fetch_array($excute);
                                            $count++;
                                            }
                                        }
                                        else 
                                        {
                                        ?>
                                            <tr class="rows">
                                                <th colspan="5">
                                                    Chưa có phương án
                                                </th>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        
                                    </table>
                                    <table>
                                        <tr id="footertable">
                                            
                                            <th colspan="3" class="cotthempa"><a href="chinhsuacauhoi,phuongan.php?maphuongan=<?php echo $a[3]?>&option=<?php echo $_GET["option"]; ?>&danhmuc=<?php echo $_GET["danhmuc"]; ?>&mabt=<?php echo $_GET["mabt"]; ?>&macau=<?php echo $_GET["macau"]; ?>&action=them"><button type="button"><i class="fa fa-plus" style="font-size:25px;color:green"></i><?php echo $a ?> Thêm phương án</button></a></th>
                                        </tr>
                                    </table>
                                
                            <?php
                                }
                                else 
                                {
                            ?>
                                    <table border="0" id="multiplechoice" cellspacing="2">
                                        <tr >
                                            <th colspan="3">Thêm nhiều phương án</th>
                                            <th>Hình ảnh</th>
                                            <th>Âm thanh</th>
                                            <th>Đáp án đúng</th>
                                            <th>Xóa</th>       
                                        </tr>
                                        <?php 
                                        if($sophuongan>0)
                                        {
                                            $count=0;
                                            while($a!=null)
                                            {
                                        ?>
                                        <tr class="rows">
                                            <td colspan="3">
                                                <table>
                                                    <tr>
                                                        <td>Phương án <?php echo $count+1?><input style="display:none" type="number" name="maphuongan[]" value="<?php echo $a[3]?>"></td>
                                                        <td><input type="text" name="noidung[]" value="<?php echo $a[4] ?>"></td>
                                                        <td><span class="err_noidung"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>upload hình ảnh</td>
                                                        <td>
                                                            <input type="file" name="img[]" onchange="displayimg(<?php echo $count?>)">
                                                            <input type="text" name="imggoc[]" style="display:none"  value="<?php echo $a[5]?>">
                                                            <td><span class="err_ha"></span></td>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>upload âm thanh</td>
                                                        <td>
                                                            <input type="file" name="audio[]" onchange="displayaudio(<?php echo $count?>)" >
                                                            <input type="text" name="audiogoc[]" style="display:none"  value="<?php echo $a[6]?>">
                                                            <td><span class="err_at"></span></td>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <th><img src="../<?php echo $a[5]?>" alt="Chưa có hình ảnh" style="width:150px;height:auto;" class="imgupload"></th>
                                            <th class="iconaudio">
                                                <i class="fa fa-play-circle" onclick="playaudios(<?php echo $count?>,'audioupload')"></i>
                                                <audio src="../<?php echo $a[6]?>" class="audioupload"></audio>
                                            </th>
                                            <th><input type="radio" name="dapan" value="<?php  echo $count?>" <?php if($a[7]==0) echo"checked"; ?>></th>
                                            <th class="cotxoa"><a href="chinhsuacauhoi,phuongan.php?maphuongan=<?php echo $a[3]?>&option=<?php echo $_GET["option"]; ?>&danhmuc=<?php echo $_GET["danhmuc"]; ?>&mabt=<?php echo $_GET["mabt"]; ?>&macau=<?php echo $_GET["macau"]; ?>&action=xoa"><i class="fa fa-trash-o" style="font-size:30px;color:red;cursor:pointer"></i></a></th>
                                        </tr>
                                        <?php
                                            $varAPrevious=$a;
                                            $a=mysqli_fetch_array($excute);
                                            if($a==null){
                                                $a=$varAPrevious;
                                                break;
                                            }
                                            $count++;
                                            }
                                        }
                                        else 
                                        {
                                        ?>
                                            <tr class="rows">
                                                <th colspan="5">
                                                    Chưa có phương án
                                                </th>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    <table cellpadding="10">
                                        <tr>
                                            <th colspan="2" class="cotthempa"><a href="chinhsuacauhoi,phuongan.php?maphuongan=<?php echo $a[3]?>&option=<?php echo $_GET["option"]; ?>&danhmuc=<?php echo $_GET["danhmuc"]; ?>&mabt=<?php echo $_GET["mabt"]; ?>&macau=<?php echo $_GET["macau"]; ?>&action=them"><button type="button"><i class="fa fa-plus" style="font-size:25px;color:green"></i> Thêm phương án</button></a></th>
                                        </tr>
                                    </table>
                            <?php
                                }
                            ?>
                                </td>
                            </tr>
                            <tr style="padding:30px">
                                <th colspan="3"><button type="submit" name="action" value="chinhsua" onclick="return validatesuacauhoi(<?php if($laymadanhmuc[0]==2 ||$laymadanhmuc[0]==4) echo '0';else echo'1'; ?>)">Chỉnh sửa câu hỏi</button></th>
                            </tr>
                            
                        </table>
                    </form>
                    <?php
                    }
                ?>
                
                </div>
            </div>
    <?php
        }
    ?>
    <br>
    <br>    
    <br>
    <form action="kt_baitapbaiviet.php" id="form1">
        <table border="1" cellspacing="0">
            <tr>
                <th>Mã bài</th>
                <th>Tên bài tập</th>
                <th>Thể loại</th>
                <th>Số câu</th>
                <th>Hình ảnh</th>
                <th>Tình trạng</th>
                <th>Link tài liệu</th>
                <th>Câu hỏi, đáp án</th>
                <th>Chọn</th>
            </tr>
            <?php
            for($i=0;$i<count($arr);$i++)
            {
            ?>
                <tr>
                <?php
                    for($x=0;$x<count($arr[$i]);$x++)
                    {      
                            if($x==2)
                            {
                                $query="select matheloai,tentheloai from tbltheloai where matheloai=".$arr[$i][2];
                                $excute=mysqli_query($connect,$query);
                                $a=mysqli_fetch_array($excute,MYSQLI_NUM);
                                ?>
                                        <td><?php echo $a[1]?></td>
                                <?php                                    
                                
                            }
                            else if($x==5) 
                            {
                                if($arr[$i][$x]==0)
                                {
                                ?>                     
                                    <td>Xuất bản</td>
                                <?php
                                }
                                else 
                                {
                                ?>                     
                                    <td>Chưa xuất bản</td>
                                <?php    
                                }
                            }
                            else if($x==4)
                            {
                            ?>                     
                                <td><img src="../<?php echo $arr[$i][$x]?>" alt="" style="width:50px;height:50px"></td>
                            <?php
                            }
                            else 
                            {
                            ?>                     
                                <td><?php echo $arr[$i][$x]?></td>
                            <?php
                            }
                
                        if($x==count($arr[$i])-1)
                        {        
                ?>
                            <th><a href="?page=3&mabt=<?php echo $arr[$i][0];?>&option=1&trang=<?php if(isset($_GET["trang"])) echo $_GET["trang"]; else echo"0"?>"><button type="button" >Câu hỏi, đáp án</button></a></th>
                            <td><input  type="checkbox" name="checkbox[]" onchange="scanCheckBox()" value="<?php echo $arr[$i][0]; ?>"></td>
                <?php
                        }
                    }               
                ?>   
                </tr>               
            <?php       
            }
            ?>   
            <tr>
                <th colspan="5"><input type="submit" id="button_xoa" onclick="return confirm('Bạn có chắc chắn muốn xóa');" name="action" value="Xóa" style="width:70%;height:35px" disabled></th>
                <th colspan="5" ><button type="submit" id="button_sua" name="page" value="12" onclick="changeAction()" style="width:70%;height:35px" disabled>Sửa</button></th>
            </tr>
        </table>
    </form>
    <div id="chiaTrang">
        <?php
            $query="select count(*) as sobanghi from baiviet_baitap ";
            $excute=mysqli_query($connect,$query);
            $a=mysqli_fetch_array($excute);
            for ($i=0; $i < ceil($a["sobanghi"]/10) ; $i++) 
            { 
        ?>
                <a href="?page=3&trang=<?php echo $i?>"><button><?php echo $i+1?></button></a>
        <?php
            }
        ?>
    </div>
</body>
<?php
    if(isset($_GET["option2"])&&$_GET["option2"]=="thembt")
    {
?>
        <script src="js/validatebaitap.js?v<?php echo time()?>"></script>
<?php
    }
    else if(isset($_GET["option"])&&$_GET["option"]==2)
    {
?>
        <script src="js/validatethemcauhoi.js?v<?php echo time()?>"></script>
<?php
    }
    else if(isset($_GET["option"])&&$_GET["option"]==7)
    {
?>
        <script src="js/validatesuacauhoi.js?v<?php echo time()?>"></script>
<?php
    }
?>


<script>
    $(document).ready(function (){
        $("#timkiem > input[type='text']").keypress(function()
        {
            $.get("ajaxbaivietbaitap.php",{action:"timkiem",keyword:$(this).val()},function(data)
            {
                $("#hintsearch").html(data);
                $("#divhintsearch").css("display","block");
                $("#hintsearch > tr ").click(function(){
                    $.get("ajaxbaivietbaitap.php",{action:"getbt",mabt:$(this).data("mabt")},function(data)
                    {
                        $("#form1").html(data);
                    });
                })
            })
        })
        
        $(window).click(function(){
            console.log(event.target);
            if(event.target==$("#timkiem")[0] ||event.target==$("#divhintsearch >i")[0])
            {
                $("#divhintsearch").css("display","none");
            }
        })
    })
    function choncaucs(x)
    {
        var div;
        div=document.getElementsByClassName("divchinhsuacauhoi");
        for(var i=0;i<div.length;i++)
        {
            if(i==x)
            {
                div[i].style.display="block";
            }
            else
            {
                div[i].style.display="none";
            }
        }
    }
    function changeAction()
    {
        var a;
        a=document.getElementById("form1");
        a.action="menusetting.php";
        return true;
    }
    
    function timkiem1()
    {
        var a;
        a=document.querySelector("#timkiem > input[type='text']");
        a.value="";
    }
    function khongduocxoa() 
    {
        alert("Bạn không được xóa thể loại này do thể loại đã chứa bài viết");
    }
    <?php 
        if(isset($_GET["err"])&&$_GET["err"]==1)
        {
    ?>
            khongduocxoa();
    <?php
        }
    ?>
    function searchtheloai1() 
    {
        var select,form;
        select=document.getElementById("searchtheloai");
        form=document.getElementById("timkiem");
        form.submit();
    }

    function xemphuongan(x) 
    {
        var phuongan;
        phuongan=document.getElementsByClassName("contentphuongan");
        for(var i=0;i<phuongan.length;i++)
        {
            if(i==x)
            {
                phuongan[i].style.display="block";
            }
            else
            {
                phuongan[i].style.display="none";
            }
        }
    }
    var dongthemcau,dongxemthemcauhoi;
    dongthemcau=document.getElementById("themcauhoi");
    window.onclick = function (event) 
    {
        if(event.target == dongthemcau)
        {
            dongthemcau.style.display="none";
        }
        
    }
    function  previewImg(x) 
    {
        var img,inputfile;
        img =document.getElementsByClassName("themanhbaitap");
        inputfile=document.getElementsByClassName("chonimgadd");
        img[x].src=URL.createObjectURL(inputfile[x].files[0]);
    }
    function themphuongan(type) 
    {
        var table,tr,newtr,count;
        table=document.querySelector("#multiplechoice > tbody");
        tr=document.getElementsByClassName("rows");
        if(type==0)
        {
            if(tr.length>=5)
            {
                alert("Không được thêm quá nhiều phương án");
            }
            else
            {
                newtr=tr[tr.length-1].cloneNode(true);
                console.log(newtr);
                count=tr.length+1;
                newtr.children[0].children[0].children[0].children[0].children[0].innerHTML="Phương án "+count;
                newtr.children[2].children[0].setAttribute('onClick','playaudios('+tr.length+',"audioupload")');
                newtr.children[0].children[0].children[0].children[1].children[1].children[0].setAttribute('onchange','displayimg('+tr.length+')');
                newtr.children[0].children[0].children[0].children[2].children[1].children[0].setAttribute('onchange','displayaudio('+tr.length+')');
                newtr.children[3].children[0].value=tr.length;
                newtr.children[4].children[0].setAttribute("onClick","xoaElePhuongan("+tr.length+",0)");
                table.insertBefore(newtr,table.childNodes[table.childNodes.length]);
            }
           
        }
        else 
        {
            if(tr.length>=5)
            {
                alert("Không được thêm quá nhiều phương án");
            }
            else
            {
                newtr=tr[tr.length-1].cloneNode(true);
                console.log(newtr);
                count=tr.length+1;
                newtr.children[0].children[0].children[0].children[0].children[0].innerHTML="Phương án "+count;
                newtr.children[1].children[0].value=tr.length;
                newtr.children[2].children[0].setAttribute("onClick","xoaElePhuongan("+tr.length+",0)");
                table.insertBefore(newtr,table.childNodes[table.childNodes.length]);
            

            }
        }
    }
    function xoaElePhuongan(x,type) 
    {
        var tr;
        tr=document.getElementsByClassName("rows");
        if(type==0)
        {
            if(tr.length<4)
            {
                alert("Không được có ít hơn 3 phương án");
            }
            else
            {
                tr[x].remove();
            }
        }
        else
        {
            if(tr.length==1)
            {
                alert("Không được có ít hơn 1 phương án");
            }
            else
            {
                tr[x].remove();
            }
        }
        
        
    }
    function displayimg(x)
    {
        var inputfile,img;
        inputfile =document.getElementsByName("img[]");
        img=document.getElementsByClassName("imgupload");
        img[x].src=URL.createObjectURL(inputfile[x].files[0]);
        
    }
    function displayaudio(x)
    {
        var inputfile,audio,i;
        i=document.querySelectorAll(".iconaudio> i");
        i[x].style.color="blue";
        inputfile =document.getElementsByName("audio[]");
        audio=document.getElementsByClassName("audioupload");
        audio[x].src=URL.createObjectURL(inputfile[x].files[0]);
        
    }
    function displayaudio2(x)
    {
        var inputfile,audio,i;
        inputfile =document.getElementsByName("audio[]");
        audio=document.getElementsByClassName("csaudio");
        audio[x].src=URL.createObjectURL(inputfile[x].files[0]);
        
    }
    function displayaudiosingle(y)
    {
        var inputfile,audio,i;
        i=document.querySelector("."+y+">i");
        audio=document.getElementsByClassName("csaudio");
        inputfile=document.getElementsByName("audio");
        audio[0].src=URL.createObjectURL(inputfile[0].files[0]);
        
    }
    function alldisplayadio(audios,inputFile,n) 
    {
        audio=document.getElementsByClassName(audios);
        inputfile=document.getElementsByName(inputFile);
        audio[n].src=URL.createObjectURL(inputfile[n].files[0]);
    }
    function playaudios(x,y)
    {
        audio=document.getElementsByClassName(y);
        for(var i=0;i<audio.length;i++)
        {
            if(i==x)
            {
                audio[i].play();
            }   
            else
            {
                audio[i].pause();
                audio[i].currentTime=0;
            }
        }
        

    }
    function changeaction(x)
    {
        if(x==1)
        {
            var form;
            form=document.getElementById("formndcauhoi");
            form.action="suacauhoi.php";
        }

    }
    function canhbaoxoacau(x) 
    {
        var checkbox;
        var buttonxoa,toolxoa;
        buttonxoa=document.getElementsByClassName("buttonxoacau");
        toolxoa=document.getElementById("xoacauhoi");
        checkbox=document.getElementsByName("macau[]");
        if(checkbox[x].checked==true)
        {
            buttonxoa[x].disabled=true;
            toolxoa.disabled=true;
        }
        else
        {
            buttonxoa[x].disabled=false;
            toolxoa.disabled=false;
        }
    }
    function suapacauhoi()
    {
        var checkbox,suacauhoi,xoacauhoi,suaphuongan;
        suacauhoi=document.getElementsByName("option");
        xoacauhoi=document.getElementById("xoacauhoi");
        suaphuongan=document.getElementsByClassName("option2");
        checkbox=document.getElementsByName("macau[]");
        var kt=1;
        for(var i=0;i<checkbox.length;i++)
        {
            if(checkbox[i].checked==true)
            {
                suacauhoi[0].disabled=false;
                xoacauhoi.disabled=false;
                suaphuongan[0].disabled=false;
                kt=0;
                break;
            }
        }
        if(kt==1)
        {
            suacauhoi[0].disabled=true;
            xoacauhoi.disabled=true;
            suaphuongan[0].disabled=true;
        }
    }
    function hientiny()
    {
       
        tinymce.activeEditor.getBody().setAttribute('contenteditable', false);
    }
    function validateThemBaiTap() 
    {
        var count=[0];
        validateTextBox("tieude",count);
        validateTextBox("mota",count);
        validateSelect("matheloai",count);
    }
 
    function scanCheckBox() 
    {
        var checkbox, btnXoa, kt = 1, button_sua;
        checkbox = document.getElementsByName("checkbox[]");
        btnXoa = document.getElementById("button_xoa");
        button_sua = document.getElementById("button_sua");
        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked == true) {
                kt = 0;
                btnXoa.disabled = false;
                button_sua.disabled = false;
            }
        }
        if (kt == 1) {
            btnXoa.disabled = true;
            button_sua.disabled = true;
        }
    }
    function menutool()
    {
        var button;
        button=document.getElementById("btn_menutool");
        var menutool;
        menutool=document.getElementById("menutool");
        if(button.getAttribute("data-slide")==0)
        {
            menutool.style.right="0%";
            button.style.right="17.8%"
            button.setAttribute("data-slide","1");
        }
        else
        {
            menutool.style.right="-20%";
            button.style.right="-2%"
            button.setAttribute("data-slide","0");
        }
    }
</script>