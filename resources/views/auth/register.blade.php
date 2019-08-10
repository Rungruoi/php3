<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <base href="/" />
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="adminlte/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="{{ route('login') }}"><b>Admin</b>LTE</a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Đăng ký thành viên mới</p>
      @if(isset($agree))<p class="login-box-msg text-danger">{{ $agree }}</p>
      @endif
      @if( $errors->first('checkbox'))
          <span class="invalid-feedback text-danger"><p class="login-box-msg text-danger">{{ $errors->first('checkbox')}}</p></span>
          @endif
      <form action="{{ route('register.add') }}" method="post" novalidate>
        @csrf
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Full name" name="name" value="{{ old('name') }}">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          @if( $errors->first('name'))
          <span class="invalid-feedback text-danger">{{ $errors->first('name')}}</span>
          @endif
        </div>

        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          @if($errors->first('email'))
          <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif
         
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          @if($errors->first('password'))
          <span class="text-danger">{{ $errors->first('password') }}</span>
          @endif
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Retype password" name="repass">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          @if($errors->first('repass'))
          <span class="text-danger">{{ $errors->first('repass') }}</span>
          
          @endif
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox" name="checkbox"> I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="{{ route('facebook.login') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
        <a href="{{ route('login/google') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
      </div>

      <a href="{{ route('login') }}" class="text-center">Tôi đã có tài khoản</a>
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery 3 -->
  <script src="adminlte/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="adminlte/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
</body>
</html>


