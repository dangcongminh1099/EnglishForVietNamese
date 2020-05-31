<?php 
    if(isset($_GET["baitap"]))
    {
        $mabaitap=$_GET["baitap"];
        $connect=connect("project");
        utf8($connect);
        $query="select count(*) from cauhoi where mabaiviet_baitap=$mabaitap";
        $excute=mysqli_query($connect,$query);
        $socau=mysqli_fetch_array($excute)[0];
        if($socau==0)
        {
        ?>
            <div id="baitapnull">  
                <h2> <i class="fa fa-warning"></i> Chưa có câu hỏi trong bài tập này</h2>
                <a href="?option=4"><button> <i class="fa fa-undo"></i> Quay lại trang bài tập</button></a>
            </div>
        <?php
        }
        else 
        {
            $tongsotrang=round($socau/10);
            $trang=0;
            if($tongsotrang>1)
            {
            
                $batdau=0;
                $ketthuc=10;
                if(isset($_GET["trang"]))
                {
                    $trang=$_GET["trang"];
                    $batdau=$trang*10;
                    $ketthuc=$batdau+10;
                }
                $query="select macau,noidung,tieude,img,audio from cauhoi inner join baiviet_baitap on baiviet_baitap.mabaiviet_baitap=cauhoi.mabaiviet_baitap where baiviet_baitap.mabaiviet_baitap=$mabaitap limit $batdau,$ketthuc";
            }
            else 
            {
                $query="select macau,noidung,tieude,img,audio from cauhoi inner join baiviet_baitap on baiviet_baitap.mabaiviet_baitap=cauhoi.mabaiviet_baitap where baiviet_baitap.mabaiviet_baitap=$mabaitap";
            }
            
            $excute=mysqli_query($connect,$query);
            $a=mysqli_fetch_array($excute,MYSQLI_NUM);
            $type=rand(1,3);
    ?>
    <body onload="setTimeStart(0)">
        
            <div id="baitest">
                <div id="tieude">
                    <h2 id="tieudebaitap"><?php echo $a[2]; if($type==1) echo". Hãy chọn đáp án đúng"; else echo ". Ghép nối câu chính xác"?></h2>
                </div>
                <br>
                <div id="noidungch">
                <?php
                if($type==1)
                {
                $count=1;
                    while ($a != null)             
                    { 
                ?>
                    <table class="cauhoidapan">
                        <tr>
                            <td colspan="10">
                                <h3 class="cauhoi"><i class="fa fa-volume-off" name="volumndown"></i> <i class="fa fa-volume-up" name="volumnup" onclick="playaudio(<?php echo ($count-1)?>)"style="display:none;cursor: pointer"></i>           
                                    <?php echo $count.". ".$a[1]?>; 
                                </h3>
                                <audio src="<?php echo $a[4]?>"></audio>
                            </td>
                        </tr>
                    <tr class="hangphuongan">
                    <?php
                        $query="select noidung,img,audio,dapan,maphuongan from tblphuongan where macau=".$a[0];
                        $excute2=mysqli_query($connect,$query);
                        $b=mysqli_fetch_array($excute2,MYSQLI_NUM);
                        while($b!=null)
                        {
                    ?>
                            <td>
                                <label for="cau<?php echo$b[4]?>" ><span class="phuongan<?php echo $count; ?>"><input type="radio" name="cau<?php echo $count?>" value="<?php echo $b[3]?>" id="cau<?php echo$b[4]?>"><?php echo $b[0] ?></span></label>
                            </td>
                    <?php  
                            $b=mysqli_fetch_array($excute2,MYSQLI_NUM);
                        }
                            
                    ?>
                            <td>
                                <span class="repport_false"> <i class="fa fa-exclamation-circle"></i>False</span>
                                <span  class="repport_true"> <i class="fa fa-check-circle"></i>True</span>
                            </td>
                        </tr>
                    </table>
                
                <?php
                        $count++;
                        $a=mysqli_fetch_array($excute,MYSQLI_NUM);
                    }
                ?>
                </div>
                <?php
                }
                else if($type==2)
                {
                    $count2=0;
                    $arrpa=[];
                    $n=0;
                    while($a!=null)
                    {
                ?>
                    <table class="cauhoidapan">
                        <tr>
                            <td colspan="10">
                                <h3 class="cauhoi"><i class="fa fa-volume-off" name="volumndown"></i> <i class="fa fa-volume-up" name="volumnup" onclick="playaudio(<?php echo ($count2)?>)"style="display:none;cursor: pointer"></i>           
                                    <?php 
                                    $ktdau=0;
                                    $countmax=0;
                                    $count=0;
                                    $vitrimax=0;
                                    for ($j=0; $j <strlen($a[1]) ; $j++) 
                                    { 

                                        if($a[1][$j]=="_"&&$count==0)
                                        {
                                            $ktdau=$j;
                                            $count++;
                                        }
                                        else if($a[1][$j]=="_")
                                        {
                                            $count++;

                                        }

                                        else 
                                        {
                                            $count=0;
                                        }
                                        if($count>$countmax)
                                        {
                                            $countmax=$count;
                                            $vitrimax=$ktdau;
                                        }

                                    }
                                    $catchuoi="";
                                    $thaythe="<span class='khoidien' name='".$a[0]."' style='background-color:white;border-radius:12px;word-spacing:100px' ondrop='drop(event)' ondragover='allowDrop(event)'>&#160</span> ";
                                    for($i=0;$i<$countmax;$i++)
                                    {
                                        $catchuoi=$catchuoi."_";
                                    }
                                
                                    echo ($n+1).". ". str_replace($catchuoi," ".$thaythe." ",$a[1]);
                                    $n++;
                                    ?>; 
                                </h3>
                                <audio src="<?php echo $a[4]?>"></audio>
                            </td>
                            <td class="hangphuongan">
                            <?php
                                $query="select noidung,img,audio,dapan,maphuongan,macau from tblphuongan where macau=".$a[0]." and dapan=0";
                                $excute2=mysqli_query($connect,$query);
                                $b=mysqli_fetch_array($excute2,MYSQLI_NUM);
                                $arrpa[$count2]=$b;       
                            ?>
                                <span class="repport_false"> <i class="fa fa-exclamation-circle"></i>False</span>
                                <span  class="repport_true"> <i class="fa fa-check-circle"></i>True</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" >
                                <h3 class="chuoidapan"><?php echo str_replace($catchuoi, " <span style='font-weight:bold;'>".$arrpa[$count2][0]."</span> ",$a[1]); ?></h3>
                            </td>
                        </tr>
                    </table>
                                
                <?php
                        $count2++;
                        $a=mysqli_fetch_array($excute,MYSQLI_NUM);
                    }
                ?>
                    </div>
                    
                    <div id="bangdapan" ondrop="drop(event)" ondragover="allowDrop(event)">
                        <h2 data-type="1">Các phương án <i class="fa fa-caret-square-o-down"></i></h2>
                        <table>
                            <tr>
                        <?php
                        $test=[];
                            for ($i=0,$jk=0; $i <count($arrpa) ; $i++) 
                            { 
                                do 
                                {
                                
                                    $index=rand(0,count($arrpa)-1);
                                    $kt=0;
                                    for ($k=0; $k <count($test) ; $k++) { 
                                        if($index==$test[$k])
                                        {
                                            $kt=1;
                                            break;
                                        }
                                    }
                                } 
                                while ($kt == 1);
                                $test[$jk]=$index;
                                $jk++;
                                
                        ?>
                                <td>
                                    <span class="<?php echo $arrpa[$index][5]?>"  id="khoipa<?php echo $i?>" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" ><?php echo $arrpa[$index][0] ?></span>
                                </td>
                        <?php
                                if($i%4==0 &&$i!=count($arrpa)-1&&$i!=0)
                                {
                            ?>
                                    </tr>
                                    <tr>
                            <?php
                                }
                            }
                        ?>
                            </tr>
                        </table>
                        
                    </div>
                    
                <?php
                }
                else 
                {
                    $count2=0;
                    $arrpa=[];
                    $n=0;
                    while($a!=null)
                    {
                ?>
                    <table class="cauhoidapan">
                        <tr>
                            <td colspan="10">
                                <h3 class="cauhoi"><i class="fa fa-volume-off" name="volumndown"></i> <i class="fa fa-volume-up" name="volumnup" onclick="playaudio(<?php echo ($count2)?>)"style="display:none;cursor: pointer"></i>           
                                    <?php 
                                    $ktdau=0;
                                    $countmax=0;
                                    $count=0;
                                    $vitrimax=0;
                                    for ($j=0; $j <strlen($a[1]) ; $j++) 
                                    { 

                                        if($a[1][$j]=="_"&&$count==0)
                                        {
                                            $ktdau=$j;
                                            $count++;
                                        }
                                        else if($a[1][$j]=="_")
                                        {
                                            $count++;

                                        }

                                        else 
                                        {
                                            $count=0;
                                        }
                                        if($count>$countmax)
                                        {
                                            $countmax=$count;
                                            $vitrimax=$ktdau;
                                        }

                                    }
                                    $catchuoi="";
                                    $query="select noidung,img,audio,dapan,maphuongan,macau from tblphuongan where macau=".$a[0];
                                    $excute2=mysqli_query($connect,$query);
                                    $b=mysqli_fetch_array($excute2,MYSQLI_NUM);
                                    $thaythe="<select class='selectpa'><option value='-1'>Chọn phương án</option>";
                                    while($b!=null)
                                    {
                                        $dapan=$b[3];
                                        $ndphuongan=$b[0];
                                        $thaythe=$thaythe."<option value='$dapan'>$ndphuongan</option>";
                                        $b=mysqli_fetch_array($excute2,MYSQLI_NUM);
                                    }   
                                    $thaythe=$thaythe."</select>";
                                    for($i=0;$i<$countmax;$i++)
                                    {
                                        $catchuoi=$catchuoi."_";
                                    }
                                
                                    echo ($n+1).". ". str_replace($catchuoi," ".$thaythe." ",$a[1]);
                                    $n++;
                                    ?>; 
                                </h3>
                                <audio src="<?php echo $a[4]?>"></audio>
                            </td>
                            <td class="hangphuongan">
                                <span class="repport_false"> <i class="fa fa-exclamation-circle"></i>False</span>
                                <span  class="repport_true"> <i class="fa fa-check-circle"></i>True</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" >
                                <?php
                                    $query="select noidung from tblphuongan where dapan=0 and macau=".$a[0];
                                    $excute2=mysqli_query($connect,$query);
                                    $b=mysqli_fetch_array($excute2);

                                ?>
                                <h3 class="chuoidapan"><?php echo str_replace($catchuoi, " <span style='font-weight:bold;'>".$b[0]."</span> ",$a[1]); ?></h3>
                            </td>
                        </tr>
                    </table>
                                
                <?php
                        $count2++;
                        $a=mysqli_fetch_array($excute,MYSQLI_NUM);
                    }
                ?>
                    </div>
                <?php    
                }
                if(isset($_GET["baitap"])&&isset($_GET["option"])&&$_GET["option"]==4)
                {
                    $mabaiviet_baitap=$_GET["baitap"];
                ?>
                <div id="menuleft">
                    <h2 id="headermenu">Menu</h2>
                <?php
                    $query="select matheloai,tentheloai from tbltheloai where  matheloai=(select matheloai from baiviet_baitap where mabaiviet_baitap=$mabaiviet_baitap)";
                    $excute=mysqli_query($connect,$query);
                    $a=mysqli_fetch_array($excute);
                ?>
                    <a href="?option=4" id="tentheloai"><i class="fa fa-arrow-circle-left" style="font-size:25px;line-height:30px"></i> Bài tập trong phần "<?php  echo $a[1]?>"</a>
                <?php
                    $query="select mabaiviet_baitap,tieude from baiviet_baitap where matheloai=(select matheloai from baiviet_baitap where mabaiviet_baitap=$mabaiviet_baitap)";
                    $excute=mysqli_query($connect,$query);
                    $a=mysqli_fetch_array($excute);
                    while($a!=null)
                    {
                    ?>
                    <a href="?option=4&baitap=<?php echo $a[0];?>" class="cacbaitap"> - <?php echo $a[1]; ?></a>   
                    <?php
                        $a=mysqli_fetch_array($excute);
                    }
                    
                ?>
                </div>
                
            <button id="buttonleft" onclick="menudoc1()" value="0">Menu <i class="fa fa-bars" style="font-size:25px;margin-left:5px"></i></button>
                <?php
                }
                ?>
                
                <br><br><br>
                
            <div id="baivietlq">
                <h2>Những bài viết liên quan</h2>
                    <?php 
                        $query="select mabaiviet,tieude,img,matheloai from noidungbaiviet where matheloai in(select matheloai from baiviet_baitap where mabaiviet_baitap=".$_GET["baitap"]." ) limit 3";
                        $excute=mysqli_query($connect,$query);
                        $a=mysqli_fetch_array($excute);
                        $matheloai=$a[3];
                        while($a!=null)
                        {
                    ?>
                        <a href="?option=5&matheloai=<?php echo $a[3] ?>&mabv=<?php echo $a[0] ?>" target="_blank">
                            <div class="dongbaiviet">
                                <div class="habaiviet">
                                    <img src="<?php echo $a[2]?>" alt="No img">
                                </div>
                                <div class="ndbaiviet">
                                    <p>
                                        <?php if(count($a[1]>100)) echo substr($a[1],0,70)."...";  ?></p>
                                </div>
                            </div>
                        </a>
                    <?php
                        $a=mysqli_fetch_array($excute);
                        }
                    ?>
                <h3><a href="?option=5&matheloai=<?php echo $matheloai ?>">Xem thêm </a></h3>
            </div>
            <div id="tool">
                <button id="checkanswer" class="buttontool" onclick="kiemtraphuongan(<?php echo $type ?>)"><i class="fa fa-check" aria-hidden="true"></i> Kiểm tra</button>
                <button id="showanswer" disabled class="buttontool" onclick="showphuongan(<?php echo $type ?>)"><i class="fa fa-eye"></i> Hiện đáp án</button>
                <button id="finishanswer" class="buttontool" onclick="hoanThanh(<?php echo $type; ?>)"><i class="fa fa-flag-checkered" aria-hidden="true"></i> Hoàn thành</button>
                <a href=""><button id="resetanswer" class="buttontool"><i class="fa fa-refresh"></i> Làm lại</button></a>
                <span style="line-height:12px;">Page <?php echo $trang+1 ?> of <?php if($tongsotrang==0 ||$tongsotrang==1) echo 1; else echo $tongsotrang;?></span>
                <div id="dieuhuongtrang">
                    <a href="?option=4&baitap=<?php echo $mabaitap?>&trang=<?php echo ($trang+1)?>"><button <?php if($trang==$tongsotrang || $tongsotrang==1){echo "disabled ";  echo "style='background-color:#102b3e;color:red'";} ?>>
                        <i class="fa fa-arrow-right" <?php if($trang==$tongsotrang || $tongsotrang==1) echo "style='color:#6d6d6d' "?>></i>
                        
                    </button></a>
                    <a href="?option=4&baitap=<?php echo $mabaitap?>&trang=<?php echo ($trang-1)?>"><button <?php if($trang==0){echo "disabled ";  echo "style='background-color:#102b3e;color:red'";} ?>>
                        <i class="fa fa-arrow-left" <?php if($trang==0) echo "style='color:#6d6d6d' "?>></i>
                    </button></a>
                </div>
            </div>
        </div>
        <div id="scorebt">
            <div id="bndiem">
                <h2>Điểm số bài tập:</h2>
                <p id="score"></p>
                <p id="times"></p>
            </div>
        </div>
<?php
        }
    }

    else 
    {
        header("Location:baitap.php");
    }

    

