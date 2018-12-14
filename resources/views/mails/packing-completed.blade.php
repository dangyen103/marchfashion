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

        .boder-space-solid{
            display: block !important;
            width: 100% !important;
            height: 5px !important;
            background-color: #eee !important;
            margin-top: 20px !important;
        }

        .order-detai-item{
            display: flex;
            display: -ms-flexbox !important;
            padding: 10px 0 5px 0;
            border-bottom: 1px solid #ddd;
        }

        .prod-img{
            margin-right: 20px;
        }

        .prod-info{
            padding: 5px 0;
        }

        .prod-name{
            font-size: 15px;
            font-weight: 500;
        }

        .prod-price{
            color: red;
            font-size: 15px;
            margin-top: 5px;
        }

        .prod-quantity{
            margin-top: 5px;
            font-size: 13px;
            color: #666;
        }
        
        .cl-red{
            color: red;
        }

        .font-15{
            font-size: 15px;
        }

        .more-detail{
            font-size: 13px;
            color: #fff !important;
            padding: .375rem .5rem;
            border-radius: .5rem;
            background-color: #FF9900;
            text-decoration: none;
        }

        .more-detail:hover,
        .more-detail:active,
        .more-detail:focus{
            color: #fff !important;
            background-color: #ff7300;
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
                        <p style="font-style: italic; margin-bottom: 20px;"><strong>{{ $order->customer->user->name }}</strong> thân mến,</p>
                        <p>Đơn hàng <span style="color: #ff7300;">#{{ str_pad($order->id, 8, '0', STR_PAD_LEFT) }}</span> của bạn đã hoàn tất đóng gói và đang trên đường vận chuyển.  
                            Nhân viên giao hàng sẽ liên lạc với người nhận ngay khi đơn hàng đến nơi.</p>

                        <p style="margin-top: 20px;">Cảm ơn bạn đã mua hàng tại March Fashion.</p>
                        <p style="font-style: italic;">Trân trọng!</p>

                        <div class="boder-space-solid"></div>
                        
                        <div class="order-receiver-info">
                            <h4 style="margin-bottom: 5px;">Thông tin nhận hàng</h4>
                            <div>{{ $order->receiver_name }}</div>
                            <div>{{ $order->receiver_phone }}</div>
                            <div>{{ $order->receiver_address.', '.$order->receiver_district.', '.$order->receiver_city }}</div>
                        </div>

                        <div class="boder-space-solid"></div>
                        
                        <div class="order-detai-group">
                            <h4 style="margin-bottom: 0;">Chi tiết đơn hàng</h4>

                            @foreach ($order->product_details as $item)
                                <div class="order-detai-item">
                                    <div class="prod-img">
                                        <img src="{{ asset("uploads/products/".$item->product->thumbnail) }}" alt="hình ảnh" width="80px">
                                    </div>
                                    <div class="prod-info">
                                        <div class="prod-name">{{ $item->product->name }}</div>
                                        @if ($item->pivot->order_discount > 0)
                                            <div class="prod-price">{{ number_format($item->product->price*(100 - $item->pivot->order_discount)/100, 0, ',', '.') }} ₫
                                                <span style="text-decoration: line-through; color: #aaa; font-size: 13px;">{{ number_format($item->product->price, 0, ',', '.') }} ₫</span>
                                                <span style="color: #aaa; font-size: 13px;">-{{$item->pivot->order_discount}}%</span>
                                            </div>
                                        @else
                                            <div class="prod-price">{{ number_format($item->product->price, 0, ',', '.') }} ₫
                                            </div>
                                        @endif
                                        <div class="prod-quantity">{{ $item->pivot->order_quantity }}</div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>

                        <div class="order-total-info">
                            <h4 style="margin-bottom: 5px; margin-top: 10px;">Tổng cộng</h4>
                            <table style="width: 100%">
                                <tbody>
                                    <tr>
                                        <td>Thành tiền </td>
                                        <td style="text-align: right">{{ number_format($order->total - $order->shipping_price, 0, ',', '.') }} ₫</td>
                                    </tr>
                                    <tr>
                                        <td>Phí vận chuyển </td>
                                        <td style="text-align: right">{{ number_format($order->shipping_price, 0, ',', '.') }} ₫</td>
                                    </tr>
                                    <tr>
                                        <td>Tổng </td>
                                        <td style="text-align: right" class="cl-red font-15">{{ number_format($order->total, 0, ',', '.') }} ₫</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="text-align: center; margin-top: 10px;">
                            <a href="#" class="more-detail">Xem chi tiết</a>
                        </div>
                    </div>
                    <div class="footer-mail">
                        <p style="margin-bottom: 0; line-height: 130%">Bạn nhận được email này vì đã thực hiện mua hàng trên website của chúng tôi. 
                            Nếu bạn không cung cấp địa chỉ email này cho bất kì hoạt động nào của March Fashion, hãy bỏ qua nó.</p>
                        <p style="margin-top: 5px ; line-height: 130%">© March Fashion JSC., Tầng 19, Tòa nhà Hanoi Centre, số 168 Cầu Giấy, Quận Cầu Giấy, Hà Nội.
                        Hotline: 6686 8080.</p>
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