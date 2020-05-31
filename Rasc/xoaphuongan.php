<?php
if (isset($_GET["checkboxcauhoi"])) 
{
    $connect=connect("project");
    utf8($connect);
    $checkboxcauhoi=$_GET["checkboxcauhoi"];
    $query="select tblphuongan.noidung,dapan,cauhoi.macau,cauhoi.noidung,tblphuongan.maphuongan from tblphuongan inner join cauhoi on tblphuongan.macau=cauhoi.macau where cauhoi.macau in(";
    for ($i=0; $i <count($checkboxcauhoi); $i++) 
        { 

            if ($i==count($checkboxcauhoi)-1) 
            {
                $query=$query.$checkboxcauhoi[$i].")";
            }
            else 
            {
                $query=$query.$checkboxcauhoi[$i].",";
            }
            
        }
    $excute=mysqli_query($connect,$query);
    $a=mysqli_fetch_array($excute);
}
else {
    header("Location:menusetting.php?page=4&err");
}  


?>
<h2 id="tieudetable">Xóa phương án</h2>
<form action="thuchienxoaphuongan.php">
    <table border="1" cellspacing="0">
        <tr>
            <td>Nội dung</td>
            <td>Phương án</td>
            <td>Mã câu</td>
            <td>Chọn</td>
            
        </tr>
        <?php
            $macau="";
            while ($a !=null) 
            {
                if($macau!=$a[2])
                {
            ?>
                    <tr>
                        <td colspan="4">Nội dung câu hỏi: <?php echo $a[3];?></td>
                    </tr>
                    <tr>
                        <td><?php echo $a[0]?></td>
                        <td><?php if($a[1]==1) echo "Sai"; else echo"Đúng";?></td>
                        <td><?php echo $a[2]?></td>
                        <td><input type="checkbox" name="maphuongan[]" value="<?php  echo $a[4]?>"></td>
                    </tr>
            <?php
                }
                else 
                {
            ?>
                    <tr>
                        <td><?php echo $a[0]?></td>
                        <td><?php if($a[1]==1) echo "Sai"; else echo"Đúng";?></td>
                        <td><?php echo $a[2]?></td>
                        <td><input type="checkbox" name="maphuongan[]" value="<?php  echo $a[4]?>"></td>
                    </tr>
            <?php
                }
            ?>
                
            
        <?php
                $macau=$a[2];
                $a=mysqli_fetch_array($excute);

            }
        ?>
        <tr ><th colspan="4"><input type="submit" value="Xóa"></th></tr>
    </table>
</form>