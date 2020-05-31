<body>
    <h2 id="tieudetable">Bảng danh mục</h2>
    <?php
        $connect=connect("project");
        utf8($connect);
        $query="select tbldanhmuc.madanhmuc,tendanhmuc,count(matheloai) from tbldanhmuc left JOIN tbltheloai on tbltheloai.madanhmuc=tbldanhmuc.madanhmuc GROUP BY tbldanhmuc.madanhmuc";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute,MYSQLI_NUM);
        $max=$a[0];
    ?>
    <form action="?page=1" id="timkiem">
        <input type="text" name="timkiem" value="Nhập tên cần tìm" onclick="timkiem1()">
        <select name="madanhmuc" id="">
            <option value="0">Tìm mã danh mục</option>
            <?php
                while($a!=null)
                {
                    if($a[0]>$max)
                    {
                        $max=$a[0];
                    }
                ?>
                    <option value="<?php echo $a[0]?>" <?php if(isset($_GET['madanhmuc'])&&$_GET["madanhmuc"]==$a[0]) echo "selected";?>><?php echo $a[1]?></option>
                <?php
                    $a=mysqli_fetch_array($excute,MYSQLI_NUM);
                }
            ?>

        </select>  
        <button value="1" name="page"><i class="fa fa-search"></i>Tìm kiếm</button>
    </form>
    <br>
    
    
    <?php

        if(isset($_GET["madanhmuc"])&&isset($_GET["timkiem"])&&$_GET["madanhmuc"]!=0&&$_GET["timkiem"]!="Nhập tên cần tìm")
        {
            $madanhmuc=$_GET["madanhmuc"];
            $tendanhmuc=$_GET["timkiem"];
            $query="select tbldanhmuc.madanhmuc,tendanhmuc,count(matheloai) from tbldanhmuc left JOIN tbltheloai on tbltheloai.madanhmuc=tbldanhmuc.madanhmuc where tbldanhmuc.madanhmuc=$madanhmuc and tbldanhmuc.tendanhmuc like '%$tendanhmuc%' GROUP BY tbldanhmuc.madanhmuc";
        }
        else if(isset($_GET["madanhmuc"])&&$_GET["madanhmuc"]==0&&isset($_GET["timkiem"])&&$_GET["timkiem"]!="Nhập tên cần tìm")
        {
            $tendanhmuc=$_GET["timkiem"];
            $query="select tbldanhmuc.madanhmuc,tendanhmuc,count(matheloai) from tbldanhmuc left JOIN tbltheloai on tbltheloai.madanhmuc=tbldanhmuc.madanhmuc where tbldanhmuc.tendanhmuc like '%$tendanhmuc%' GROUP BY tbldanhmuc.madanhmuc";
        }
        else if(isset($_GET["madanhmuc"])&&$_GET["madanhmuc"]!=0&&isset($_GET["timkiem"])&&$_GET["timkiem"]=="Nhập tên cần tìm")
        {
            $madanhmuc=$_GET["madanhmuc"];
            $query="select tbldanhmuc.madanhmuc,tendanhmuc,count(matheloai) from tbldanhmuc left JOIN tbltheloai on tbltheloai.madanhmuc=tbldanhmuc.madanhmuc where tbldanhmuc.madanhmuc=$madanhmuc GROUP BY tbldanhmuc.madanhmuc";
        }
        else 
        {
            $query="select tbldanhmuc.madanhmuc,tendanhmuc,count(matheloai) from tbldanhmuc left JOIN tbltheloai on tbltheloai.madanhmuc=tbldanhmuc.madanhmuc GROUP BY tbldanhmuc.madanhmuc";
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
    
    
    
    <form action="kt_danhmuc.php" id="form1">
        <table border="1" cellspacing="0">
            <tr>
                <td>Mã danh mục</td>
                <td>Tên danh mục</td>
                <td>Có bn thể loại</td>
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
                ?>
                        <td><?php echo $arr[$i][$x];?></td>    

                <?php   
                    if($x==count($arr[$i])-1)
                    {
                       
                        
                ?>
                            <td><input  type="checkbox" onchange="scanCheckBox()" name="checkbox[]" value="<?php echo $arr[$i][0]; ?>"></td>
                <?php
                        
                
                    }
                    if($i==0 && $x==count($arr[$i])-1)
                    {
                        ?>
                            <td rowspan="<?php echo count($arr); ?>"><input type="submit" disabled id="button_xoa" name="action" onclick="return confirm('Bạn có chắc chắn muốn xóa');" value="Xóa"></td>
                            <td rowspan="<?php echo count($arr); ?>"><button type="submit" disabled id="button_sua" name="page" value="1" onclick="changeAction()">Sửa</button></td>
                                
                        <?php
                        }
                    }
                ?>   
                </tr>
                
            <?php
                if($i==count($arr)-1)
                {
            ?>
                    <tr >
                        <td>
                            <input type="number" name="madanhmuc" value="<?php echo $max+1?>" readonly>          
                        </td>
                        <td>
                            <input type="text" name="tendanhmuc" >
                        </td>
                        <th colspan="4"><a href=""><button type="submit" name="action" value="Thêm" onclick="return validateDanhmuc('tendanhmuc')">Thêm</button></a></th>
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
        $madanhmuc=$_GET["checkbox"];
    ?>
    <form action="kt_danhmuc.php">
        <table border="1" cellspacing="0">
            <tr>
                <td>Mã danh mục</td>
                <td>Tên danh mục</td>
                <th rowspan="<?php echo count($madanhmuc)+1?>"><button type="submit" name="action" onclick="return validateDanhmucChinhsua('tendanhmuc[]',0)"  value="Chỉnh sửa">Chỉnh sửa</button></th>
            </tr>
            <?php 
                
                    $madanhmuc=$_GET["checkbox"];
                    for ($i=0; $i <count($arr) ; $i++) 
                    { 
                        for ($x=0; $x <count($madanhmuc) ; $x++) 
                        { 
                            if($arr[$i][0]==$madanhmuc[$x])
                            {
                            ?>
                                <tr>
                                    <td><input type="text" name="madanhmuc[]" value="<?php echo $arr[$i][0]?>" readonly></td>
                                    <td><input type="text" name="tendanhmuc[]" value="<?php echo $arr[$i][1]?>"></td>
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
        alert("Bạn không được xóa danh mục này do danh mục đã chứa bài viết");
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
        else if (isset($_GET["err"])&&$_GET["err"]==2) 
        {
    ?>
            thongbaoloi();
    <?php
        }
        close($connect);
    ?>
    function  validateDanhmuc(x) 
    {
        var count=[0];
        validateTextBox(x,count);
        if(count[0]==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function  validateDanhmucChinhsua(x) 
    {
        var count=[0];
        validateTextBox(x,count);
        if(count[0]==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
</script>