@extends('layouts.index')

@section('content')

    <div class="container-fluid get-started-group">
        <div class="get-started-form">
            <form action="{{ asset('get-started') }}"
                    method="POST">

                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                <div class="">
                    <div class="get-started-title">Chờ một chút, hãy để March Fashion mang lại trải nghiệm mua sắm tuyệt vời cho bạn!</div>
                    <div class="mt-3">Các câu hỏi sau sẽ giúp chúng tôi hiểu phong cách thời trang nào có thể phù hợp với bạn.</div>
                </div>
                <div class="question-row mt-3">
                    <label class="question-content">Bạn cảm thấy thoải mái nhất là khi mặc những trang phục?</label>
                    <div class="">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer1" id="" value="a">
                            <label class="form-check-label">
                                Váy, áo dài tha thướt, mềm mại
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer1" id="" value="b">
                            <label class="form-check-label" >
                                Áo len, áo khoác cardigan
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer1" id="" value="c">
                            <label class="form-check-label">
                                Đồ bơi, bikini
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer1" id="" value="d">
                            <label class="form-check-label" for="">
                                Đồ mô-đen, đang hợp mốt nhất
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer1" id="" value="e">
                            <label class="form-check-label" for="">
                                Áo sơ-mi, T-shirt và quần jeans
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer1" id="" value="f">
                            <label class="form-check-label" for="">
                                Một bộ đồ kín đáo
                            </label>
                        </div>
                    </div>
                </div>
                <div class="question-row mt-3">
                    <label class="question-content">Khi không phải đến văn phòng làm việc, bạn muốn lánh mình ở đâu?</label>
                    <div class="">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer2" id="" value="a">
                            <label class="form-check-label" for="">
                                Trong một kỳ nghỉ lãng mạn
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer2" id="" value="b">
                            <label class="form-check-label" for="">
                                Tham gia một trận đấu thể thao
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer2" id="" value="c">
                            <label class="form-check-label" for="">
                                Thả mình trên bãi biển
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer2" id="" value="d">
                            <label class="form-check-label" for="">
                                Hòa nhập vào đám đông nhộn nhịp
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer2" id="" value="e">
                            <label class="form-check-label" for="">
                                Ở nhà, tổ chức một bữa tiệc tối thân mật
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer2" id="" value="f">
                            <label class="form-check-label" for="">
                                Chơi cùng bọn trẻ
                            </label>
                        </div>
                    </div>
                </div>
                <div class="question-row mt-3">
                    <label class="question-content">Loại phụ kiện nào bạn thường chọn dùng nhất?</label>
                    <div class="">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer3" id="" value="a">
                            <label class="form-check-label" for="">
                                Một chiếc vòng tay 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer3" id="" value="b">
                            <label class="form-check-label" for="">
                                Dây đeo ngọc trai
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer3" id="" value="c">
                            <label class="form-check-label" for="">
                                Đồ dùng tiện lợi đi biển hay leo núi
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer3" id="" value="d">
                            <label class="form-check-label" for="">
                                Chiếc túi xách đời mới
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer3" id="" value="e">
                            <label class="form-check-label" for="">
                                Kính mát đen, to bản
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer3" id="" value="f">
                            <label class="form-check-label" for="">
                                Túi xách to chứa nhiều vật dụng thiết yếu
                            </label>
                        </div>
                    </div>
                </div>
                <div class="question-row mt-3">
                    <label class="question-content">Đôi giày thường ngày bạn thường chọn để mang là?</label>
                    <div class="">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer4" id="" value="a">
                            <label class="form-check-label" for="">
                                Dép kẹp 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer4" id="" value="b">
                            <label class="form-check-label" for="">
                                Giày lười
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer4" id="" value="c">
                            <label class="form-check-label" for="">
                                Đi chân không
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer4" id="" value="d">
                            <label class="form-check-label" for="">
                                Giày cao gót
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer4" id="" value="e">
                            <label class="form-check-label" for="">
                                Giày đế bằng
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer4" id="" value="f">
                            <label class="form-check-label" for="">
                                Giày thể thao
                            </label>
                        </div>
                    </div>
                </div>
                <div class="question-row mt-3">
                    <label class="question-content">Bạn thường có xu hướng chọn màu trang phục là gì?</label>
                    <div class="">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer5" id="" value="a">
                            <label class="form-check-label" for="">
                                Hầu hết là màu trắng
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer5" id="" value="b">
                            <label class="form-check-label" for="">
                                Màu xanh biển nhiều hơn
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer5" id="" value="c">
                            <label class="form-check-label" for="">
                                Màu sắc thường là tươi sáng
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer5" id="" value="d">
                            <label class="form-check-label" for="">
                                Màu đen từ đầu đến chân
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer5" id="" value="e">
                            <label class="form-check-label" for="">
                                Thường là màu trung tính 
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="answer5" id="" value="f">
                            <label class="form-check-label" for="">
                                Màu tối được ưu tiên hơn.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="question-row mt-3">
                    <label class="question-content">Và cuối cùng, trung bình bạn dành bao nhiêu tiền cho một sản phẩm thời trang?</label>
                    <div class="">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="spend_money" id="" value="low">
                            <label class="form-check-label" for="">
                                dưới 500.000 ₫
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="spend_money" id="" value="medium">
                            <label class="form-check-label" for="">
                                từ 500.000 – 1.000.000 ₫
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="spend_money" id="" value="high">
                            <label class="form-check-label" for="">
                                trên 1.000.000 ₫
                            </label>
                        </div>
                    </div>
                </div>
                <div class="txt-center mt-3">
                    <a href="{{ asset('') }}" class="btn btn-light mr-3">Hủy</a>
                    <button type="submit" class="btn btn-dark">Gửi</button>
                </div>
            </form>
        </div>
    </div>

@endsection