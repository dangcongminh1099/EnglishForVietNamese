<?php
function questions($x)
{
    switch($x)
    {
        case 1:
    ?>
            <div class="select">
                <h2>Chọn đáp án đúng "BÁC SĨ": </h2>
                <div id="select1" onclick="audios(1)">
                
                    <audio>
                        <source src="goalkepper..mp3">
                    </audio>
                    <img src="DDpvmR6XgAASrPr.jpg" alt="" width="250px" height="200px">
                    <br>
                    <div class="radioselect">
                        <input type="radio" name="dapan" value="1"><span>Goalkepper</span>
                    </div>
                </div>
                <div id="select2" onclick="audios(2)">
                    <audio>
                        <source src="doctor.mp3">
                    </audio>
                    <img src="Doctor_Johnny_Sins.png" alt="" width="250px" height="200px">
                    <br>
                    <div class="radioselect">
                        <input type="radio" name="dapan" value="0"><span>Doctor</span>
                    </div>
                </div>
                <div id="select3" onclick="audios(3)">
                    <audio>
                        <source src="astronaut.mp3">
                    </audio>
                    <img src="TRyl1jlM_400x400.jpg" alt="" width="250px" height="200px">
                    <br>
                    <div class="radioselect">
                        <input type="radio" name="dapan" value="1"><span>Astronaut</span>
                    </div>
                </div>
            </div>
    <?php
            break;
        case 2:
    ?>
            <div class="select">
                <h2>Chọn đáp án đúng "Thủ môn": </h2>
                <div id="select1" onclick="audios(1)">
                    <audio>
                        <source src="defen.mp3">
                    </audio>
                    <img src="46334313_2267957476612222_8075272474851278848_n.jpg" alt="" width="250px" height="200px">
                    <br>
                    <div class="radioselect">
                        <input type="radio" name="dapan" value="1"><span>defensive midfielde</span>
                    </div>
                </div>
                <div id="select2" onclick="audios(2)">
                    <audio>
                        <source src="teacher.mp3">
                    </audio>
                    <img src="464224240becf29f282085d7bdcb3a1d.jpg" alt="" width="250px" height="200px">
                    <br>
                    <div class="radioselect">
                        <input type="radio" name="dapan" value="1"><span>Teacher</span>
                    </div>
                </div>
                <div id="select3" onclick="audios(3)">
                    <audio>
                        <source src="goalkepper..mp3">
                    </audio>
                    <img src="DDpvmR6XgAASrPr.jpg" alt="" width="250px" height="200px">
                    <br>
                    <div class="radioselect">
                        <input type="radio" name="dapan" value="0"><span>Goalkepper</span>
                    </div>
            
                </div>
            </div>
           
    <?php
            break;
        case 3:
    ?>
            <div class="select">
                <h2>Chọn đáp án đúng "Cảnh sát": </h2>
                <div id="select1" onclick="audios(1)">
                    
                    <audio>
                        <source src="policeman.mp3">
                    </audio>
                    <img src="copjohnny.jpg" alt="" width="250px" height="200px">
                    <br>
                    <div class="radioselect">
                        <input type="radio" name="dapan" value="0"><span>Policeman</span>
                    </div>
                </div>
                <div id="select2" onclick="audios(2)">
                    <audio>
                        <source src="goalkepper..mp3">
                    </audio>
                    <img src="DDpvmR6XgAASrPr.jpg" alt="" width="250px" height="200px">
                    <br>
                    <div class="radioselect">
                        <input type="radio" name="dapan" value="1"><span>Goalkepper</span>
                    </div>
                </div>
                <div id="select3" onclick="audios(3)">
                    <audio>
                        <source src="teacher.mp3">
                    </audio>
                    <img src="464224240becf29f282085d7bdcb3a1d.jpg" alt="" width="250px" height="200px">
                    <br>
                    <div class="radioselect">
                        <input type="radio" name="dapan" value="1"><span>Teacher</span>
                    </div>
            
                </div>
            </div>
    <?php
            break;
    }
?>

<?php
}

?>