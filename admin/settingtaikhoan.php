<?php
    $connect=connect("project");
    if(isset($_SESSION["tkadmin"][3])&&$_SESSION["tkadmin"][3]==1)
    {
        $query="select*from tblnguoidung order by capdo";

    }
    else if(isset($_SESSION["tkadmin"][3])&&$_SESSION["tkadmin"][3]==2)
    {
        $query="select*from tblnguoidung where capdo!=1 order by capdo";
    }
    $excute=mysqli_query($connect,$query);
    $a=mysqli_fetch_array($excute);
?>
<body>
    <h2 id="tieudetable">Tài khoản</h2>
    <button id="btn_add">Thêm tài khoản</button>
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
    <div id="suatk">
        <div id="ndsuatk">
            <form action="chinhsuatk.php" >
                <table cellpadding="5"></table>
            </form>
        </div>
    </div>
    <div id="addtk">
        <div id="ndaddtk">
            <form action="chinhsuatk.php" >
                <table cellpadding="5">
                    <tr>
                        <th colspan="3">Thêm tài khoản</th>
                    </tr>
                    <tr>
                        <td>Tài khoản</td>
                        <td><input type="text" name="tk" id="tkthem"></td>
                        <td><span id="err_tk"></span></td>
                    </tr>
                    <tr>
                        <td>Mật khẩu</td>
                        <td><input type="text" name="mk" id="mkthem"></td>
                        <td><span id="err_mk"></span></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" id="emailthem"></td>
                        <td><span id="err_email"></span></td>
                    </tr>
                    <tr>
                        <td>Cấp độ</td>
                        <td><select name="capdo" id="capdothem">
                            <option value="0">Chọn cấp độ</option>
                        <?php if($_SESSION["tkadmin"][3]==1)
                        {
                        ?>
                            <option value="1">Admin </option>
                        <?php
                        }
                        ?>   
                            <option value="2">Biên tập viên</option>
                            <option value="3">Người dùng</option>
                        </select></td>
                        <td><span id="err_capdo"></span></td>
                    </tr>
                    <tr>
                        <th colspan="3"><button name="action" value="them" onclick="return validate_sua(0)">Thêm tài khoản</button></th>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
<script src="../index.js?v<?php echo time()?>"></script>
<script>
    $(document).ready(function () {
        $("th > button").click(function () {
            console.log($(this));
        })
        $(".suatk").click(function () {
            $.get("ajaxtaikhoan.php",{tentk:$(this).data("tk"),action:"sua"},function (data) {
                $("#suatk").css("display","block");
                $("#ndsuatk > form > table").html(data);
            });
        })
        $(document).on("click",".xoatk",function(){
            if(confirm("Bạn có chắc chắn muốn xóa"))
            {
                $.get("ajaxtaikhoan.php",{action:"xoa",tentk:$(this).data("tk")},function (data)
                {
                    $("#alltk").html(data);
                })

            }

           
        })
        $("#btn_add").click(function()
        {
            $("#addtk").css("display","block");
        })
        $(document).on("change","#tkthem",function()
        {
            $.get("ajaxtaikhoan.php",{tentk:$("#tkthem").val(),action:"scanner"},function(data)
            {
                $("#err_tk").html(data);
            })
        })
        $(window).click(function()    
        {
            if(event.target==$("#suatk")[0])
            {
                $("#suatk").css("display","none");
            }
            else if(event.target==$("#addtk")[0])
            {
                $("#addtk").css("display","none");
            }
        })
    })
    function validate_sua(x)
    {
        if(x==1)
        {
            var tk,mk,email,capdo;
            var count=[0];
            tk=document.getElementById("tksua").value;
            mk=document.getElementById("mksua").value;
            email=document.getElementById("emailsua").value;
            capdo=document.getElementById("capdosua").value;
            validate_user(tk,"err_tk",count);
            validate_password(mk,"err_mk",count);
            validate_email(email,"err_email",count);
            validate_capdo(capdo,"err_capdo",count);
            
        }
        else
        {
            var tk,mk,email,capdo;
            var count=[0];
            tk=document.getElementById("tkthem").value;
            mk=document.getElementById("mkthem").value;
            email=document.getElementById("emailthem").value;
            capdo=document.getElementById("capdothem").value;
            validate_user(tk,"err_tk",count);
            $.ajax({
                type: "get",
                url: "ajaxtaikhoan.php",
                data: {tentk:tk,action:"scanner"},
                async:false,
                success: function (data) {
                    if(data=="")
                    {
                        count[0]++;
                    }
                    else
                    {
                        $("#err_tk").html(data);
                    }
                }
            });
            validate_password(mk,"err_mk",count);
            validate_email(email,"err_email",count);
            validate_capdo(capdo,"err_capdo",count);
            console.log(count[0]);
        }
        if(x==1)
        {
            if(count[0]==4)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            if(count[0]==5)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        
        
    }

</script>