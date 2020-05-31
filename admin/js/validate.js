function validateSelect(x, y)
 {
    var select, count = 0;
    select = document.getElementsByName(x);
    
    for (var i = 0; i < select.length; i++) {
        console.log(select[i].value);
        if (select[i].value == 0) {
            
            alert("Chưa diền đầy đủ thông tin!!");
        }
        else {
            count++;
        }
    }
    if (count == select.length) {
        y[0]++;
    }
}
function validateTextBox(x, y) {
    var input, count = 0;
    input = document.getElementsByName(x);
    console.log(input);
    for (var i = 0; i < input.length; i++) {
        if (input[i].value.length > 5) {
            var regular_express;
            regular_express = /^[a-zA-Z0-9àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ ]{5,50}$/;
            var result;
            result = regular_express.test(input[i].value.toLowerCase());
            if (result == true) {
                count++;
            }
            else {
                alert("Không được để kí tự đặc biệt và ít nhất 5 kí tự");
            }
        }
        else {
            alert("Không được để trống và quá ít kí tự");
        }
    }
    if (count == input.length) {
        y[0]++;

    }
}
    function scanCheckBox() {
        var checkbox, btnXoa, kt = 1, button_sua;
        checkbox = document.getElementsByName("checkbox[]");
        btnXoa = document.getElementById("button_xoa");
        button_sua = document.getElementById("button_sua");
        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked == true) {
                kt = 0;
                btnXoa.disabled = false;
                button_sua.disabled = false;
            }
        }
        if (kt == 1) {
            btnXoa.disabled = true;
            button_sua.disabled = true;
        }
    }
