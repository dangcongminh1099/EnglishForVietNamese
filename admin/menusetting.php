<!DOCTYPE html>
<html>
<?php
session_start();
if (!isset($_SESSION["tkadmin"])) {
    header("Location:http://localhost/project/admin/");
} 
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="menusetting.css?v<?php echo time() ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=7c7kj973kusgvb8aaxwj307phs0q4swq7b89z746dtjvdhr9"></script>
    <script>
        tinymce.init({
            selector: '.textarea',
            entity_encoding: "named",
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php

    if (isset($_GET["page"])) {
        $page = $_GET["page"];
        switch ($page) {
            case 3:
    ?>
                <link rel="stylesheet" type="text/css" media="screen" href="settingbaivietbaitap.css?v<?php echo time() ?>" />
            <?php
                break;
            case 4:
            ?>
                <link rel="stylesheet" type="text/css" media="screen" href="settingbaiviet.css?v<?php echo time() ?>" />
            <?php
                break;
            case 5:
            ?>
                <link rel="stylesheet" type="text/css" media="screen" href="settingtaikhoan.css?v<?php echo time() ?>" />
            <?php
                break;
            case 12:
            ?>
                <link rel="stylesheet" type="text/css" media="screen" href="chinhsuabaivietbaitap.css?v<?php echo time() ?>" />
            <?php
                break;
            default:
            ?>
                <link rel="stylesheet" type="text/css" media="screen" href="settingdanhmuc.css?v<?php echo time() ?>" />
    <?php
                break;
        }
    }
    ?>
</head>

<body>
    <div id="menuleft">
        <?php
        include("../connect/connect.php");
        $connect = connect("project");
        $query = "select count(*)  from baiviet_baitap where tinhtrang=1";
        $excute = mysqli_query($connect, $query);
        $outdate = mysqli_fetch_array($excute)[0];
        $query = "select count(*)  from noidungbaiviet where tinhtrang=1";
        $excute = mysqli_query($connect, $query);
        $outdate = $outdate + mysqli_fetch_array($excute)[0];
        close($connect);

        ?>
        <h3>Menu setting&ensp;</h3>
        <?php if ($_SESSION["tkadmin"][3] == 1) {
        ?>
            <a href="?page=7">Thông báo <i class="fa fa-bell" style="<?php if ($outdate > 0) echo 'color:red;' ?>"></i><sub style="<?php if ($outdate > 0) echo 'color:red;' ?>"><?php echo $outdate ?></sub>&ensp;</a>
            <a href="?page=1">Danh mục <i class="fa fa-th-list"></i>&ensp;</a>
            <a href="?page=2">Thể loại <i class="fa fa-list-ol"></i>&ensp;</a>
            <a href="?page=3">Bài tập& Câu hỏi <i class="fa fa-file-text"></i>&ensp;</a>
            <a href="?page=4">Bài viết <i class="fa fa-newspaper-o"></i>&ensp;</a>
            <a href="?page=5">Tài khoản <i class="fa fa-user"></i>&ensp;</a>
        <?php
        } else {
        ?>
            <a href="?page=3">Bài tập& Câu hỏi <i class="fa fa-file-text"></i>&ensp;</a>
            <a href="?page=4">Bài viết <i class="fa fa-newspaper-o"></i>&ensp;</a>
            <a href="?page=5">Tài khoản <i class="fa fa-user"></i>&ensp;</a>
        <?php
        }
        ?>



    </div>
    <button id="toolmenust" value="1">Menu <i class="fa fa-cog"></i></button>
    <div id="all">

        <div id="content">
            <div id="contentheader">
                <span id="welcome">Xin chào <?php echo $_SESSION["tkadmin"]["tentk"]; ?></span>
                <a href="dangnhap.php?logout" id="logout"><button>Đăng xuất <i class="fa fa-sign-out"></i></button></a>
                <a href="../" id="comebackhome"><button>Quay về trang người dùng <i class="fa fa-hand-o-left"></i></button></a>
            </div>
            <?php

            if (isset($_GET["page"])) {

                $page = $_GET["page"];
                if ($_SESSION["tkadmin"][3] == 1) {
                    switch ($page) {
                        case 1:
                            include("settingdanhmuc.php");
                            break;
                        case 2:
                            include("settingtheloai.php");
                            break;
                        case 3:
                            include("settingbaivietbaitap.php");
                            break;
                        case 4:
                            include("settingbaiviet.php");
                            break;
                        case 5:
                            include("settingtaikhoan.php");
                            break;
                        case 6:
                            include("user.php");
                            break;
                        case 7:
                            include("thongbao.php");
                            break;
                        case 8:
                            include("suacauhoi,phuongan.php");
                            break;
                        case 9:
                            include("themcauhoi,phuongan.php");
                            break;
                        case 10:
                            include("thuchienthemcau.php");
                            break;
                        case 11:
                            include("xoaphuongan.php");
                            break;
                        case 12:
                            include("chinhsuabaivietbaitap.php");
                            break;
                        default:
                            # code...
                            break;
                    }
                } else {
                    switch ($page) {
                        case 3:
                            include("settingbaivietbaitap.php");
                            break;
                        case 4:
                            include("settingbaiviet.php");
                            break;
                        case 5:
                            include("settingtaikhoan.php");
                            break;
                        case 12:
                            include("chinhsuabaivietbaitap.php");
                            break;
                    }
                }
            } else {
            }
            ?>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#toolmenust").click(function() {
            if ($(this).val() == 1) {
                $(this).css("left", "19.1%");
                $("#menuleft").css("left", "0%");
                $(this).val(0);

            } else {
                $(this).css("left", "-3%");
                $("#menuleft").css("left", "-22%");
                $(this).val(1);
            }
        })
    })
</script>

</html>