?>
    
</body> 
<script>
    $(document).ready(function () {
        $("#bangdapan > h2 ").click(function () {
            
            if($(this).attr("data-type")==0)
            {
                $("#bangdapan > table").slideUp();
                $(this).attr("data-type","1");
            }
            else
            {
                $("#bangdapan > table").slideDown();
                $(this).attr("data-type","0");
            }
        })
        $("#finishanswer").click(function () {
            $.ajax({
                type:"get",
                url:"user/ajaxjquery/ajaxbaitap.php",
                data:{action:"quatrinh",mabaitap:<?php echo  $mabaitap?> },

            })
        })
        $("#bangdapan > table ").slideUp();
        $(window).click(function () {
            if(event.target==$("#scorebt")[0])
            {
                $("#scorebt").css("display","none");
            }
        })
    })
    var time=[0];
function setTimeStart(x) 
{
    if(x==0)
    {
        var gioi,phut,giay;
        gio=new Date();
        phut=new Date();
        giay=new Date();
        var timeCurr;
        timeCurr=gio.getHours()*60*60+phut.getMinutes()*60+giay.getSeconds();
        time[0]=timeCurr;
    }
    else
    {
        var gioi,phut,giay;
        gio=new Date();
        phut=new Date();
        giay=new Date();
        var timeCurr;
        timeCurr=gio.getHours()*60*60+phut.getMinutes()*60+giay.getSeconds();
        return timeCurr;
    }

}   
function menudoc1()
    {
        var a,b;
        a=document.getElementById("buttonleft");
        b=document.getElementById("menuleft");
        if(a.value==0)
        {
            b.style.left="0px";
            a.style.left="532px"
            a.value=1;
        }
        else
        {
            b.style.left="-565px";
            a.style.left="-28px"
            a.value=0;

        }
    }

    function kiemtraphuongan(x) 
    {
        if(x==1)
        {
            var name="cau",kt=1,repport_err,repport_success,classs="phuongan";
            repport_err=document.getElementsByClassName("repport_false");
            repport_success=document.getElementsByClassName("repport_true");
            cauhoi=document.getElementsByClassName("cauhoi");
            for(var i=0,x=1;i<cauhoi.length;i++,x++)
            {
                kt=1;
                var name2,cau,class2,phuongan;
                name2=name+x; 
                cau=document.getElementsByName(name2);
                
                for(var j=0;j<cau.length;j++)
                {
                    if(cau[j].checked==true &&cau[j].value==0 ) 
                    {
                        repport_success[i].style.display="block";
                        repport_err[i].style.display="none";
                        kt=0;       
                        break; 
                    }
                }
                if(kt==1)
                {
                    repport_success[i].style.display="none";
                    repport_err[i].style.display="block";
                }
            }
        }
        else if(x==2)
        {
            var cau,repport_err,repport_success;
            repport_err=document.getElementsByClassName("repport_false");
            repport_success=document.getElementsByClassName("repport_true");
            cau=document.getElementsByClassName("khoidien");
            for (var i=0;i<cau.length;i++) 
            {
                var phuongan;
                
                if(cau[i].children.length==1)
                {
                    phuongan=cau[i].children[0];

                    if(parseInt(cau[i].getAttribute("name"))==parseInt(phuongan.getAttribute("class")))
                    {
                        repport_success[i].style.display="block";
                        repport_err[i].style.display="none";
                    }
                    else
                    {
                        repport_success[i].style.display="none";
                        repport_err[i].style.display="block";
                    }
                }
                else
                {
                    repport_success[i].style.display="none";
                    repport_err[i].style.display="block";
                }
                
            }
        }
        else
        {
            var count=0;
            var select,repport_err,repport_success;
            repport_err=document.getElementsByClassName("repport_false");
            repport_success=document.getElementsByClassName("repport_true");
            select=document.getElementsByClassName("selectpa");
            for(var i=0;i<select.length;i++)
            {
                if(parseInt(select[i].value)==0)
                {
                    repport_success[i].style.display="block";
                    repport_err[i].style.display="none";
                    count++;
                }
                else
                {
                    repport_err[i].style.display="block";
                    repport_success[i].style.display="none";
                }
            }
            return count;
        }
        
    }
    function showphuongan(x) 
    {
        if(x==1)
        {
            var name="cau",classs="phuongan";
            document.getElementById("checkanswer").disabled=true;
            document.getElementById("finishanswer").disabled=true;
            document.getElementById("showanswer").disabled=true;
            cauhoi=document.getElementsByClassName("cauhoi");
            for(var i=0,x=1;i<cauhoi.length;i++,x++)
            {
                var phuongan,class2,name2;
                class2=classs+x;
                name2=name+x; 
                cau=document.getElementsByName(name2);
                phuongan=document.getElementsByClassName(class2);
                for(var j=0;j<cau.length;j++)
                {
                    if(cau[j].value==0) 
                    {
                        phuongan[j].style.color="green";
                        cau[j].checked=true;
                        break;
                    }
                }
                
            }
        }
        else
        {
            var dapan,btn_show;
            dapan=document.getElementsByClassName("chuoidapan");
            for(var i=0;i<dapan.length;i++)
            {
                dapan[i].style.display="block";
            }
            btn_show=document.getElementById("showanswer");
            btn_show.disabled=true;
        }

        
    }
    function hoanThanh(x) 
    {
        var count=0,soCau=0;
        if(x==1)
        {
            var name="cau",kt=1,repport_err,repport_success,classs="phuongan";
            var btn_show,btn_check,btn_finish;
            btn_show=document.getElementById("showanswer");
            btn_show.disabled=false;
            btn_check=document.getElementById("checkanswer");
            btn_check.disabled=true;
            btn_finish=document.getElementById("finishanswer");
            btn_finish.disabled=true;
            repport_err=document.getElementsByClassName("repport_false");
            repport_success=document.getElementsByClassName("repport_true");
            cauhoi=document.getElementsByClassName("cauhoi");
            var i1,i2;
            i1=document.getElementsByName("volumnup");
            i2=document.getElementsByName("volumndown");
            soCau=cauhoi.length;
            for(var i=0,x=1;i<cauhoi.length;i++,x++)
            {
                kt=1;
                var name2,cau,class2,phuongan;
                name2=name+x; 
                cau=document.getElementsByName(name2);
                i1[i].style.display="inline";
                i2[i].style.display="none";
                for(var j=0;j<cau.length;j++)
                {
                    if(cau[j].checked==true &&cau[j].value==0 ) 
                    {
                        repport_success[i].style.display="block";
                        repport_err[i].style.display="none";
                        kt=0;     
                        count++;   
                    }
                    cau[j].disabled=true;
                }
                if(kt==1)
                {
                    repport_err[i].style.display="none";
                    repport_err[i].style.display="block";
                }
            }
        }
        else if(x==2)
        {
            var block_ch,repport_err,repport_success,btn_check,btn_finish,btn_show,blockphuongan;
            blockphuongan=document.getElementById("bangdapan");
            blockphuongan.style.display="none";
            btn_check=document.getElementById("checkanswer");
            btn_check.disabled=true;
            btn_finish=document.getElementById("finishanswer");
            btn_finish.disabled=true;
            btn_show=document.getElementById("showanswer");
            btn_show.disabled=false;
            block_ch=document.getElementsByClassName("khoidien");
            repport_err=document.getElementsByClassName("repport_false");
            repport_success=document.getElementsByClassName("repport_true");
            var i1,i2;
            i1=document.getElementsByName("volumnup");
            i2=document.getElementsByName("volumndown");
            soCau=block_ch.length;
            for(var i=0;i<block_ch.length;i++)
            {
                i1[i].style.display="inline";
                i2[i].style.display="none";
                if(block_ch[i].children.length==0)
                {
                    repport_err[i].style.display="block";
                    repport_success[i].style.display="none";
                }
                else
                {
                    var dapan;
                    dapan=block_ch[i].children[0];
                    if(dapan.className==block_ch[i].attributes.name.value)
                    {
                        repport_success[i].style.display="block";
                        repport_err[i].style.display="none";
                        count++;
                    }
                    else
                    {
                        repport_err[i].style.display="block";
                        repport_success[i].style.display="none";
                    }
                }
            }
        }
        else 
        {
            count=kiemtraphuongan(x);
            var i1,i2;
            i1=document.getElementsByName("volumnup");
            i2=document.getElementsByName("volumndown");
            var select,btn_check,btn_finish,btn_show;
            btn_check=document.getElementById("checkanswer");
            btn_check.disabled=true;
            btn_finish=document.getElementById("finishanswer");
            btn_finish.disabled=true;
            btn_show=document.getElementById("showanswer");
            btn_show.disabled=false;
            select=document.getElementsByClassName("selectpa");
            soCau=select.length;
            for(var i=0;i<select.length;i++)
            {
                i1[i].style.display="inline";
                i2[i].style.display="none";
                select[i].disabled=true;
            }

        }
        var bangDiem,soDiem,thoigianht,thoigianlb,thoigianchitiet;
        thoigianht=setTimeStart(1);
        thoigianlb=thoigianht-time[0];
        if(thoigianlb>60 && thoigianlb<3600)
        {
            var nhanX;
            nhanX=parseInt(thoigianlb/60);
            thoigianchitiet=nhanX+" phút "+(thoigianlb-(60*nhanX))+" giây";
            
        }
        else if(thoigianlb>3600)
        {
            var nhanX;
            nhanX=parseInt(thoigianlb/3600);
            
            if(thoigianlb-(3600*nhanX)>60)
            {
                var nhanX2;
                nhanX2=parseInt((thoigianlb-(3600*nhanX))/60);
                thoigianchitiet=nhanX+" tiếng "+nhanX2+" phút "+(thoigianlb-(3600*nhanX)-(60*nhanX2))+" giây";
            }
            else
            {
                thoigianchitiet=nhanX+" tiếng "+(thoigianlb-(3600*nhanX))+" phút";
            }
        }
        else
        {
            thoigianchitiet=thoigianlb+" giây";
        }
        var tg;
        tg=document.getElementById("times");
        tg.innerHTML="Thời gian làm bài: "+thoigianchitiet;
        bangDiem=document.getElementById("scorebt");
        soDiem=document.getElementById("score");
        soDiem.innerHTML=count+"/"+soCau+" ="+(count/soCau)*10;
        bangDiem.style.display="block";
        
        
        
    }
    function playaudio(x) 
    {
        var audio;
        audio=document.querySelectorAll("audio");
        for (var i=0;i<audio.length;i++)
        {
            if(i==x)
            {
                audio[i].play();
            }
            else
            {
                audio[i].pause();
                audio[i].currentTime=0;
            }
        }
            
        
    }
    function dragStart(event) 
    {
        event.dataTransfer.setData("Text", event.target.id);
    }


    function allowDrop(event) 
    {
        event.preventDefault();
    }

    function drop(event) 
    {
        event.preventDefault();
        var data;
        data= event.dataTransfer.getData("Text");
        event.target.appendChild(document.getElementById(data));
        changeWordSpacing();
       
        
    }
    function dragging(event) {
    
    }
    function changeWordSpacing() 
    {
        var span;
        span=document.getElementsByClassName("khoidien");
        for(var i=0;i<span.length;i++)
        {
            if(span[i].children.length==1)
            {
                span[i].style.wordSpacing="-10px";
            }
            else
            {
                 span[i].style.wordSpacing="100px";
            }
        }
    }
</script>