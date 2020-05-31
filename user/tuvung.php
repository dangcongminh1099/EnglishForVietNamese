
<body onload="startEnd(1)">
    <div id="all">
        <?php
            if(!isset($_GET["option"])&& !isset($_GET["mabaitap"]))
            {
                header("Location:index.php?option=3");
            }
            
            else 
            {
                $connect=connect("project");
                utf8($connect);
                $mabaitap=$_GET["mabaitap"];
                $query="select macau,noidung from cauhoi where mabaiviet_baitap=$mabaitap";
                $excute=mysqli_query($connect,$query);
                $a=mysqli_fetch_array($excute);
                $macau=$a["macau"];
                $noidung=$a["noidung"];
                if($noidung==null || $macau==null)
                {
                ?>
                    <div id="chucmung">
                        <div>
                            <span>Thể loại từ vựng này chưa có bài tập</span>
                            <br>
                            <br>
                            <br>
                            <a href="?option=3"><button><i class="fa fa-undo"></i>Quay trở lại danh sách bài tập</button></a>
                        </div>
                    </div>
                <?php
                }
                else 
                {
                    $query="select * from tblphuongan where macau=$macau";
                    $excute=mysqli_query($connect,$query);
                    $a=mysqli_fetch_array($excute);
                ?>
                    <div id="countdown"> 
                        <div id="counttime"></div>
                        <h3>Thời gian còn lại: <span>15</span>s</h3>
                    </div>
                    <table border="0" cellspacing="20" cellpadding="0" id="content">
                        <tr>
                            <td colspan="10"><h3><?php echo $noidung;?></h3></td>
                        </tr>
                        <tr>
                        <?php
                            $count=0;
                            while($a!=null)
                            {
                                
                        ?>
                            <td onclick="audios(<?php echo $count?>)" class="columnphuongan">
                                <table>
                                <tr>
                                    <th>
                                        <img src="<?php echo $a['img'] ?>" alt="" width="160px" height="150px">
                                        <audio src="<?php echo $a['audio']?>"></audio>
                                    </th>
                                </tr>
                                <tr>
                                    <td style="border:none"><label for="phuongan=<?php echo $count;?>"><input id="phuongan=<?php echo $count;?>" type="radio" value="<?php echo $a['dapan'] ?>" name="phuongan" onchange="checkeds(<?php echo $count;?>)"> <span ><?php echo $a["noidung"]; ?></span></label></td>
                                </tr>
                                </table>                
                            </td>
                        <?php        
                        $count=$count+1;
                        $a=mysqli_fetch_array($excute);
                    
                            }
                        ?>
                        
                        </tr>
                        
                    </table>
                    <table id="tablebutton">
                        <tr>
                            <th><button onclick="ignore()">Bỏ qua</button></th>
                            <th><button onclick="check()"> Kiểm tra</button></th>
                        </tr>
                    </table>
                    <div id="footer">
                    
                            <i class="" style="color:green;font-size:58px"></i>
                            
                            <span>Chính xác</span>
                            <a id="nextques" data-ques="<?php echo $macau?>"><button>Câu tiếp theo</button></a>
                    </div>
                <?php
                }
            }
        ?>
    </div>
    <div id="report">
        <div id="ndreport">
            <h3>Bạn đã làm xong</h3>
            <p></p>
            <a ><button>Về menu bài tập</button></a>
        </div>
    </div>
</body>
<script>
    var count=[0],socau=[1];
    $(document).ready(function () {
        $(document).on("click","#nextques",nextQuestion);
        function returnQuestion(data)
        {
            if(data=="")
            {
                $("#all").html(data);
                score();
            }
            else
            {
                $("#all").html(data);
                socau[0]++;
                console.log(data);
                startEnd(1);
            }
        }
        function nextQuestion()
        {
            $.get("user/ajaxjquery/ajaxtuvung.php",{macau:$(this).data("ques"),mabt:<?php echo $mabaitap ?>},returnQuestion);
        }
        $("#ndreport > a > button").click(function () {
            $.ajax({
                type:"get",
                url:"user/ajaxjquery/ajaxbaitap.php",
                data:{action:"quatrinh",mabaitap:<?php echo $mabaitap ?>}
            })
            $(document).ajaxStop(function () {
                location.replace("?option=3");
            })  
        })
        
    })
