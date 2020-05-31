   
    function hienthi_login(x)
    {
        var a;
        if(x==0)
        {
            a=document.getElementById("login");
            a.style.display="block";
        }
        else if(x==2)
        {
            a = document.getElementById("changepassword");
            a.style.display = "block";
        }
        else if(x==3)
        {
            a = document.getElementById("changeemail");
            a.style.display = "block";
        }
        else
        {
            a=document.getElementById("register");
            a.style.display="block";
        }
        
    }
    function validate_capdo(x,y,z)
    {
        var a;
        a=document.getElementById(y);
        if(x==0)
        {
            a.innerHTML="Chưa chọn cấp độ";
        }
        else
        {
            a.innerHTML = "";
            z[0]++;
        }
    }
    function validate_user(x,y,z)
    {
        var a;
        a=document.getElementById(y);
        if(x.length==0)
        {
            a.innerHTML="Không được để trống";
        }
        else if(x.length>30 || x.length<5)
        {
            a.innerHTML="Sai định dạng";
        }
        else
        {
            var re_user,result;
            re_user=/^[a-z]+[a-z0-9]+$/;
            result=re_user.test(x);
            if(result==true)
            {
                a.innerHTML="";
                z[0]++;
                
            }
            else
            {
                a.innerHTML="Sai định dạng";
            }
            
        }
    }
    function validate_password(x,y,z)
    {
        var a;
        a=document.getElementById(y);
        if(x.length==0)
        {
            a.innerHTML="Không được để trống";
        }
        else if(x.length>30 || x.length<5)
        {
            a.innerHTML="Sai định dạng";
        }
        else
        {
            var re_pass,result;
            re_pass=/^[a-zA-Z0-9]+[a-z0-9]+$/;
            result=re_pass.test(x);
            if(result==true)
            {
                a.innerHTML="";
                z[0]++;
                
                
            }
            else
            {
                a.innerHTML="Sai định dạng";
            }
            
        }
    }
    function  validate_password2(x,y,z,k) 
    {
        var a;
        a=document.getElementById(z);
        if(x!=y)
        {
            a.innerHTML="Mật khẩu không khớp";

        }
        else
        {
            a.innerHTML="";
            k[0]++;
            
        }
    }
    function validate_email(x,y,z)
    {
        var a;
        a=document.getElementById(y);
        if(x.length==0)
        {
            a.innerHTML="Không được để trống";
        }
        else if(x.length>50 || x.length<10)
        {
            a.innerHTML="Sai định dạng";
        }
        else
        {
            var re_email;
            re_email=/^[a-zA-Z]+[a-zA-Z0-9.]{5,28}@[a-zA-Z0-9]+\.[a-z]{1,5}\.?[a-z]{1,5}$/;
            var result;
            result=re_email.test(x);
            if(result==true)
            {
                a.innerHTML="";
                z[0]++;
                
            }
            else
            {
                a.innerHTML="Sai định dạng";
            }
        }
    }
    function confirm_logout()
    {
        var a;
        a=confirm("Bạn có chắc chắn muốn thoát");
        if(a==true)
        {
            var b;
            b=document.querySelector("#user > li > a");
            b.href="user/dangnhap.php?logout";
        }
    }
    
    function alert_login()
    {
        alert("Bạn đã nhập sai tài khoản hoặc mật khẩu");
        hienthi_login(0);
    }
    function alert_register()
    {
        alert("Tên tài khoản hoặc email đã tồn tại");
        hienthi_login(1);
    }
    
    function alert_change()
    {
        alert("Bạn đã nhập sai tài khoản hoặc mật khẩu cũ");
        hienthi_login(2);
    }
    function alert_change_email()
    {
        alert("Bạn đã nhập sai tài khoản hoặc mật khẩu cũ");
        hienthi_login(3);
    }
    function alert_success(x)
    {
        if(x==1)
        {
            alert("Đã đăng nhập");
        }
        else if(x==2)
        {
            alert("Đã thay đổi thành công");
        }
        else
        {
            alert("Đã đăng ký thành công");
        }
    }
    