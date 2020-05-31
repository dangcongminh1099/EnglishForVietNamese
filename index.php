
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/style.css?v=<?php echo time(); ?>">
    <?php
        session_start();
        if(isset($_GET["option"]))
        {
            $scan=$_GET["option"];
            switch ($scan) 
            {
                case 2:
                ?>

                    <link rel="stylesheet" href="user/css/nguphap.css?v=<?php echo time(); ?>">
                <?php
                    break;
                case 3:
                    if(isset($_GET["mabaitap"]))
                    {
                ?>
                        <link rel="stylesheet" href="user/css/tuvung.css?v=<?php echo time(); ?>">
                <?php
                    }
                    else 
                    {      
                ?>
                    <link rel="stylesheet" href="user/css/menutuvung.css?v=<?php echo time(); ?>">
                <?php
                    }
                    break;
                case 4:
                    if (isset($_GET["baitap"])) 
                    {
                ?>
                        <link rel="stylesheet" href="user/css/cauhoithi.css?v=<?php echo time(); ?>">
                <?php
                    }
                    else {
                ?>
                        <link rel="stylesheet" href="user/css/baitap.css?v=<?php echo time(); ?>">
                <?php
                    }
                ?>

                    
                <?php
                    break;
                case 5:
                    if (isset($_GET["matheloai"])||isset($_GET["search"])) 
                        {
                    ?>
                            <link rel="stylesheet" href="user/css/baiviettheloai.css?v=<?php echo time(); ?>">
                           
                    <?php
                        }
                        else {
                    ?>
                             <link rel="stylesheet" href="user/css/baiviet.css?v=<?php echo time(); ?>">
                    <?php
                        }
                    break;
                default:
                ?>
                    <link rel="stylesheet" href="CSS/home.css?v=<?php echo time(); ?>">
                <?php
                    break;
            }
        }
        else 
        {
    ?>
    <link rel="stylesheet" href="CSS/home.css?v=<?php echo time(); ?>">
    <?php
        }
    ?>
    <link href="https://fonts.googleapis.com/css?family=Patrick+Hand" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <div id="banner">
        <div class="logo">
            <img src="logo1.png" alt="">
        </div>
        <div class="menu">
        <?php
            include("connect/connect.php");
            $connect=connect("project");
            utf8($connect);
            $query="select*from tbldanhmuc ";
            $excute=mysqli_query($connect,$query);
            $a=mysqli_fetch_array($excute,MYSQLI_ASSOC);
        ?>
        <ul>
            <?php
                while($a!=null)
                {
                ?>
                    <li><a href="?option=<?php echo $a["madanhmuc"]; ?>"><?php echo $a["tendanhmuc"]; ?></a></li>
                <?php
                    $a=mysqli_fetch_array($excute,MYSQLI_ASSOC);
                }
                
            ?>
        </ul>
            
        </div>
        <div class="sign">
            <?php
                
                if(isset($_SESSION["tk"]))
                {
            ?>
                <ul id="user">
                    
                    <li><i class="fa fa-address-card-o" style="font-size:25px;margin-left:5px"></i> TênTK: <?php echo $_SESSION["tk"]["tentk"]; ?>
                    <li><a href="" onclick="confirm_logout()"><i class="fa fa-share-square-o"></i> Logout</a></li>
                </ul>
            <?php
                }
                else if (isset($_SESSION["tkadmin"])) 
                {
            ?>
                    
                    <a href="admin" style="font-size:21px;color:white;text-decoration:none;line-height:70px;font-family: 'Patrick Hand', cursive;">Đến trang admin <i class="fa fa-hand-o-right"></i></a>
            <?php
                }
                else
                {

                
            ?>
            <ul id="buttonlogin">
                <li><span onclick="hienthi_login(0)">Đăng nhập</span></li>
                <li><span onclick="hienthi_login(1)">Đăng kí</span></li>
            </ul>
            <?php
                }
            ?>
        </div>
    </div>
    <div id="login">
        <form method="POST" action="user/dangnhap.php" >
            <table>
                <tr><th colspan="3">Login</th></tr>
                <tr>
                    <td><i class="fa fa-user-o" style="font-size:20px"></i> Usser</td>
                    <td><input type="text" id="tk_login" name="tk"></td>
                    <td><span id="err_user_login"></span></td>
                </tr>
                <tr>
                    <td><i class="fa fa-lock" style="font-size:20px"></i> Password</td>
                    <td><input type="password" id="mk_login" name="mk"></td>
                    <td><span id="err_password_login"></span></td>
                </tr>
                <tr><th colspan="3"><button  onclick="validate1()" type="button">Đăng nhập</button></th></tr>
            </table>
        </form>
    </div>
    <div id="changepassword">
        <form method="POST" action="user/dangnhap.php" >
            <table>
                <tr><th colspan="3">Change Password</th></tr>
                <tr>
                    <td><i class="fa fa-user-o" style="font-size:20px"></i> Usser</td>
                    <td><input type="text" id="tk_change" name="tk_change"></td>
                    <td><span id="err_user_change"></span></td>
                </tr>
                <tr>
                    <td><i class="fa fa-lock" style="font-size:20px"></i> Password</td>
                    <td><input type="password" id="mk_change" name="mk_change"></td>
                    <td><span id="err_password_change"></span></td>
                </tr>
                <tr>
                    <td><i class="fa fa-lock" style="font-size:20px"></i>  New Password </td>
                    <td><input type="password" id="mk2_change" name="mk2_change"></td>
                    <td><span id="err2_password_change"></span></td>
                </tr>
                
                <tr><th colspan="3"><button  onclick="validate3()" type="button">Thay đổi</button></th></tr>
            </table>
        </form>
    </div>
    <div id="changeemail">
        <form method="POST" action="user/dangnhap.php">
            <table>
                <tr><th colspan="3">Change Email</th></tr>
                <tr>
                    <td><i class="fa fa-user-o" style="font-size:20px"></i> Usser</td>
                    <td><input type="text" id="tk_change_email" name="tk_change"></td>
                    <td><span id="err_user_change_email"></span></td>
                </tr>
                <tr>
                    <td><i class="fa fa-lock" style="font-size:20px"></i> Password</td>
                    <td><input type="password" id="mk_change_email" name="mk_change"></td>
                    <td><span id="err_password_change_email"></span></td>
                </tr>
                <tr>
                    <td><i class="fa fa-envelope-open" style="font-size:20px"></i>  New Email </td>
                    <td><input type="text" id="email_change" name="email_change"></td>
                    <td><span id="err_email_change"></span></td>
                </tr>
                
                <tr><th colspan="3"><button  onclick="validate4()" type="button">Thay đổi</button></th></tr>
            </table>
        </form>
    </div>
    <div id="register">
        <form method="POST" action="user/dangnhap.php">
            <table>
                <tr><th colspan="3">Đăng kí</th></tr>
                <tr>
                    <td><i class="fa fa-user-o" style="font-size:20px"></i> Usser</td>
                    <td><input type="text" id="tk_register" name="tk_register"></td>
                    <td><span id="err_user_register"></span></td>
                </tr>
                <tr>
                    <td><i class="fa fa-lock" style="font-size:20px"></i> Password</td>
                    <td><input type="password" id="mk_register" name="mk_register"></td>
                    <td><span id="err_password_register"></span></td>
                </tr>
                <tr>
                    <td><i class="fa fa-lock" style="font-size:20px"></i> Nhập lại Password</td>
                    <td><input type="password" id="mk2_register" name="mk2_register"></td>
                    <td><span id="err_password2_register"></span></td>
                </tr>
                <tr>
                    <td><i class="fa fa-envelope-open"></i> Email</td>
                    <td>
                        <input type="text" id="email" name="email">
                    </td>
                    <td><span id="err_email"></span></td>
                </tr>
                
                
                <tr><th colspan="3"><button type="button" onclick="validate2()">Đăng ký</button></th></tr>
            </table>
        </form>
    </div>
    <div id="menuright">
        
            <?php
                if(isset($_SESSION["tk"]))
                {
                ?>
                    <div>
                        <h2 class="menuright_tk"><i class="fa fa-user-o" style="font-size:30px"></i> <?php echo $_SESSION["tk"]["tentk"] ?></h2>
                        
                    </div>
                    <br>
                    <table border="1" cellspacing="0">
                        <?php 
                            $lamdc=count(explode("||",$_SESSION["tk"]["quatrinh"]));
                            $query="select count(*) from baiviet_baitap";
                            $excute=mysqli_query($connect,$query);
                            $a=mysqli_fetch_array($excute)[0];
                            close($connect);
                        ?>
                        <tr>
                            <th>Tổng số câu đã làm</th>
                        </tr>
                        <tr>
                            <th><?php if($lamdc==1) echo "0 / ".$a; else echo $lamdc-2 ."/". $a?></th>
                        </tr>
                    </table>
                    <br>
                    <a style="text-decoration:none;color:white;margin:30px;margin-top:30px;font-family: 'Patrick Hand', cursive;cursor:pointer" onclick="hienthi_login(2)">Thay đổi mật khẩu</a>
                    <br>
                    <br>
                    <a style="text-decoration:none;color:white;margin:30px;margin-top:30px;font-family: 'Patrick Hand', cursive;cursor:pointer" onclick="hienthi_login(3)">Thay đổi email</a>
                <?php
                }
                else if( isset($_SESSION["tkadmin"]))
                {
                ?>
                    <div>
                        <h2 class="menuright_tk"><i class="fa fa-user-o" style="font-size:30px"></i> <?php echo $_SESSION["tkadmin"]["tentk"] ?></h2>
                    </div>
                    
                <?php 
                }
                else 
                {
            ?>
                    <h2 class="not_login">Bạn chưa đăng nhập</h2>
                    <button class="not_login" onclick="hienthi_login(0)">Đăng nhập</button>
                    <button class="not_login" onclick="hienthi_login(1)">Đăng ký</button>
            <?php
                }
            ?>
        
        <button id="buttonright" onclick="menudoc()" value="0">User <i class="fa fa-address-card-o" style="font-size:25px;margin-left:5px"></i></button>
    </div>
    
