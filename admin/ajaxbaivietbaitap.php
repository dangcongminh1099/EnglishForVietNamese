<?php
    $connect=new mysqli("localhost","root","","project");
    mysqli_set_charset($connect,"utf8");
    if(isset($_GET["action"])&&$_GET["action"]=="timkiem"&&isset($_GET["keyword"]))
    {
        $keyword=$_GET["keyword"];
        $query="select * from baiviet_baitap where tieude like '%$keyword%'";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
        if($a==null)
        {
        ?>
            <tr>
                <td>Không có bài viết nào tìm thấy</td>
            </tr>
        <?php
        }
        else 
        {
            while($a!=null)
            {
            ?>
                <tr data-mabt="<?php echo $a[0]?>">
            <?php
                    $arr=explode(" ",$a[1]);
                    if(count($arr)>10)
                    {
                    ?>
                        <td><img src="../<?php echo $a[3] ?>" alt="Err" style="max-width: 30px;max-height: 30px;"></td>
                        <td><?php 
                                for ($i=0; $i <10 ; $i++) { 
                                    echo ($arr[$i]." ");
                                }
                            ?></td>
                    <?php
                    }
                    else {
                    ?>
                        <td ><img src="../<?php echo $a[3] ?>" alt="Err" style="max-width: 30px;max-height:30px;"></td>
                        <td ><?php echo $a[1]?></td>
                    <?php
                    }
                    $a=mysqli_fetch_array($excute);
            ?>
                </tr>
            <?php
            }
        }
    }
    else if(isset($_GET["action"])&&$_GET["action"]=="getbt"&&isset($_GET["mabt"]))
    {
        $mabt=$_GET["mabt"];
        $query="select * from baiviet_baitap where mabaiviet_baitap=$mabt";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
    ?>
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
            <tr>
                <td><?php echo $a[0]?></td>
                <td><?php echo $a[1]?></td>
                <td><?php $query="select tentheloai from tbltheloai where matheloai = ".$a[6];
                        $excute2=mysqli_query($connect,$query);
                        $b=mysqli_fetch_array($excute2)[0];
                        echo $b;
                ?></td>
                <th><?php $query="select count(*) from cauhoi where mabaiviet_baitap = ".$a[0];
                        $excute2=mysqli_query($connect,$query);
                        $b=mysqli_fetch_array($excute2)[0];
                        echo $b;
                ?></th>
                <td><img src="../<?php echo $a[3]?>" alt="" style="width:50px;height:50px"></td>
                <td><?php if($a[4]==1) echo"Chưa xuất bản"; else echo "Xuất bản";?></td>
                <td><?php echo $a[5]?></td>
                <th><a href="?page=3&mabt=<?php echo $a[0];?>&option=1&trang=<?php if(isset($_GET["trang"])) echo $_GET["trang"]; else echo"0"?>"><button type="button" >Câu hỏi, đáp án</button></a></th>
                <th><input  type="checkbox" name="checkbox[]" onchange="scanCheckBox()" value="<?php echo $mabt;?>"></th>
               
            </tr>
            <tr>
                <th colspan="5"><input type="submit" id="button_xoa" onclick="return confirm('Bạn có chắc chắn muốn xóa');" name="action" value="Xóa" style="width:70%;height:35px" disabled></th>
                <th colspan="5" ><button type="submit" id="button_sua" name="page" value="12" onclick="changeAction()" style="width:70%;height:35px" disabled>Sửa</button></th>
            </tr>
    <?php
    }
?>