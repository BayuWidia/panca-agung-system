<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Panca Agung</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.css')}}">
  <link rel="stylesheet" href="{{asset('theme/css/customedoomels.css')}}">
</head>
<body>
  

<div class="container">
  <div class="main">
    <div class="left" style="padding-top: 5.5%">
      <img src="{{asset('images/pancaagung.png')}}" />
    </div> <!--/ .left -->

    <div class="right">
      <div style="background-color:#FFFFFF;border-style:dashed;border-width:thin;">
        <div class="login-box-body">
          <p class="login-box-msg">Silahkan lakukan proses login</p>
          
          <form action="{{route('login')}}" method="post">
            {!! csrf_field() !!}
            <div class="form-group has-feedback">
              <input name="email" type="text" class="form-control" placeholder="Username">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input name="password" type="password" class="form-control" placeholder="Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-6">
                <button type="reset" class="btn btn-danger btn-block btn-flat">Reset</button>
              </div><!-- /.col -->
              <div class="col-xs-6">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
              </div><!-- /.col -->
            </div>
          </form>
        </div><!-- /.login-box-body -->
      </div>
    </div> <!--/ .right -->
  </div> <!--/ .main -->
</div>
  <h4 style="text-align: center"><strong>Copyright © 2017 <a href="">Panca Agung</a>.</strong> All rights reserved.</h4>
</body>
</html>