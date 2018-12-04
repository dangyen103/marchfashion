<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        p{
            margin: 6px 0;
        }
    </style>
</head>
<body>
    <div style="background-color: #000; padding: 10px 10px 7px 10px;">
        <img src="{{ asset('uploads/icons/logo.png') }}" height="30px" alt="">
    </div>
    <div style="background-color: #f7f7f7; padding: 10px;">
            <p style="font-style: italic; margin-bottom: 20px;">Xin chào <strong>{{$name}}</strong>,</p>
            <p>Tài khoản của bạn vừa được tạo thành công.</p>
            <p>Mật khẩu truy cập:</p>
            <div style="text-align:center;">
                <h2>{{$password}}</h2>
            </div>
            <p>Vì lý do bảo mật, vui lòng đổi mật khẩu ngay sau khi nhận được email này.</p>
            <p style="font-style: italic; margin-top: 20px;">Trân trọng!</p>
            <p style="font-style: italic;">Nhóm hỗ trợ March Fashion</p>
    </div>
    <div style="padding: 10px; font-size: .8rem; color: #888;">
            <p>Bạn nhận được email này vì ai đó đã sử dụng nó để tạo tài khoản trên trang web của chúng tôi. 
                Nếu bạn không cung cấp địa chỉ email này cho bất kì hoạt động nào với March Fashion, hãy bỏ qua nó.</p>
            <p>© March Fashion JSC.,</p>
    </div>
</body>
</html>