function validateSuaThemBT() {
    var count = [0];
    validateTextBox("tieude[]", count, "err_tieude");
    validateTextBox("mota[]", count, "err_mota");
    validateHinhAnh("newfile[]", count, "err_ha");
    validateRong("link[]", count, "err_link");
    if (count[0] == 4) {
        return true;
    }
    else {
        return false;
    }


}
function validateTextBox(x, y, z) {
    var input, count = 0, err;
    input = document.getElementsByName(x);
    err = document.getElementsByClassName(z);
    for (var i = 0; i < input.length; i++) {
        if (input[i].value.length != 0 && input[i].value.length > 5) {
            console.log(input[i].value);
            var regular_express;
            regular_express = /^[a-zA-Z0-9àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ ]{5,100}$/;
            var result;
            result = regular_express.test(input[i].value.toLowerCase());
            if (result == true) {
                count++;
                err[i].innerHTML = ""
            }
            else {
                err[i].innerHTML = ">> Không cho phép kí tự đặc biệt";
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
function validateSelect(x, y, z) {
    var select, count = 0;
    select = document.getElementsByName(x);
    err = document.getElementsByClassName(z);
    for (var i = 0; i < select.length; i++) {

        if (select[i].value != 0) {
            count++;
            err[i].innerHTML = "";
        }
        else {
            err[i].innerHTML = ">> Phải chọn mục này";
        }
    }
    if (count == select.length) {
        y[0]++;
    }
}
function validateHinhAnh(x, y, z) {
    var linkImg, nameImg, regular_express, err,count=0;
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
        else
        {
            err[j].innerHTML = "";
            count++;
        }
    }
    if(count==linkImg.length)
    {
        y[0]++;
    }
}
function validateRong(x, y, z) 
{
    var a, er,count=0;
    a = document.getElementsByName(x);
    err = document.getElementsByClassName(z);
    for(var i=0;i<a.length;i++)
    {
        if (a[i].value.length == 0) {
            err[i].innerHTML = "Không được để trống";
        }
        else {
            err[i].innerHTML = "";
            count++;
        }
    }
    if (count == a.length)
    {
        y[0]++;
    }
    
}