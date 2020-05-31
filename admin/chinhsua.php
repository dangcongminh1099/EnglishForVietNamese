<?php
include("../connect/connect.php");
if(isset($_GET["checkbox"]))
    {
        $connect=connect("project");
        utf8($connect);
        $madanhmuc=$_GET["checkbox"];
        $query="select*from tbldanhmuc where madanhmuc in(";
        for($i=0;$i<count($madanhmuc);$i++)
        {
            if ($i==count($madanhmuc)-1) {
                $query=$query.$madanhmuc[$i].")";
            }
            else 
            {
                $query=$query.$madanhmuc[$i].",";
            }
            
        }
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
        
?>
    <form action="kt_danhmuc.php" >
        <table border="1" cellspacing="0">
            <tr>
                <td>Mã danh mục</td>
                <td>Tên danh mục</td>
                <th rowspan="<?php echo count($madanhmuc)+1?>"><input type="submit" name="action" value="Chỉnh sửa"></th>
            </tr>
        <?php
        while($a!=null)
        {
        ?>
            <tr>
                <td><input type="text" name="madanhmuc[]" value="<?php echo $a["madanhmuc"];?>" readonly></td>
                <td><input type="text" value="<?php echo $a["tendanhmuc"];?>" name="tendanhmuc[]"></td>
            </tr>
        <?php
        $a=mysqli_fetch_array($excute);
        }
        ?>
            
        </table>
    </form>
<?php
    }
    else 
    {
    ?>
        <h2>Bạn chưa chọn phần để sửa</h2>
        <a href="menusetting.php?page=1"><Button>Quay lại</Button></a>
    <?php
    }