</head>
<?php
        if(isset($_GET["option"]))
        {
            $scan=$_GET["option"];
            switch ($scan) {
                case 2:
                    include("user/nguphap.php");
                    break;
                case 3:
                    if(isset($_GET["mabaitap"]))
                    {
                        include("user/tuvung.php");
                        
                    }
                    else 
                    {
                        include("user/menutuvung.php");
                    }
                    break;
                case 4:
                    if (isset($_GET["baitap"])) 
                    {
                        include("user/cauhoithi.php");
                    }
                    else {
                        include("user/baitap.php");
                    }
                    
                    break;

                case 5:
                    if(isset($_GET["matheloai"])||isset($_GET["search"]))
                    {
                        include("user/baiviettheloai.php");
                    }
                    else {
                        include("user/baiviet.php");
                    
                    }
                    break;
                default:
                    include("home.php");
                    break;
            }
        }
        else 
        {
            include("home.php");
        }
    if(!isset($_SESSION["tk"]) &&isset($_GET["option"])&&($_GET["option"]==4||$_GET["option"]==3))
    {
?>
        <div id="recommendlogin">
            <div id="contentrecommendlogin">
                <h2> <i class="fa fa-warning"></i> Bạn chưa đăng nhập</h2>
                <p>Hãy đăng nhập hoặc đăng ký để có thể giám sát quá trình học và có thể cập nhật các tính năng mới nhất của phần mềm</p>
                <div>
                    <button onclick="hienthi_login(0)">Đăng nhập</button>
                    <button onclick="hienthi_login(1)">Đăng ký</button>
                    <button id="continuework">Tiếp tục làm</button>
                </div>
            </div>
        </div>
<?php
    }
