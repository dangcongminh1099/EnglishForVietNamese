<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    session_start();
    if (isset($_SESSION["tkadmin"])) {
        header("Location:menusetting.php");
    } 
    ?>
</head>

<body>
    <a href="../index.php" id="comeback"><i class="fa fa-hand-o-left"></i>Trang người dùng</a>
    <form action="dangnhap.php" method="post">
        <table cellpadding="0" cellspacing="10">
            <tr>
                <th colspan="3">Đăng nhập</th>
            </tr>
            <tr>
                <td>Tài khoản</td>
                <td><input type="text" name="tk" id="taikhoan"></td>
                <td><span id="err_user_login"></span></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="mk" id="matkhau"></td>
                <td><span id="err_password_login"></span></td>
            </tr>
            <tr>
                <th colspan="3"><button onclick="validate()" type="button">Đăng nhập</button></th>

            </tr>
        </table>
    </form>
</body>
<script src="../index.js"></script>
<script>
    function validate() {
        var count = [0];
        var mk, tk, capdo;
        tk = document.getElementById("taikhoan").value;
        validate_user(tk, "err_user_login", count);
        mk = document.getElementById("matkhau").value;
        validate_password(mk, "err_password_login", count);

        if (count[0] == 2) {
            var form;
            form = document.querySelector("form");
            form.submit();
        }
    }
    <?php
    if (isset($_GET["err"])) {
    ?>
        alert_login();
    <?php
    } else if (isset($_GET["success"])) {
    ?>
        alert_success(1);
    <?php
    }
    ?>
</script>

</html>