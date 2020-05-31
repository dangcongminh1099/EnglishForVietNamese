
<?php
    if(!isset($_GET["option"])&&!isset($_GET["mabaitap"]))
    {
        header("Location:menutuvung.php");
    }
    else 
    {
        
    
?>
    <div id="all" >
        <?php
            $connect=connect("project");
            utf8($connect);
            if(isset($_GET["macau"]))
            {
                $macau=$_GET["macau"]; 
                $query="select macau from tblcauhoi where macau>$macau ";
                $excute=mysqli_query($connect,$query);
                $a=mysqli_fetch_array($excute);
                if($a["socau"]<$macau)
                {
                    
            ?>
                    <h1>Bạn đã hoàn thành xong</h1>
            <?php
                }
                else 
                {      
                    $mabaitap=$_GET["mabaitap"];
                    $query="select macau from cauhoi where mabaiviet_baitap=$mabaitap ";
                    $excute=mysqli_query($connect,$query);
                    $a=mysqli_fetch_array($excute,MYSQLI_ASSOC);
                    echo $macau;
                    $macau=$a["macau"];
                    $query="select * from tblphuongan where macau=$macau";
                    $excute=mysqli_query($connect,$query);
                    $a=mysqli_fetch_array($excute);
                }    
        ?>
        <table>
            <tr>
            <?php
                while($a!=null)
                    {
                ?>
                        <td>
                            <audio src="<?php echo $a["audio"];?>"></audio>
                            <img src="<?php echo $a["img"];?>" alt="">
                            <input type="radio" value=<?php echo $a["dapan"] ?>><span><?php echo $a["phuongan"]; ?> </span>
                        </td>
                <?php
                        
                    }
            ?>
            </tr>
        </table>
        <!-- <h2><?php echo $arr[0]["cauhoi"];?></h2>
        <div id="select">
                <?php
                    for ($i=0; $i <count($arr) ; $i++) 
                    { 
                ?>
                        <div onclick="audios(<?php echo $i?>)">
                            <audio>
                                <source src="<?php echo $arr[$i]["amthanh"];?>">
                            </audio>
                            <img src="<?php echo $arr[$i]["anh"];?>" alt="" width="250px" height="200px">
                        <br>
                        <div class="radioselect">
                            <input type="radio" name="dapan" value="<?php echo $arr[$i]["dapan"];?>"><span><?php echo $arr[$i]["tieude"];?></span>
                        </div>
                </div>
                <?php
                    }
                ?>
                    <div class="button">
                        <button class="boqua" onclick="boqua()">Bỏ qua</button>
                        <button class="tiep" onclick="kiemtra()">Kiểm tra</button>
                    </div>
                <?php
                }
                ?>
                
               
            
                </div>
        </div> -->
            
            <?php
            }
            
                else 
                {                    
                ?>
                    <div id="start">
                        <button onclick="batdau()"><a href="" >Bắt đầu</a></button>
                    </div>
                <?php
                }
            ?> 
           
            
    </div>
    <div id="footer">
        <h2></h2>
        <img src="" alt="">
        <button onclick="next_ques()"><a href="">NEXT QUESTION</a></button>
    </div>
</body>
<script>
    var question=0;
    function kiemtra() 
    {
        var a=document.querySelectorAll("input[type=radio]");
        for(var i=0;i<a.length;i++)
        {
            if(a[i].value==0)
            {
                if(a[i].checked==true)
                {
                    var b, c,d;
                    c = document.querySelector("#footer > h2");
                    d = document.querySelector("#footer > img");
                    d.src="1-33-512.png";
                    c.innerHTML = "CORRECT";
                    b = document.getElementById("footer");
                    b.style.backgroundColor = "rgb(31, 238, 31)";
                    b.style.display = "block";
                    for (var i = 0; i < a.length; i++) {
                        a[i].setAttribute("disabled", "disabled");
                    }
                }
                else 
                {
                    var b, c, d,e;
                    c = document.querySelector("#footer > h2");
                    c.innerHTML = "FALSE"; 
                    d = a[i].parentElement.parentElement;
                    d.style.border = "5px double green";
                    e = document.querySelector("#footer > img");
                    e.src="5.png";
                    b = document.getElementById("footer");
                    b.style.backgroundColor = "rgb(250, 39, 39)";
                    b.style.display = "block";
                    for (var i = 0; i < a.length; i++) {
                        a[i].setAttribute("disabled", "disabled");
                    }
                    
                }
            }
        }
        
        
    }
    
    function audios(x) {
        var am;
        am=document.querySelectorAll("audio");     
        for (var i=0; i < 3;i++) 
        {
            if(i==x)
            {
                am[i].play();
                
            }
            else
            {
                am[i].pause();
                am[i].currentTime=0;
            }
            
        }
    }
    var baitap,quiz=1;
    function next_ques()
    {
        var next;    
        <?php
        if(isset($_GET["nextques"]))
        {
            $nextques=$_GET["nextques"]+1;
        ?>
            quiz=<?php echo $nextques; ?>;
        <?php
        }
        ?>
        next=document.querySelector("#footer > button > a");
        next.href="?option=3&mabaitap=1nextques="<?php echo $macau ?>;
        
    }
    
    function batdau()
    {    
        baitap=document.querySelector("#start > button > a");
        baitap.href="?option=3&mabaitap=1nextques=<?php echo $macau ?>";
    }
<?php
    }
?>
</script>   
</html>