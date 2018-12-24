<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.jpg">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>36zero | cpanel</title>
    <!-- CSS -->
    <link href="admin/assets/vendors/material-icons/material-icons.css" rel="stylesheet" type="text/css">
    <link href="admin/assets/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.4/sweetalert2.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.1.3/mediaelementplayer.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.7.0/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="admin/assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- Head Libs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>

<body class="body-bg-full profile-page" style="background-image: url({{ asset('admin/assets/img/night.jpg') }})">
    <div id="wrapper" class="row wrapper">
        <div class="col-md-8 text-inverse d-none d-sm-block">
            <div class="login-left-inner">
                <div class="login-content">
                    <h3 class="mr-b-20 sub-heading-font-family fw-400">Welcome To 36ZERO CPANEL</h3>
                    <p><small>
                        A Creative Digital Marketing Agency...
                        We love the web and the work we do. We work closely with our clients to deliver the best possible solution for their needs.
                    </small>
                </p>
            </div>
        </div>
        <!-- /.login-left-inner -->
    </div>
    <!-- /.login-left -->
    <div class="col-10 ml-auto ml-sm-auto col-sm-8 col-md-4 login-right float-right">
        <div class="navbar-header text-center">
            <a href="/cpanel">
                <img alt="" src="{{ asset('images/logo2.jpg') }}">
            </a>
        </div>
        <br>
        <!-- /.navbar-header -->
        <form method="POST" action="{{ route('cpanel-login') }}" class="form-material">
            {{ csrf_field() }}
            <div class="form-group">
                <input id="email" type="email" placeholder="e.g johndoe@site.com" class="form-control form-control-line{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif 
                <label for="example-email">Email</label>
            </div>
            <div class="form-group">
                <input id="password" type="password" placeholder="password" class="form-control form-control-line{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
                <label>Password</label>
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-lg btn-color-scheme ripple" type="submit">Login</button>
            </div>
            <div class="form-group no-gutters mb-0">
                <div class="col-md-12 d-flex">
                    <div class="checkbox checkbox-info mr-auto">
                        <label class="d-flex">
                           <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> <span class="label-text">Remember me</span>
                       </label>
                   </div>
                   @if (Route::has('password.request'))
                   <a class="my-auto pb-2 text-right"href="{{ route('password.request') }}">
                     <i class="fa fa-lock mr-1"></i>Forgot Password?</a>
                 </a>
                 @endif
             </div>
             <!-- /.row -->
         </div>
         <!-- /.form-group -->
     </form>
     <!-- /.form-material -->
     <hr>
 </div>
 <!-- /.login-right -->
</div>
<!-- /.body-container -->
<!-- Scripts -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('admin/assets/js/material-design.js') }}"></script>
</body>

</html>