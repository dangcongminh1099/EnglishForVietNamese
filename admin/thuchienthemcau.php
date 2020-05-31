<?php 
    if(isset($_GET["noidungcauhoi"])&&$_GET["noidungcauhoi"]!=""&&isset($_GET["noidungphuongan"])&&isset($_GET["dapan"])&&$_GET["dapan"]!=-1&&isset($_GET["mabaiviet_baitap"])&&$_GET["mabaiviet_baitap"]!=0)
    {
        $connect=connect("project");
        $noidungcauhoi=$_GET["noidungcauhoi"];
        $noidungphuongan=$_GET["noidungphuongan"];
        $mabaiviet_baitap=$_GET["mabaiviet_baitap"];
        $dapan=$_GET["dapan"];
        $query="insert into cauhoi(noidung,mabaiviet_baitap) value('$noidungcauhoi','$mabaiviet_baitap')";
        echo $query;
        $excute=mysqli_query($connect,$query);
        $query="select max(macau) from cauhoi";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
        $macau=$a[0];
        echo $macau;
        for($i=0;$i<count($dapan);$i++)
        {
            
            $query="insert into tblphuongan(noidung,dapan,macau) value('".$noidungphuongan[$i]."',"."'".$dapan[$i]."',"."'".$macau."')";
            $excute=mysqli_query($connect,$query);
        }
        header("Location:menusetting.php?page=4");
    }
    else 
    {
        header("Location:menusetting.php?page=9&err");
    }
?>