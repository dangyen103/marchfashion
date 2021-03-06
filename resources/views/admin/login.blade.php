<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard Login | March Fashion</title>

    <!-- Bootstrap -->
    <link href="{{ asset('admin-assets/libs/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('admin-assets/libs/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('admin-assets/libs/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('admin-assets/libs/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('admin-assets/build/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet" >

  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{ asset('admin/login') }}" 
                  method="POST"
                  enctype="multipart/form-data">
              
              <input type="hidden" name="_token" value="{{csrf_token()}}"/>
              
              <h1 class="cl-black">Đăng nhập</h1>

              @if(count($errors)>0)
                  <div class="alert alert-danger alert-dismissible fade in">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      @foreach($errors->all() as $err)
                          {{$err}}<br>
                      @endforeach
                  </div>
              @endif

              @if(session('alert-success'))
                  <div class="alert alert-danger alert-dismissible fade in">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      {{session('alert-success')}}
                  </div>
              @endif

              @if(session('alert-danger'))
                  <div class="alert alert-danger alert-dismissible fade in">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      {{session('alert-danger')}}
                  </div>
              @endif

              <div>
                <input type="email" class="form-control" placeholder="Email" name="email" required />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Mật khẩu" name="password" required />
              </div>

              <button class="btn btn-login submit" type="submit">Đăng nhập</button>

              <div class="clearfix"></div>
            </form>
          </section>

          <div class="text-center">
            <p style="color: #ccc">©2018 March Fashion. All Rights Reserved.</p>
          </div>

        </div>
      </div>
    </div>
  </body>
</html>
