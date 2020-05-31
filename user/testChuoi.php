<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
        $connect=new mysqli("localhost","root","","project");
        $query="select * from cauhoi";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);




    ?>
    <span><?php echo $a[1]?></span>
</body>
</html>