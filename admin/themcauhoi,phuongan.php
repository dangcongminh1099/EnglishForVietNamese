<body>
<form action="menusetting.php">
    <h2 id="">Thêm câu hỏi, phương án</h2>
    Câu hỏi <input type="text" name="noidungcauhoi" value="<?php if(isset($_GET['noidungcauhoi'])) echo $_GET['noidungcauhoi'];?>"> Bài tập
    <?php
        $connect=connect("project");
        utf8($connect);
        $query="select mabaiviet_baitap,tieude from baiviet_baitap";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute,MYSQLI_NUM);
    ?>
    <select name="mabaiviet_baitap" id="">
        <option value="0">Câu hỏi trong phần bài tập ?</option>
        <?php
            while($a!=null)
            {
        ?>
                <option value="<?php echo $a[0]?>"<?php if (isset($_GET["mabaiviet_baitap"])&&$_GET["mabaiviet_baitap"]==$a[0]) echo"selected";?>><?php echo $a[1]?></option>
        <?php
                $a=mysqli_fetch_array($excute,MYSQLI_NUM);
            }
        ?>
    </select> Số phương án
    <select name="sophuongan" id="" onchange="addphuongan()">
        <option value="0" <?php if (isset($_GET["sophuongan"])&&$_GET["sophuongan"]==0) echo"selected";?>>Có bao nhiêu phương án</option>
        <option value="1" <?php if (isset($_GET["sophuongan"])&&$_GET["sophuongan"]==1) echo"selected";?>>1 Phương án</option>
        <option value="2" <?php if (isset($_GET["sophuongan"])&&$_GET["sophuongan"]==2) echo"selected";?>>2 Phương án</option>
        <option value="3" <?php if (isset($_GET["sophuongan"])&&$_GET["sophuongan"]==3) echo"selected";?>>3 Phương án</option>
        <option value="4" <?php if (isset($_GET["sophuongan"])&&$_GET["sophuongan"]==4) echo"selected";?>>4 Phương án</option>
        <option value="5" <?php if (isset($_GET["sophuongan"])&&$_GET["sophuongan"]==5) echo"selected";?>>5 Phương án</option>
    </select>
    <input type="text" style="visibility:hidden;" value="9" name="page" id="chuyentrang">
    <?php 
        if (isset($_GET["sophuongan"])) 
        {                
    ?>
            <table border="1" cellspacing="0">
            <tr>
                <td>Mã phương án</td>
                <td>Nội dung</td>
                <td>Là phương án </td>
            </tr>
    <?php
            $sophuongan=$_GET["sophuongan"];
            for ($i=0; $i <$sophuongan ; $i++) 
            { 
        ?>
                <tr>
                    <td><?php echo $i+1?></td>
                    <td><input type="text" name="noidungphuongan[]" ></td>
                    <td>
                        <select name="dapan[]" id="" onchange="truefalse()" class="truefalse">
                            <option value="-1">Chọn phương án</option>
                            <option value="0">Đúng</option>
                            <option value="1">Sai</option>
                        </select>
                    </td>
                </tr>
        <?php
            }
    ?>
            <tr>
                <th colspan="3"><input type="submit" value="Xác nhận" onclick="return xacnhanthemcau()"></th>
            </tr>
            </table>
    <?php
        }
    ?>
</form>
<script>
    function addphuongan() 
    {
        var a;
        a=document.querySelector("form");
        a.submit();
        
    }
    function xacnhanthemcau()
    {
        var chuyentrang;
        chuyentrang=document.getElementById("chuyentrang");
        chuyentrang.value="10"
        return confirm("Bạn chắc chắn muốn thêm câu này");
        
    }
    function truefalse() 
    {
        var select;
        select=document.getElementsByClassName("truefalse"); 
        for(var i=0;i<(select.length);i++)
        {
            if(select[i].value==0)
            {
                for(var x=0;x<(select.length);x++)
                {
                    if(x==i)
                        continue;
                    select[x].value=1;
                }
                break;
            }
        }
        
        
    }
</script>   
</body>