?>
<script src="index.js?v=<?php echo time();?>" type="text/javascript"></script>

<script>

    var a,b,c,d,chitietbv;
        a = document.getElementById("login");
        b = document.getElementById("register");
        c = document.getElementById("changepassword");
        d = document.getElementById("changeemail");
        e = document.getElementById("continuework");
        warninglogin=document.getElementById("recommendlogin");
        chitietbv=document.getElementById("chitietbv");
        window.onclick = function (event) 
        {
            if (event.target == b) {
                b.style.display = "none";
            }
            else if (event.target == a) {
                a.style.display = "none";
            }
            else if(event.target == c)
            {
                c.style.display = "none";
            }
            else if(event.target == d)
            {
                d.style.display = "none";
            }
            else if(event.target == chitietbv)
            {
                chitietbv.style.display = "none";
            } 
            if(event.target==e)
            {
                warninglogin.style.display="none";
            }
        }
    function validate2(x) 
    {
        var count = [0];
        var tk_register, mk_register, mk2_register, email, gioitinh;
        tk_register = document.getElementById("tk_register").value;
        mk_register = document.getElementById("mk_register").value;
        mk2_register = document.getElementById("mk2_register").value;
        email = document.getElementById("email").value;
        gioitinh = document.getElementsByName("gioitinh");
        validate_user(tk_register, "err_user_register", count);
        validate_password(mk_register, "err_password_register", count);
        validate_password(mk2_register, "err_password2_register", count);
        validate_password2(mk_register, mk2_register, "err_password2_register", count);
        validate_email(email, "err_email", count);

        if (count[0] == 5) {
            var form;
            form = document.querySelector("#register>form");
            form.submit();
        }
    }

    function validate1()
    {
        var count = [0];
        var mk, tk;
        tk = document.getElementById("tk_login").value;
        validate_user(tk, "err_user_login", count);
        mk = document.getElementById("mk_login").value;
        validate_password(mk, "err_password_login", count);

        if (count[0] == 2) {
            var form;
            form = document.querySelector("#login>form");
            form.submit();
        }


    }
    function validate3() 
    {
        var count = [0];
        var mk, tk,newmk;
        tk = document.getElementById("tk_change").value;
        validate_user(tk, "err_user_change", count);
        mk = document.getElementById("mk_change").value;
        validate_password(mk, "err_password_change", count);
        newmk = document.getElementById("mk2_change").value;
        validate_password(newmk, "err2_password_change", count);

        if (count[0] == 3) {
            var form;
            form = document.querySelector("#changepassword>form");
            form.submit();
        }   
    }
    function validate4() 
    {
        var count = [0];
        var mk, tk,emailnew;
        tk = document.getElementById("tk_change_email").value;
        validate_user(tk, "err_user_change_email", count);
        mk = document.getElementById("mk_change_email").value;
        validate_password(mk, "err_password_change_email", count);
        emailnew = document.getElementById("email_change").value;
        validate_email(emailnew, "err_email_change", count);

        if (count[0] == 3) {
            var form;
            form = document.querySelector("#changeemail>form");
            form.submit();
        }
    }
    function menudoc()
    {
        var a,b;
        a=document.getElementById("buttonright");
        b=document.getElementById("menuright");
        if(a.value==0)
        {
            b.style.right="0px";
            a.style.right="235px"
            a.value=1;
        }
        else
        {
            b.style.right="-263px";
            a.style.right="-29px"
            a.value=0;

        }
    }
    <?php
        if(isset($_GET["err"]))
        {
        ?>
            alert_login();
        <?php
            
        }
        else if(isset($_GET["err_register"]))
        {
        ?>
            alert_register();
        <?php
            
        }
        else if(isset($_GET["err_change"]))
        {
        ?>
            alert_change();
        <?php
            
        }
        else if(isset($_GET["err_change_email"]))
        {
        ?>
            alert_change_email();
        <?php
            
        }
    ?>
    <?php
        if(isset($_GET["success"]))
        {
        ?>
            alert_success(1);
        <?php
            
        }
        else if(isset($_GET["success_register"]))
        {
        ?>
            alert_success(0);
        <?php
            
        }
        else if(isset($_GET["success_change"]))
        {
    ?>
            alert_success(2);
    <?php
        }
        else if(isset($_GET["success_change_email"]))
        {
    ?>
            alert_success(2);
    <?php
        }
    ?>
</script>
</html>
