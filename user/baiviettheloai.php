<?php
    $connect=connect("project");
    utf8($connect);
    if (isset($_GET["matheloai"])) 
    {
        
        $query="select tentheloai from tbltheloai where matheloai=".$_GET["matheloai"];
        $excute=mysqli_query($connect,$query);
        $theloai=mysqli_fetch_array($excute)[0];
        $query="select *from noidungbaiviet where matheloai=".$_GET["matheloai"]." and tinhtrang=0";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);

?>
<body>
    <ul id="alltl">
        <li id="tentl"><button><?php echo $theloai ?></button></li>
        <?php
            while ($a != null) 
            {
        ?>
            <li>
                <a class="hienbv" data-mabv="<?php echo $a[0] ?>">
                    <div class="bv">
                        <div class="imgbv">
                            <img src="<?php echo $a[3]?>" alt="Không có hình ảnh">
                        </div>
                        <div class="mtbv">
                            <h2><?php echo $a[1]?></h2>
                            <p><?php echo $a[2]; ?></p>
                        </div>
                    </div>
                </a>
            </li>
        <?php
            $a=mysqli_fetch_array($excute);
            }
        ?>
        
    </ul>
</body>
<?php
    }
    else if(isset($_GET["search"]) &&isset($_GET["action"])&&$_GET["action"]="tk")
    {
        $search=$_GET["search"];
        $query="select * from noidungbaiviet where (tieude like '%$search%' or noidung like '%$search%') and tinhtrang=0";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
    ?>
        <body>
            <ul id="alltl">
                <li id="tentl"><button>Từ khóa "<?php echo $_GET["search"] ?>"</button></li>
                <?php
                    while ($a != null) 
                    {
                ?>
                    <li>
                        <a class="hienbv" data-mabv="<?php echo $a[0] ?>">
                            <div class="bv">
                                <div class="imgbv">
                                    <img src="<?php echo $a[3]?>" alt="Không có hình ảnh">
                                </div>
                                <div class="mtbv">
                                    <h2><?php echo $a[1]?></h2>
                                    <p><?php echo $a[2]; ?></p>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php
                    $a=mysqli_fetch_array($excute);
                    }
                ?>
                
            </ul>
        </body>
    <?php
    }
    else {
        header("Location:index.php?option=5");
    }
?>
<div id="wrapctbaiviet">
    <div id="ctbaiviet"></div>
    <div id="block">
        <div id="headerblock">
            <h3>Tìm kiếm & dịch</h3>
        </div>
        <div id="load">
            <div id="circleload"></div>
        </div>
        <div id="contentblock">
            <div id="volumntools">
                <i class="fa fa-play-circle" id="playaudio" data-status="0"></i> Play </i><i class="fa fa-stop-circle" id="stopaudio"></i> Stop <i class="fa fa-refresh" id="refreshaudio"></i> Refresh 
            </div> 
            <p id="aftertrans"></p>
        </div>
        <div id="footerblock"></div>
    </div>
    <button class="click" >Dịch <i class="fa fa-search"></i></button>
</div>
<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
<script>
$(document).ready(function () {
    <?php 
        if(isset($_GET["mabv"]))
        {
    ?>
            $.get("user/ajaxjquery/ajaxbaiviet.php",{mabv:<?php echo $_GET["mabv"] ?>,action:"1"},function (data) {
              $("#ctbaiviet").html(data);
              $("#wrapctbaiviet").css("display","block");
            })
    <?php
        }    
    ?>
        $(".hienbv").click(function () {
            $.get("user/ajaxjquery/ajaxbaiviet.php",{mabv:$(this).attr("data-mabv"),action:"1"},function (data) {
              $("#ctbaiviet").html(data);
              $("#wrapctbaiviet").css("display","block");
            })
            return false;
        });

        var a;
        var keyword,audiokeyword;
        $("#ctbaiviet").mouseup(function () {
            keyword=window.getSelection().getRangeAt(0).toString();
            if(keyword!="")
            {
                
                var wordselect,top,left,x,blockcha,blockcon,topblock;
                wordselect=window.getSelection().getRangeAt(0);
                blockcha=document.getElementById("wrapctbaiviet").scrollTop;
                blockcon=window.getSelection().getRangeAt(0).getClientRects()[window.getSelection().getRangeAt(0).getClientRects().length-1].y;
                console.log("Scroll: "+blockcha);
                console.log("Y: "+blockcon);
                top=document.getElementById("wrapctbaiviet").scrollTop+window.getSelection().getRangeAt(0).getClientRects()[window.getSelection().getRangeAt(0).getClientRects().length-1].y-26;
                topblock=top+47;
                console.log(top);
                left=document.getElementById("wrapctbaiviet").scrollLeft+window.getSelection().getRangeAt(0).getClientRects()[window.getSelection().getRangeAt(0).getClientRects().length-1].x;
                for(var i=0;i<keyword.length;i++)
                {
                    if(keyword[i]=="\"" ||keyword[i]=="'")
                    {
                        keyword=keyword.replace("\""," ").replace("'"," ");
                    }
                }
                $(".click").css("top",top+"px");
                $("#block").css("top",topblock+"px");
                $("#block").css("left",left+"px");
                $(".click").css("left",left+"px");
                $(".click").css("display","inline");
                $(document).ajaxStart(function () {
                    $("#load").css("display","block");
                    $("#contentblock").css("overflow","hidden");
                })
                $(document).ajaxStop(function () {
                    $("#load").css("display","none");
                    $("#contentblock").css("overflow","scroll");
                })
            }
            else
            {
                $(".click").css("display","none");
            }

        })
        $('.click').click(function () {
            $("#block").css("display","block");
            $(this).css("display","none");
            var search;
            audiokeyword=keyword;
            search=keyword;
            $.ajax({
                type: "get",
                url: "user/translate.php",
                data: {key: search},
                async:true,
                success: function (response) {
                    $("#aftertrans").html(response);
                }
            });  
        })
        $("#playaudio").click(function () {
            console.log($(this).attr("data-status"));
            if($(this).attr("data-status")=="0")
            {
                responsiveVoice.speak(audiokeyword, 'UK English Male');
            }
            else
            {
                responsiveVoice.resume();
            }
            
        })
        $("#stopaudio").click(function () {
            responsiveVoice.pause();
            $("#playaudio").attr("data-status", "1");
        })
        $("#refreshaudio").click(function () {
            responsiveVoice.speak(audiokeyword, 'UK English Male');
        })
    
        $(window).click(function () {
            if(event.target==$("#wrapctbaiviet").get(0)||event.target==$("[data-icon='closeicon']")[0])
            {
                
                $("#wrapctbaiviet").css("display","none");
            }
            if(event.target!=$("#block")[0] && event.target!=$(".click")[0] && event.target!=$("#headerblock")[0] && event.target!=$("#load")[0] && event.target!=$("#contentblock")[0]&& event.target!=$("#footerblock")[0]&& event.target!=$("#playaudio")[0]&& event.target!=$("#refreshaudio")[0]&& event.target!=$("#stopaudio")[0]&& event.target!=$("#volumntools")[0]&& event.target!=$("#aftertrans")[0])
            {
                $("#block").css("display","none");
            }
        });
})
</script>