function audios(x)
{
    var am;
    am=document.querySelectorAll("audio");     
    for (var i=0; i < am.length;i++) 
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
function score() 
{
    var div,p;
    div=document.getElementById("report");
    div.style.display="block";
    p=document.querySelectorAll("#ndreport > p");
    p[0].innerHTML="Đã làm được: "+count[0]+" /"+socau[0]+" ="+(count[0]/socau[0])*10+"đ";
}
function check()
{
    var answer;
    answer=document.querySelectorAll("tr>td >label> input[type=radio]");
    var kt=1,checked=1;
    var td;
    td=document.getElementsByClassName("columnphuongan");
    
    for(var i=0;i<answer.length;i++)
    {
        if(answer[i].checked==true && answer[i].value==0)
        {
            kt=0;    
        }
        if(answer[i].checked==true)
        {
            checked=0;
        }
        
        
    }
    if(checked==0)
    {
        startEnd(0);
        for(var i=0;i<answer.length;i++)
        {
            answer[i].setAttribute("disabled","disabled");
            if(answer[i].value==0)
            {
                td[i].style.border="5px solid green"; 
            }
        }
        if(kt==0)
        {
            var footer;
            footer=document.getElementById("footer");
            footer.style.display="block";
            var icon;
            icon=document.querySelector("#footer>i");
            icon.className="fa fa-check";
            icon.style.color="green";
            count[0]++;
        }
        else
        {
            var footer;
            footer=document.getElementById("footer");
            footer.style.display="block";
            footer.style.backgroundColor="red";
            var icon;
            icon=document.querySelector("#footer>i");
            icon.className="fa fa-close";
            icon.style.color="#ad0202";
            var span;
            span=document.querySelector("#footer>span");
            span.innerHTML="Chưa chính xác";
        }
    }
    else
    {
        alert("Bạn chưa chọn đáp án");
    }
    
}
function ignore()
{
    var answer,td;
    answer=document.querySelectorAll("tr>td > label> input[type=radio]");
    td=document.getElementsByClassName("columnphuongan");
    for(var i=0;i<answer.length;i++)
    {
        td[i].style.border="5px solid red";
        if(answer[i].value==0)
        {
            td[i].style.border="5px solid green";
            answer[i].chechked=true;
        }
        answer[i].disabled=true;
    }
    var footer;
    footer=document.getElementById("footer");
    footer.style.display="block";
    footer.style.backgroundColor="red";
    var icon;
    icon=document.querySelector("#footer>i");
    icon.className="fa fa-close";
    icon.style.color="#ad0202";
    var span;
    span=document.querySelector("#footer>span");
    span.innerHTML="Bạn đã bỏ qua câu này";
    startEnd(0);
}
function checkeds(x)
{
    var td;
    td=document.getElementsByClassName("columnphuongan")
    for(var i=0;i<td.length;i++)
    {
        if(i==x)
        {
            td[i].style.backgroundColor="gray";
            continue;
        }
        td[i].style.backgroundColor="";
    }
    
}
var settime=[];

function startEnd(x)
{
    var animation;
    animation=document.getElementById("counttime");
    if(x==1)
    {
        settime[0]=setInterval(coutDown,1000);
        animation.style.webkitAnimationPlayState = "running";
    }
    else
    {
        clearInterval(settime[0]);
        time[0]=15;
        animation.style.webkitAnimationPlayState = "paused";
        animation.style.width="0%";
    }
}
var time=[15];
function coutDown()
{
    time[0]--;
    var print;
    print=document.querySelectorAll("#countdown > h3 > span");
    print[0].innerHTML=time[0];
    if(time[0]==0)
    {
        startEnd(0);
        ignore();
    }
    
}

</script>
