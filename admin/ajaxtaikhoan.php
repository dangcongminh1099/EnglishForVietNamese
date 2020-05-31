<?php 
    session_start();
    $connect=new mysqli("localhost","root","","project");
    if(isset($_GET["tentk"])&&isset($_GET["action"])&&$_GET["action"]=="sua")
    {
        $query="select * from tblnguoidung where tentk='".$_GET["tentk"]."'";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
        if($a==null)
        {
            
        }
        else 
        {
        ?>
            <table >
                <tr >
                    <th colspan="3">Sửa tài khoản <input type="hidden" value="<?php echo $a[0]; ?>" name="tk2"></th>
                </tr>
                <tr>
                    <td>Tên tài khoản</td>
                    <td><input type="text" value="<?php echo $a[0]; ?>" name="tk" id="tksua"></td>
                    <td id="err_tk"></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td ><input type="text" value="<?php echo $a[1]; ?>" name="mk" id="mksua"></td>
                    <td id="err_mk"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" value="<?php echo $a[2]; ?>" name="email" id="emailsua"></td>
                    <td id="err_email"></td>
                </tr>
                <tr>
                    <td>Cấp độ</td>
                    <td><select name="capdo" id="capdosua">
                        <option value="0">Chọn cấp độ</option>
                        <?php
                            if($_SESSION["tkadmin"][3]==1)
                            {
                        ?>
                                <option value="1" <?php if($a[3]==1) echo"selected"; ?>>Admin</option>
                        <?php
                            }
                        ?>
                        <option value="2" <?php if($a[3]==2) echo"selected"; ?>>Biên tập viên</option>
                        <option value="3" <?php if($a[3]==3) echo"selected"; ?>>Người dùng</option>
                    </select></td>
                    <td><span id="err_capdo"></span></td>
                </tr>
                <tr>
                    <th colspan="3"><button name="action" value="sua" onclick="return validate_sua(1)">Chỉnh sửa</button></th>
                </tr>
            </table>
        <?php
        }

    }
    else if(isset($_GET["tentk"])&&isset($_GET["action"])&&$_GET["action"]=="xoa")
    {
        $tk=$_GET["tentk"];
        if($_SESSION["tkadmin"][3]==2)
        {
            $query="select capdo from tblnguoidung where tentk='$tk'";
            $excute=mysqli_query($connect,$query);
            $a=mysqli_fetch_array($excute)[0];
            if($a==1)
            {
                header("Location:menusetting.php?page=5&succe");
            }
        }
        $query="delete from tblnguoidung where tentk='$tk'";
        mysqli_query($connect,$query);
        if($_SESSION["tkadmin"][3]==2)
        {
            $query="select*from tblnguoidung where capdo!=1 order by capdo";
        }
        else 
        {
            $query="select*from tblnguoidung order by capdo";
        }
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
    ?>
        <table border="1" cellspacing="0" id="alltk">
            <tr>
                <td>Tên tài khoản</td>
                <td>Mật khẩu</td>
                <td>Email</td>
                <td>Cấp độ</td>
                <td>Sửa</td>
                <td>Xóa</td>
            </tr>
            
                <?php 
                    while ($a!=null) 
                    {
                        
                ?>
                    <tr>
                        <td><?php echo $a[0] ?></td>
                        <td><?php echo $a[1]?></td>
                        <td><?php echo $a[2]?></td>
                        <td><?php  if($a[3]==1) echo "Admin"; else if($a[3]==2) echo "Biên tập viên"; else echo "Người dùng";?> </td>
                        <th><button class="xoatk" data-tk="<?php echo $a[0]  ?>">Xóa</button></th>
                        <th><button class="suatk" data-tk="<?php echo $a[0]  ?>">Sửa</button></th>
                    </tr>
                <?php
                    $a=mysqli_fetch_array($excute);
                    }
                ?>
        </table>
    <?php

    }
    else if(isset($_GET["tentk"])&&isset($_GET["action"])&&$_GET["action"]=="scanner")
    {
        $query="select tentk from tblnguoidung where tentk='".$_GET["tentk"]."'";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute)[0];
        if($a!=null)
        {
            echo "<i class='fa fa-warning'> Trùng tên</i>";
        }
        else
        {
            echo "";
        }
    }
?>