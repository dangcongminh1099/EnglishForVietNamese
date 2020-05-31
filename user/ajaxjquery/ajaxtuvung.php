<?php 
    if(isset($_GET["mabt"]) &&$_GET["macau"])
    {
        $connect=new mysqli("localhost","root","","project");
        mysqli_set_charset($connect,"utf8");
        $macau=$_GET["macau"];
        $mabt=$_GET["mabt"];
        $query="select *from cauhoi where macau>$macau and mabaiviet_baitap=$mabt";
        $excute=mysqli_query($connect,$query);
        $a=mysqli_fetch_array($excute);
        $noidung=$a[1];
        $macau=$a[0];
        if($noidung==null &&$macau==null)
        {
            echo "";
        }
        else 
        {
            $query="select *from tblphuongan where macau=$macau";
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
