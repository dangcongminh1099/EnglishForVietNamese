<body>
    <?php
        $connect=connect("project");
        utf8($connect); 
        if(isset($_GET["matheloai"])&&isset($_GET["option"])&&$_GET["option"]==2)
        {
            $matheloai=$_GET["matheloai"];
            $query="select * from baiviet_baitap where matheloai=$matheloai";
            $excute=mysqli_query($connect,$query);
            $a=mysqli_fetch_array($excute);
    ?>
            <br>
            <br>
            <br>
            <table id="listbt" cellspacing="10" cellpadding="3">
                <?php
                    while($a!=null)
                    {
                ?>
                    <tr>
                        <th><i class="fa fa-long-arrow-right"></i></th>
                        <td><?php echo $a[1] ?></td>
                    </tr>
                <?php
                    $a=mysqli_fetch_array($excute);
                    }
                ?>
            </table>
    <?php
        }
        else if (isset($_GET["option"])&&$_GET["option"]==2) {
    ?>
        <div id="all">
            <div id="list">
                <?php  
                    $query="select * from tbltheloai where madanhmuc=2";
                    $excute=mysqli_query($connect,$query);
                    $a=mysqli_fetch_array($excute);
                    while ($a!=null) {
                    ?>
                        <a href="?option=2&matheloai=<?php echo $a[0] ?>" class="lista"><?php echo $a[1]; ?></a>
                    <?php
                    $a=mysqli_fetch_array($excute);
                    }
                ?>
            </div>
            <div id="logo">
                <h1 id="logoname">English for VietNamese</h1>
                <h2 id="mota">Trong phần này liệt kê hầu hết ngữ pháp thành danh sách và có bài tập trong mỗi mục giúp người làm cải thiện ngữ pháp</h2>
            </div>
        </div>
    <?php
        }
    ?>
  
</body>
