<body onload="catMota()">
    <br>
    <h1 id="noidungpage">Bài viết& lý thuyết</h1>
    <br>
    <form id="timkiembv" action="" autocomplete="off">
        <input type="hidden" value="5" name="option">
        <input type="hidden" name="action" value="tk">
        <input type="text" name="search"> <button >Tìm kiếm <i class="fa fa-search"></i></button>
        <ul id="hintsearch">
            
        </ul>
    </form>
    <br>
    <?php 
        $connect=connect("project");
        utf8($connect);
        $query="select mabaiviet,tieude,mota,img,noidung,thoigian,tentheloai,tbltheloai.matheloai from noidungbaiviet inner join tbltheloai on noidungbaiviet.matheloai=tbltheloai.matheloai WHERE tinhtrang=0 ORDER by mabaiviet DESC LIMIT 4";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
        $arr;
        $i=0;
        while($a!=null)
        {
            $arr[$i]=$a;
            $a=mysqli_fetch_array($excute);
            $i++;
        }
    ?>
    <h2 id="articlenear"> >> Những bài viết gần đây</h2>
    <br>
    <div id="all">
        <div id="left">
            <div id="allcontentleft">
                <a href="" data-mabv="<?php echo $arr[0][0] ?>" class="hienbv">
                    <div class="imgleft">
                        <img src="<?php echo $arr[0][3]?>" alt="Chua co anh" >
                    </div>
                </a>
                <div class="contentleft">
                    <a href="?option=5&matheloai=<?php echo $arr[0][7] ?>"><h3 class="ndtheloai"><?php echo $arr[0][6]?></h3></a>
                    <a href="" data-mabv="<?php echo $arr[0][0] ?>" class="hienbv">
                        <h1 class="ndtieude"><?php echo $arr[0][1]?></h1>
                    </a>
                    <p class="ndmota"><?php echo $arr[0][2]?></p>
                    
                </div>
            </div>
        </div>
        <div id="right">
            <div class="content">
                <a href="" data-mabv="<?php echo $arr[1][0] ?>" class="hienbv">
                    <div class="imgright">
                        <img src="<?php echo $arr[1][3]?>" alt="">
                    </div>
                </a>
                <div class="detailcontent">
                    <a href="?option=5&matheloai=<?php echo $arr[1][7] ?>"><h5 class="ndtheloai"><?php echo $arr[1][6]?></h5></a>
                    <a href="" data-mabv="<?php echo $arr[1][0] ?>" class="hienbv"><h3 class="ndtieude"><?php echo $arr[1][1]?></h3></a>
                    <p class="ndmota"><?php echo $arr[1][2]?></p>
                </div>
            </div>
            <div class="content">
                <a href="" data-mabv="<?php echo $arr[2][0] ?>" class="hienbv">
                    <div class="imgright">
                        <img src="<?php echo $arr[2][3]?>" alt="">
                    </div>
                </a>
                <div class="detailcontent">
                    <a href="?option=5&matheloai=<?php echo $arr[2][7] ?>"><h5 class="ndtheloai"><?php echo $arr[2][6]?></h5></a>
                    <a href="" data-mabv="<?php echo $arr[2][0] ?>" class="hienbv"><h3 class="ndtieude"><?php echo $arr[2][1]?></h3></a>
                    <p class="ndmota"><?php echo $arr[2][2]?></p>
                </div>
            </div>
            <div class="content">
                <a href="" data-mabv="<?php echo $arr[3][0] ?>" class="hienbv">
                    <div class="imgright">
                        <img src="<?php echo $arr[3][3]?>" alt="">
                    </div>
                </a>
                <div class="detailcontent">
                    <a href="?option=5&matheloai=<?php echo $arr[3][7] ?>"><h5 class="ndtheloai"><?php echo $arr[3][6]?></h5></a>
                    <a href="" data-mabv="<?php echo $arr[3][0] ?>" class="hienbv"><h3 class="ndtieude"><?php echo $arr[3][1]?></h3></a>
                    <p class="ndmota"> <?php echo $arr[3][2]?></p>
                </div>
            </div>
        </div>
    </div>
    <div id="all2">
        <?php 
            $query="select * from tbltheloai where matheloai in(select matheloai from noidungbaiviet) limit 2";
            $excute=mysqli_query($connect,$query);
            $a=mysqli_fetch_array($excute);
            $count=0;
            while($a!=null)
            {
                $query="select * from noidungbaiviet where matheloai=".$a[0]." and tinhtrang=0 order by mabaiviet desc limit 4";
                $excute2=mysqli_query($connect,$query);
                $b=mysqli_fetch_array($excute2);
                $arr=[4];
                for ($i=0; $i <4 ; $i++) 
                { 
                    if($b==null)
                    {
                        $arr[$i]="";
                    }
                    else {
                        $arr[$i]=$b;
                        $b=mysqli_fetch_array($excute2);
                    }
                    
                    
                }
                
                
        ?>
        <div class="theloai" data-matheloai="<?php echo $a[0] ?>">
            <div class="btn_theloai"><a href="?option=5&matheloai=<?php echo $a[0] ?>"><button><?php echo $a[1] ?> >></button></div></a>
            <div class="nd">
                <div class="contentdong1">
                    <div class="blockcontent">
                        <?php if($arr[0]=="")
                        {
                        ?>
                            <a href="" >
                            <div class="img">
                                <img src="" alt="Chưa có hình ảnh">
                            </div>
                            </a>
                            <div class="contentnd">
                                <a href="" ><h3 class="ndtieude">Chưa có bài viết</h3></a>
                                <p class="ndmota"></p>
                            </div>
                        <?php
                        }
                        else {
                        ?>
                            <a href="" class="hienbv" data-mabv="<?php echo $arr[0][0] ?>">
                            <div class="img">
                                <img src="<?php echo $arr[0][3]?>" alt="">
                            </div>
                            </a>
                            <div class="contentnd">
                                <a href="" class="hienbv" data-mabv="<?php echo $arr[0][0] ?>"><h3 class="ndtieude"><?php echo $arr[0][1]?></h3></a>
                                <p class="ndmota"> <?php echo $arr[0][2]?></p>
                            </div>
                        <?php
                        }
                        ?>
                        
                    </div>
                    <div class="blockcontent">
                        <?php if($arr[1]=="")
                        {
                        ?>
                            <a href="" >
                            <div class="img">
                                <img src="" alt="Chưa có hình ảnh">
                            </div>
                            </a>
                            <div class="contentnd">
                                <a href=""><h3 class="ndtieude">Chưa có bài viết</h3></a>
                                <p class="ndmota"></p>
                            </div>
                        <?php
                        }
                        else {
                        ?>
                            <a href=""  class="hienbv">
                            <div class="img" data-mabv="<?php echo $arr[1][0] ?>">
                                <img src="<?php echo $arr[1][3]?>" alt="">
                            </div>
                            </a>
                            <div class="contentnd">
                                <a href="" class="hienbv" data-mabv="<?php echo $arr[1][0] ?>"><h3 class="ndtieude"><?php echo $arr[1][1]?></h3></a>
                                <p class="ndmota"> <?php echo $arr[1][2]?></p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="contentdong2">
                    <div class="blockcontent">
                        <?php if($arr[2]=="")
                        {
                        ?>
                            <a href="" >
                            <div class="img">
                                <img src="" alt="Chưa có hình ảnh">
                            </div>
                            </a>
                            <div class="contentnd">
                                <a href=""><h3 class="ndtieude">Chưa có bài viết</h3></a>
                                <p class="ndmota"></p>
                            </div>
                        <?php
                        }
                        else {
                        ?>
                            <a href="" class="hienbv" data-mabv="<?php echo $arr[2][0] ?>">
                            <div class="img">
                                <img src="<?php echo $arr[2][3]?>" alt="">
                            </div>
                            </a>
                            <div class="contentnd">
                                <a href="" class="hienbv" data-mabv="<?php echo $arr[2][0] ?>"><h3 class="ndtieude"><?php echo $arr[2][1]?></h3></a>
                                <p class="ndmota"> <?php echo $arr[2][2]?></p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="blockcontent">
                        <?php if($arr[3]=="")
                        {
                        ?>
                            <a href="">
                            <div class="img">
                                <img src="" alt="Chưa có hình ảnh">
                            </div>
                            </a>
                            <div class="contentnd">
                                <a href=""><h3 class="ndtieude">Chưa có bài viết</h3></a>
                                <p class="ndmota"></p>
                            </div>
                        <?php
                        }
                        else {
                        ?>
                            <a href="" class="hienbv" data-mabv="<?php echo $arr[3][0] ?>">
                            <div class="img" >
                                <img src="<?php echo $arr[3][3]?>" alt="">
                            </div>
                            </a>
                            <div class="contentnd">
                                <a href="" class="hienbv" data-mabv="<?php echo $arr[3][0] ?>"><h3 class="ndtieude"><?php echo $arr[3][1]?></h3></a>
                                <p class="ndmota"> <?php echo $arr[3][2]?></p>
                            </div>
                        <?php
                        
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    
    <?php
        $a=mysqli_fetch_array($excute);
        $count++;
        }
    ?>
    </div>
    <div id="showmore"></div>
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
</body>
<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
<script>
    function catMota() 
    {
        var rg1,rg2,rg3;
        rg1=document.querySelectorAll(".ndtheloai"); 
        rg2=document.querySelectorAll(".ndtieude"); 
        rg3=document.querySelectorAll(".ndmota"); 
        for(var i=0;i<rg2.length;i++)
        {
            if(rg3[i].innerHTML.length>110)
            {
                rg3[i].innerHTML=rg3[i].innerHTML.substring(0,90)+".....";
            }
            if(rg2[i].innerHTML.length>50)
            {
                rg2[i].innerHTML=rg2[i].innerHTML.substring(0,50)+".....";
            }
        }  
            
    }
    
    $(document).ready(function () {
        $(document).on('click',".hienbv",function () {
            $.get("user/ajaxjquery/ajaxbaiviet.php",{mabv:$(this).attr("data-mabv"),action:"1"},function (data) {
              $("#ctbaiviet").html(data);
              $("#wrapctbaiviet").css("display","block");
              
            })
           
            return false;
        });
// Scriptranslate adsadadasdsadasdasdasdasdddddddddd translatecy
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
            console.log(event.target);
            if(event.target==$("#wrapctbaiviet").get(0)||event.target==$("[data-icon='closeicon']")[0])
            {     
                $("#wrapctbaiviet").css("display","none");
            }
            if(event.target!=$("#hintsearch")[0])
            {
                $("#hintsearch").css("display","none");
            }
            if(event.target!=$("#block")[0] && event.target!=$(".click")[0] && event.target!=$("#headerblock")[0] && event.target!=$("#load")[0] && event.target!=$("#contentblock")[0]&& event.target!=$("#footerblock")[0]&& event.target!=$("#playaudio")[0]&& event.target!=$("#refreshaudio")[0]&& event.target!=$("#stopaudio")[0]&& event.target!=$("#volumntools")[0]&& event.target!=$("#aftertrans")[0])
            {
                $("#block").css("display","none");
            }
        });
//end translate


        $(window).scroll(function()
        {
            if($(this).scrollTop() % $(window).height()==0 &&$(this).scrollTop()/$(window).height()>=3)
            {
                var a=$(".theloai")[$(".theloai").length-1];
                
                $.get("user/ajaxjquery/ajaxbaiviet.php",{matheloai:$(a).data("matheloai"),action:"append"},function(data)
                {
                    $("#all2").append(data);
                    var heightDoc,heightWin;
                    heightDoc=$(document).height();
                    heightDoc=Math.ceil($(document).height()/$(window).height())*100;
                    $("body").css("height",heightDoc+"vh");
                    catMota();
                })
            }
        })
        $(document).ajaxStart(function()
        {
            $("#showmore").css("display","block");

        })
        $(document).ajaxStop(function()
        {
            $("#showmore").css("display","none");
        })
        
        $("#timkiembv > input[type=text]").keypress(function () {
            console.log($(this).val());
            $.get("user/ajaxjquery/ajaxbaiviet.php",{tk:$(this).val(),action:"2"},function (data) {
                $("#timkiembv>ul").html(data);
                $("#hintsearch").css("display","block");
                $("#hintsearch > li").click(function () {
                    $("#timkiembv > input[type=text]").val($(this).html());
                    $("#timkiembv").submit();
                });
            })
        })
        
    })
</script>