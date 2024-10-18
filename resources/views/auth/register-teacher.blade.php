<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Become a Teacher</title>

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.svg">
<link rel="stylesheet" href="{{asset('assets/dashboard/css/owl.carousel.min.css')}}">

<script src="assets/js/theme-script.js" type="3ca33cc9220d7e123107964b-text/javascript"></script>

<link rel="stylesheet" href="{{asset('assets/dashboard/css/bootstrap.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/css/fontawesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/css/all.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/dashboard/css/feather.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/css/style.css')}}">
</head>
<body>

<div class="main-wrapper log-wrap">
<div class="row">

<div class="col-md-6 login-bg">
<div class="owl-carousel login-slide owl-theme">
<div class="welcome-login">
<div class="login-banner">
<img src="{{asset('assets/dashboard/images/login-img.png')}}" class="img-fluid" alt="Logo">
</div>
<div class="mentor-course text-center">
<h2>Welcome to <br>DreamsLMS Courses.</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
</div>
</div>
<div class="welcome-login">
<div class="login-banner">
<img src="{{asset('assets/dashboard/images/login-img.png')}}" class="img-fluid" alt="Logo">
</div>
<div class="mentor-course text-center">
<h2>Welcome to <br>DreamsLMS Courses.</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
</div>
</div>
<div class="welcome-login">
<div class="login-banner">
<img src="{{asset('assets/dashboard/images/login-img.png')}}" class="img-fluid" alt="Logo">
</div>
<div class="mentor-course text-center">
<h2>Welcome to <br>DreamsLMS Courses.</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
</div>
</div>
</div>
</div>

<div class="col-md-6 login-wrap-bg">

<div class="login-wrapper">
<div class="loginbox">
<div class="img-logo">
<img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
<div class="back-home">
<a href="index.html">Back to Home</a>
</div>
</div>
<h1 class="fw-900">Be an Online Tutor</h1>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('register.teacher') }} "  method="POST">
    @csrf

<div class="input-block">
<label class="form-control-label">{{__('Full Name')}}</label>
<input type="text" id="name" name="name"  class="form-control @error('name') is-invalid @enderror" placeholder="Enter your Full Name">
@error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
                </span>
@enderror
</div>

<div class="input-block">
<label class="form-control-label">{{__('Email Address')}}</label>
<input type="email" id="email" name="email" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your email address">
@error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
                </span>
@enderror
</div>

<div class="input-block">
<label class="form-control-label">{{__('Password')}}</label>
<div class="pass-group" id="passwordInput">
<input type="password" name="password" class="form-control @error('password') is-invalid @enderror pass-input" placeholder="Enter your password" required autocomplete="new-password">
<span class="toggle-password feather-eye"></span>
<span class="pass-checked"><i class="feather-check"></i></span>
@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>

<div class="input-block">
    <label class="form-control-label">{{__('Comfirm Password')}}</label>
    <div class="pass-group" id="passwordInput">
    <input id="password-confirm" type="password" name="password_confirmation" class="form-control pass-input" placeholder="Retype your password" required autocomplete="new-password">
    <span class="toggle-password feather-eye"></span>
    <span class="pass-checked"><i class="feather-check"></i></span>

    </div>

<div class="password-strength" id="passwordStrength">
<span id="poor"></span>
<span id="weak"></span>
<span id="strong"></span>
<span id="heavy"></span>
</div>
<div id="passwordInfo"></div>
</div>
<div class="form-check remember-me">
<label class="form-check-label mb-0">
<input class="form-check-input" type="checkbox" name="remember"> I agree to the <a href="term-condition.html">Terms of Service</a> and <a href="privacy-policy.html">Privacy Policy.</a>
</label>
</div>
<div class="d-grid">
<button class="btn btn-primary btn-start" type="submit">{{ __('Register as a Teacher') }}</button>
</div>
  <!-- Hidden role field for teacher -->
  <input type="hidden" name="role" value="teacher">
</form>
</div>
<div class="google-bg text-center">

<p class="mb-0">Already have an account? <a href="login.html">Sign in</a></p>
</div>
</div>

</div>
</div>
</div>


<script src="{{asset('assets/dashboard/js/jquery-3.7.1.min.js')}}" type="3ca33cc9220d7e123107964b-text/javascript"></script>

<script src="{{asset('assets/dashboard/js/bootstrap.bundle.min.js')}}" type="3ca33cc9220d7e123107964b-text/javascript"></script>

<script src="{{asset('assets/dashboard/js/owl.carousel.min.js')}}" type="3ca33cc9220d7e123107964b-text/javascript"></script>

<script src="{{asset('assets/dashboard/js/validation.js')}}" type="3ca33cc9220d7e123107964b-text/javascript"></script>

<script src="{{asset('assets/dashboard/js/script.js')}}" type="3ca33cc9220d7e123107964b-text/javascript"></script>
<script src="{{asset('assets/dashboard/js/rocket-loader.min.js')}}" data-cf-settings="3ca33cc9220d7e123107964b-|49" defer></script>


</body>

</html>
