<body>
    <h2 id="tieudetable">Bảng thể loại</h2>
    <?php
        $connect=connect("project");
        utf8($connect);
        $query="select tbltheloai.matheloai,tentheloai,count(mabaiviet_baitap) from tbltheloai left JOIN baiviet_baitap on tbltheloai.matheloai=baiviet_baitap.matheloai GROUP BY tbltheloai.matheloai";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute,MYSQLI_NUM);
        $max=$a[0];
    ?>
    <form action="" id="timkiem">
        <input type="text" name="timkiem" value="Nhập tên cần tìm" onclick="timkiem1()">

        <select name="matheloai" id="">
            <option value="0">Hãy chọn mã danh mục</option>
            <?php
                while($a!=null)
                {
                    if($a[0]>$max)
                    {
                        $max=$a[0];
                    }
                ?>
                    <option value="<?php echo $a[0]?>" <?php if(isset($_GET['matheloai'])&&$_GET["matheloai"]==$a[0]) echo "selected";?>><?php echo $a[1]?></option>
                <?php
                    $a=mysqli_fetch_array($excute,MYSQLI_NUM);
                }
            ?>

        </select>
        <button value="2" name="page"><i class="fa fa-search"></i>Tìm kiếm</button>
    </form>

    <br>
    
    <?php

        if(isset($_GET["matheloai"])&&isset($_GET["timkiem"])&&$_GET["matheloai"]!=0&&$_GET["timkiem"]!="Nhập tên cần tìm")
        {
            $matheloai=$_GET["matheloai"];
            $tentheloai=$_GET["timkiem"];
            $query="select tbltheloai.matheloai,tentheloai,madanhmuc,count(mabaiviet_baitap) from tbltheloai left JOIN baiviet_baitap on tbltheloai.matheloai=tbltheloai.matheloai where tbltheloai.matheloai=$matheloai and tbltheloai.tentheloai like '%$tentheloai%' GROUP BY tbltheloai.matheloai";
        }
        else if(isset($_GET["matheloai"])&&$_GET["matheloai"]==0&&isset($_GET["timkiem"])&&$_GET["timkiem"]!="Nhập tên cần tìm")
        {
            $tentheloai=$_GET["timkiem"];
            $query="select tbltheloai.matheloai,tentheloai,madanhmuc,count(mabaiviet_baitap) from tbltheloai left JOIN baiviet_baitap on tbltheloai.matheloai=baiviet_baitap.matheloai where tbltheloai.tentheloai like '%$tentheloai%' GROUP BY tbltheloai.matheloai";
        }
        else if(isset($_GET["matheloai"])&&$_GET["matheloai"]!=0&&isset($_GET["timkiem"])&&$_GET["timkiem"]=="Nhập tên cần tìm")
        {
            $matheloai=$_GET["matheloai"];
            $query="select tbltheloai.matheloai,tentheloai,madanhmuc,count(mabaiviet_baitap) from tbltheloai left JOIN baiviet_baitap on tbltheloai.matheloai=baiviet_baitap.matheloai where tbltheloai.matheloai=$matheloai GROUP BY tbltheloai.matheloai";
        }
        else 
        {
            $query="select tbltheloai.matheloai,tentheloai,madanhmuc,count(mabaiviet_baitap) from  tbltheloai left JOIN baiviet_baitap   on tbltheloai.matheloai=baiviet_baitap.matheloai GROUP BY tbltheloai.matheloai";
        }
      
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute,MYSQLI_NUM);
        $arr=[];
        $i=0;
        while($a!=null)
        {    
            $arr[$i]=$a;
            $a=mysqli_fetch_array($excute,MYSQLI_NUM);
            $i++;
        }
    ?>
    <br>
    <br>
    <br>
    <form action="kt_theloai.php" id="form1">
        <table border="1" cellspacing="0">
            <tr>
                <td>Mã thể loại</td>
                <td>Tên thể loại</td>
                <td>Danh mục</td>
                <td>Số bài viết</td>

                <td>Chọn</td>
                <td>Xóa</td>
                <td>Chỉnh sửa</td>
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
                                $query="select madanhmuc,tendanhmuc from tbldanhmuc where madanhmuc=".$arr[$i][2];
                                $excute=mysqli_query($connect,$query);
                                $a=mysqli_fetch_array($excute,MYSQLI_NUM);
                                ?>
                                        <td><?php echo $a[1]?></td>
                                <?php                                    
                            continue; 
                            }
                ?>                     
                    <td><?php echo $arr[$i][$x]?></td>
                <?php
                        if($x==count($arr[$i])-1)
                        {        
                ?>
                            <td><input  type="checkbox" onchange="scanCheckBox()"name="checkbox[]" value="<?php echo $arr[$i][0]; ?>"></td>
                <?php
                        }
                        if($i==0 && $x==count($arr[$i])-1)
                        {
                        ?>
                            <td rowspan="<?php echo count($arr); ?>"><input type="submit" id="button_xoa" name="action" onclick="return confirm('Bạn có chắc chắn muốn xóa')" value="Xóa" disabled></td>
                            <td rowspan="<?php echo count($arr); ?>"><button type="submit" name="page" id="button_sua" value="2" disabled onclick="changeAction()">Sửa</button></td>
                                
                        <?php
                        }
                    }               
                ?>   
                </tr>               
            <?php
                if($i==count($arr)-1)
                {
            ?>
                    <tr style="position:fixed;top:30%">
                        <td>
                            <input type="number" name="matheloai" value="<?php echo $max+1?>" readonly>          
                        </td>
                        <td>
                            <input type="text" name="tentheloai" >
                        </td>
                        <td>
                            <select name="madanhmuc" id="">
                                <option value="0">Chọn mã danh mục</option>
                            <?php
                                $query="select madanhmuc,tendanhmuc from tbldanhmuc ";
                                $excute=mysqli_query($connect,$query);
                                $a=mysqli_fetch_array($excute,MYSQLI_NUM);
                                while($a!=null)
                                {
                            ?>
                                <option value="<?php echo $a[0]?>"><?php echo $a[1]?></option>
                                
                            <?php
                                $a=mysqli_fetch_array($excute,MYSQLI_NUM);
                                }
                            ?>
                            </select>
                        </td>
                        <th colspan="4"><a href=""><button type="submit" name="action" value="Thêm" onclick="return validateThemTL('tentheloai','madanhmuc')">Thêm</button></a></th>
                    </tr>
            <?php
                }
                
            }

            ?>   
        </table>
    </form>
    <br>
    <br>
    <br>
    <?php
        if(isset($_GET["checkbox"]))
        {
        $matheloai=$_GET["checkbox"];
    ?>
    <form action="kt_theloai.php">
        <table border="1" cellspacing="0">
            <tr>
                <td>Mã thể loại</td>
                <td>Tên thể loại</td>
                <td>Danh mục</td>
                <th rowspan="<?php echo count($matheloai)+1?>"><button type="submit" name="action" value="Chỉnh sửa" onclick="return validateThemTL('tentheloai[]','madanhmuc[]')">Chỉnh sửa</button></th>
            </tr>
            <?php 
                
                    $matheloai=$_GET["checkbox"];
                    for ($i=0; $i <count($arr) ; $i++) 
                    { 
                        for ($x=0; $x <count($matheloai) ; $x++) 
                        { 
                            if($arr[$i][0]==$matheloai[$x])
                            {
                            ?>
                                <tr>
                                    <td><input type="text" name="matheloai[]" value="<?php echo $arr[$i][0]?>" readonly></td>
                                    <td><input type="text" name="tentheloai[]" value="<?php echo $arr[$i][1]?>"></td>
                                    <td>
                                        <select name="madanhmuc[]" id="">
                                            <option value="0">Chọn danh mục</option>
                                        <?php 
                                            $excute=mysqli_query($connect,$query);
                                            $a=mysqli_fetch_array($excute);
                                            while ($a!=null) 
                                            {
                                        ?>
                                                <option value="<?php echo $a[0]?>"
                                                    <?php
                                                        if($arr[$i][2]==$a[0])
                                                            echo "selected";
                                                    ?>
                                                ><?php echo $a[1]?></option>
                                        <?php
                                                $a=mysqli_fetch_array($excute);
                                            }
                                        ?>
                                            
                                        </select>
                                    </td>
                                </tr>
                            <?php
                            }
                        }
                    }
                
            ?>
        </table>
    </form>
    <?php
        }
    ?>
    
    
</body>
<script src="js/validate.js?v<?php echo time()?>"></script>
<script>
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
    function thongbaoloi() 
    {
        alert("Không thực hiện thành công");
    }
    <?php 
        if(isset($_GET["err"])&&$_GET["err"]==1)
        {
    ?>
            khongduocxoa();
    <?php
        }
        else if(isset($_GET["err"])&&$_GET["err"]==2)
        {
    ?>
            thongbaoloi();
    <?php
        }
    ?>
    function validateThemTL(x,y)
    {
        var count=[0];
        validateTextBox(x,count);
        validateSelect(y,count);
        if(count[0]==2)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
</script>