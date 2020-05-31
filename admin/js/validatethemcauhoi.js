function validateThemCauHoi(x) 
{
    var count = [0];
    if(x==1)
    {
        validateTextBox("noidung[]", count, "err_noidung");
        validateCheckBox("dapan", count);
        validateHinhAnh("img[]", count, "err_ha");
        validateAudio("audio[]", count, "err_at");
        if (count == 4) {
            return true;
        }
        else {
            return false;
        }
    }
    else
    {
        validateAudio("audiobt", count,"err_audiobt");
        validateTextBox("noidung[]", count, "err_noidung");
        validateCheckBox("dapan", count);
        if(count==3)
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }
    
}
function validateTextBox(x, y, z) {
    var input, count = 0, err;
    input = document.getElementsByName(x);
    console.log(input[0].value);
    err = document.getElementsByClassName(z);
    for (var i = 0; i < input.length; i++) {
        if ( input[i].value.length > 5) {
            console.log(input[i].value);
            var regular_express;
            regular_express = /^[a-zA-Z0-9àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ?_ -]{5,100}$/;
            var result;
            result = regular_express.test(input[i].value.toLowerCase());
            if (result == true) {
                count++;
                err[i].innerHTML = ""
            }
            else {
                err[i].innerHTML = ">> Có kí tự đặc biệt";
            }
        }
        else {
            err[i].innerHTML = ">> Tối thiểu 5 kí tự";
        }
    }
    if (count == input.length) {
        y[0]++;

    }
}
function validateRong(x, y, z) {
    var a, er, count = 0;
    a = document.getElementsByName(x);
    console.log(a[0].value);
    err = document.getElementsByClassName(z);
    for (var i = 0; i < a.length; i++) {
        if (a[i].value.length == 0) {
            err[i].innerHTML = "Không được để trống";
        }
        else {
            err[i].innerHTML = "";
            count++;
        }
    }
    if (count == a.length) {
        y[0]++;
    }

}
function validateHinhAnh(x, y, z) {
    var linkImg, nameImg, regular_express, err, count = 0;
    err = document.getElementsByClassName(z);
    linkImg = document.getElementsByName(x);
    for (var j = 0; j < linkImg.length; j++) {
        if (linkImg[j].files[0] != null) {
            nameImg = linkImg[j].files[0].name.split(".");
            size = (linkImg[j].files[0].size / 1024) / 1024;
            regular_express = /^[a-zA-Z0-9()]+$/;
            duoifile = ["jpg", "png"];
            if (nameImg.length > 2) {
                err.innerHTML = ">> Có kí tự đặc biệt trong tên file1";
            }
            else if (nameImg.length == 2) {
                var result;
                result = regular_express.test(nameImg[0]);
                if (result == true) {
                    var kt = 1;
                    for (var i = 0; i < 2; i++) {
                        if (nameImg[1] == duoifile[i]) {
                            kt = 0
                            break;
                        }
                    }
                    if (kt == 0) {
                        if (size > 5) {
                            err[j].innerHTML = ">> File có đuôi quá lớn";
                        }
                        else {
                            err[j].innerHTML = "";
                            count++;
                        }
                    }
                    else {
                        err[j].innerHTML = ">> Chỉ có file đuôi png,jpg được upload";
                    }

                }
                else {
                    err[j].innerHTML = ">> Có kí tự đặc biệt trong tên file";
                }
            }
        }
        else {
            err[j].innerHTML = ">> Bắt buộc có ảnh";
        }
    }
    if (count == linkImg.length) {
        y[0]++;
    }
}
function validateAudio(x, y, z) {
    var linkAudio, nameAudio, regular_express, err, count = 0;
    err = document.getElementsByClassName(z);
    linkAudio = document.getElementsByName(x);
    for (var j = 0; j < linkAudio.length; j++) {
        if (linkAudio[j].files[0] != null) {
            nameAudio = linkAudio[j].files[0].name.split(".");
            size = (linkAudio[j].files[0].size / 1024) / 1024;
            regular_express = /^[a-zA-Z0-9()]+$/;
            if (nameAudio.length > 2) {
                err.innerHTML = ">> Có kí tự đặc biệt";
            }
            else if (nameAudio.length == 2) {
                var result;
                result = regular_express.test(nameAudio[0]);
                if (result == true) {
                    if (nameAudio[1] == "mp3") {
                        if (size > 5) {
                            err[j].innerHTML = ">> File có đuôi quá lớn";
                        }
                        else {
                            err[j].innerHTML = "";
                            count++;
                        }
                        
                    }
                    else {
                        err[j].innerHTML = ">> Chỉ chấp nhận đuôi mp3";
                    }
                }
                else {
                    err[j].innerHTML = ">> Có kí tự đặc biệt";
                }
            }
        }
        else {
            err[j].innerHTML = ">> Bắt buộc có audio";
        }
    }
    if (count == linkAudio.length) {
        y[0]++;
    }
}
function validateCheckBox(x,y) 
{
    var checkbox,err;
    checkbox=document.getElementsByName(x);
    err=1;
    for(var i=0;i<checkbox.length;i++)
    {
        if(checkbox[i].checked==true)
        {
            err=0;
            break;
        }
    }
    if(err==1)
    {
        alert("Chưa đánh dấu phương án đúng");
    }
    else
    {
        y[0]++;
    }
    
    
}