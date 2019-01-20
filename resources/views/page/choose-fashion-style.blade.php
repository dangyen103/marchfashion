@extends('layouts.index')

@section('content')

    <div class="container-fluid get-started-group">
        <div class="get-started-form">
            <form action="{{ asset('get-started/choose-fashion-style') }}"
                    method="POST">

                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                <div class="">
                    <div class="get-started-title">Hãy lựa chọn hình ảnh giống với phong cách thời trang của bạn nhất!</div>
                </div>
                <div class="row question-row mt-4 px-3">
                    @if (in_array('Bohemian', $fashion_styles))
                        <div class="col-md-6 box">
                            <label class="btn btn-light">
                                <img src="{{ asset('imgs/Bohemian.jpg') }}" alt="..." class="img-thumbnail img-check">
                                <input type="radio" 
                                        name="fashion_style" 
                                        id="fashionStyleRadio" 
                                        value="Bohemian" 
                                        class="hidden" 
                                        autocomplete="off">
                            </label>
                        </div>
                    @endif

                    @if (in_array('Preppy', $fashion_styles))
                        <div class="col-md-6 box">
                            <label class="btn btn-light">
                                <img src="{{ asset('imgs/Preppy.jpg') }}" alt="..." class="img-thumbnail img-check">
                                <input type="radio" 
                                        name="fashion_style" 
                                        id="fashionStyleRadio" 
                                        value="Preppy" 
                                        class="hidden" 
                                        autocomplete="off">
                            </label>
                        </div>
                    @endif

                    @if (in_array('Surferchic', $fashion_styles))
                        <div class="col-md-6 box">
                            <label class="btn btn-light">
                                <img src="{{ asset('imgs/Surferchic.jpg') }}" alt="..." class="img-thumbnail img-check">
                                <input type="radio" 
                                        name="fashion_style" 
                                        id="fashionStyleRadio" 
                                        value="Surfer chic" 
                                        class="hidden" 
                                        autocomplete="off">
                            </label>
                        </div>
                    @endif

                    @if (in_array('Fashionista', $fashion_styles))
                        <div class="col-md-6 box">
                            <label class="btn btn-light">
                                <img src="{{ asset('imgs/Fashionista.jpg') }}" alt="..." class="img-thumbnail img-check">
                                <input type="radio" 
                                        name="fashion_style" 
                                        id="fashionStyleRadio" 
                                        value="Fashionista" 
                                        class="hidden" 
                                        autocomplete="off">
                            </label>
                        </div>
                    @endif
                    
                    @if (in_array('Classic', $fashion_styles))
                        <div class="col-md-6 box">
                            <label class="btn btn-light">
                                <img src="{{ asset('imgs/Classic.jpg') }}" alt="..." class="img-thumbnail img-check">
                                <input type="radio" 
                                        name="fashion_style" 
                                        id="fashionStyleRadio" 
                                        value="Classic" 
                                        class="hidden" 
                                        autocomplete="off">
                            </label>
                        </div>
                    @endif
                    
                    @if (in_array('Suburbanite', $fashion_styles))
                        <div class="col-md-6 box">
                            <label class="btn btn-light">
                                <img src="{{ asset('imgs/Suburbanite.jpg') }}" alt="..." class="img-thumbnail img-check">
                                <input type="radio" 
                                        name="fashion_style" 
                                        id="fashionStyleRadio" 
                                        value="Suburbanite" 
                                        class="hidden" 
                                        autocomplete="off">
                            </label>
                        </div>
                    @endif
                </div>

                <div class="txt-center mt-3">
                    <a href="{{ asset('') }}" class="btn btn-light mr-3">Hủy</a>
                    <button type="submit" class="btn btn-dark">Gửi</button>
                </div>
            </form>
        </div>
    </div>

@endsection