<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .container {
            width: 100%;
            margin-right: auto;
            margin-left: auto;
            font-family: sans-serif;
            font-size: 14px;
            line-height: 150%;
        }

        table{
            border-spacing: 0 !important;
        }

        table tbody tr td{
            padding: 0;
        }

        @media (min-width: 576px) {
            .container {
                max-width: 540px;
            }
        }

        @media (min-width: 768px) {
            .container {
                max-width: 720px;
            }
        }

        .header-mail {
            background-color: #000; 
            padding: 10px 15px 7px 15px;
        }

        .body-mail{
            background-color: #fff; 
            padding: 15px;
        }

        .footer-mail{
            padding-left: 15px;
            padding-right: 15px;
            padding-top: 5px;
            padding-bottom: 10px;
            font-size: 11px; 
            color: #888;
            background-color: #f7f7f7;
        }

        .text-center{
            text-align: center;
        }

        p{
            margin-bottom: .5rem;
        }

    </style>
</head>
<body>
    <div class="container">
        <table>
            <tr>
                <td colspan="2" style="height: 1px"></td>
                <td colspan="3" style="background-color: #F8F8F8; height: 1px !important;"></td>
                <td colspan="2" style="height:1px"></td>
            </tr>
            <tr>
                <td colspan="2" style="height: 1px"></td>
                <td colspan="3" style="background-color: #E8E8E8; height: 1px !important;"></td>
                <td colspan="2" style="height:1px"></td>
            </tr>
            <tr>
                <td colspan="2" style="height: 1px"></td>
                <td colspan="3" style="background-color: #D1D1D1; height: 1px !important;"></td>
                <td colspan="2" style="height:1px"></td>
            </tr>
            <tr>
                <td style="background-color: #F8F8F8; width: 1px !important;"></td>
                <td style="background-color: #E8E8E8; width: 1px !important;"></td>
                <td style="background-color: #D1D1D1; width: 1px !important;"></td>
                <td>
                    <div class="header-mail">
                        <img src="{{ asset('uploads/icons/logo.png') }}" height="30px" alt="">
                    </div>
                    <div class="body-mail">
                            <p style="font-style: italic; margin-bottom: 20px;">Xin chào <strong>{{$name}}</strong>,</p>
                            <p>Tài khoản của bạn vừa được tạo thành công.</p>
                            <p>Mật khẩu truy cập:</p>
                            <div class="text-center">
                                <h2>{{$password}}</h2>
                            </div>
                            <p>Vì lý do bảo mật, vui lòng đổi mật khẩu ngay sau khi nhận được email này.</p>
                            <p style="font-style: italic; margin-top: 20px;">Trân trọng!</p>
                            <p style="font-style: italic;">Nhóm hỗ trợ March Fashion.</p>
                    </div>
                    <div class="footer-mail">
                            <p style="margin-bottom: 0; line-height: 130%">Bạn nhận được email này vì ai đó đã sử dụng nó để tạo tài khoản trên trang web của chúng tôi. 
                                Nếu bạn không cung cấp địa chỉ email này cho bất kì hoạt động nào với March Fashion, hãy bỏ qua nó.</p>
                            <p style="margin-top: 5px ; line-height: 130%">© March Fashion JSC.,</p>
                    </div>
                </td>
                <td style="background-color: #D1D1D1; width: 1px !important;"></td>
                <td style="background-color: #E8E8E8; width: 1px !important;"></td>
                <td style="background-color: #F8F8F8; width: 1px !important;"></td>
                
            </tr>
            <tr>
                <td colspan="2" style="height: 1px"></td>
                <td colspan="3" style="background-color: #D1D1D1; height: 1px !important;"></td>
                <td colspan="2" style="height:1px"></td>
            </tr>
            <tr>
                <td colspan="2" style="height: 1px"></td>
                <td colspan="3" style="background-color: #E8E8E8; height: 1px !important;"></td>
                <td colspan="2" style="height:1px"></td>
            </tr>
            <tr>
                <td colspan="2" style="height: 1px"></td>
                <td colspan="3" style="background-color: #F8F8F8; height: 1px !important;"></td>
                <td colspan="2" style="height:1px"></td>
            </tr>
        </table>
    </div>
</body>
</html>