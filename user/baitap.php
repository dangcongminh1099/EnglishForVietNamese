
<body>
    <div id="all">
    <?php
        $connect=connect("project");
        utf8($connect);
        $query="select*from tbltheloai where madanhmuc=4";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
        $count=0;
        
        while($a!=null)
        {
    ?>
        <div class="thi"><h1 onclick="menubt(<?php echo $count?>)"><?php echo $a[1]?></h1></div>
    <?php
        $a=mysqli_fetch_array($excute);
        $count++;
        }
    ?>
        <div id="menubt">
        <?php
            $query="SELECT mabaiviet_baitap,tieude,matheloai from baiviet_baitap WHERE matheloai in(select matheloai from tbltheloai where madanhmuc=4) ORDER by matheloai, mabaiviet_baitap";
            $excute=mysqli_query($connect,$query);            
            $a=mysqli_fetch_array($excute,MYSQLI_NUM);
            $i=0;
            $x=0;
            $matheloai=$a[2];
            $arr=[];
            while ($a!=null) 
            {
                if($a[2]!=$matheloai)
                {
                    $i++;
                    $matheloai=$a[2];
                    $x=0;
                    continue;
                    
                }
                else 
                {
                    $arr[$i][$x]=$a;
                    $a=mysqli_fetch_array($excute,MYSQLI_NUM);
                    $x++;
                }
            }
            
        ?>
            
        <?php
            for ($i=0; $i <count($arr) ; $i++) 
            { 
        ?>
                <ul>
                <?php
                    for ($x=0; $x <count($arr[$i]); $x++) 
                    { 
                ?>
                        <li><a href="?option=4&baitap=<?php echo $arr[$i][$x][0]; ?>"><?php echo $arr[$i][$x][1]; if(isset($_SESSION["tk"])&&count(explode("||".$arr[$i][$x][0]."||",$_SESSION["tk"]["quatrinh"]))==2){?> <i class="fa fa-check"></i><?php }?></a> </li>
                <?php
                    }
                ?>
                </ul>
        <?php
            }
        ?>
        
        </div>
    </div>
   
</body>
<script>
    function menubt(x) 
    {
        var a,b;
        a=document.querySelectorAll("#menubt > ul");
        for(var i=0;i<a.length;i++)
        {
            if(i==x)
            {
                a[x].style.display="block";
            }
            else
            {
                a[i].style.display="none";
            }
        }
        
    }
</script>