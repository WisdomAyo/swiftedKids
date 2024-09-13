{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@include('home.main')

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kiddino - Children School & Kindergarten HTML Template - Home One</title>
    <meta name="author" content="Vecuro">
    <meta name="description" content="Kiddino - Children School & Kindergarten HTML Template">
    <meta name="keywords" content="Kiddino - Children School & Kindergarten HTML Template">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&family=Jost:wght@400;500&display=swap" rel="stylesheet">


    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css")}}">
    <!-- <link rel="stylesheet" href="assets/css/app.min.css"> -->
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset("assets/css/fontawesome.min.css")}}">
    <!-- Layerslider -->
    <link rel="stylesheet" href="{{ asset("assets/css/layerslider.min.css")}}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset("assets/css/magnific-popup.min.css")}}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset("assets/css/slick.min.css")}}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset("assets/css/style.css")}}">

</head>

<body>



<section >
    <div class="container">
        <div class="row">
            <div class="col-xl-auto col-xxl-6 d-none d-md-block">
                <div class="img-box6">
                    <div class="img-1 mega-hover"><img src="assets/img/about/con-1-1.jpg" alt="image"></div>
                    <div class="img-2 mega-hover"><img src="assets/img/about/con-1-2.jpg" alt="image"></div>
                </div>
            </div>
            <div class="col-xl col-xxl-6 align-self-center">
                <h2 class="sec-title mb-3">Welcome Back </h2>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="list-style1">
                            <ul class="list-unstyled mb-0">
                                <li>Assign practice exercises</li>
                                <li>Track student progress</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="list-style1">
                            <ul class="list-unstyled">
                                <li>Videos and articles</li>
                                <li>Continue with you Course </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <form action="{{ route('login') }}" class="form-style3" method="POST">
                    @csrf
                    <div class="row justify-content-between">


                        <div class=" form-group">
                            <label>Email <span class="required" value="__('Email')">(Required)</span></label>
                            <input type="email" id="email"   name="email" :value="old('email')" required autofocus autocomplete="email"  class=" @error('email') is-invalid @enderror">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        </div>
                        <div class=" form-group">
                            <label>Password</label>
                            <input type="password" id="password" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @if (Route::has('password.request'))
                                   <label for="" class=""> <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a></label>
                                @endif
                        </div>

                        <div class="col-auto align-self-center form-group">
                            <input type="checkbox"  name="notice" id="remember_me" type="checkbox">
                            <label for="notice">Notify Your child weekly progress</label>
                        </div>

                        <div class="col-auto form-group">
                            <button class="vs-btn" type="submit">Login</button>
                        </div>
                    </div>
                </form>

                    <label for="notice">Don't Have  Acount yet   <a href="{{route('register')}}"> Register Now</a></label>

            </div>
        </div>
    </div>
</section>


<script src="{{ asset("assets/js/vendor/jquery-3.6.0.min.js")}}"></script>
<!-- Slick Slider -->
<script src="{{ asset("assets/js/slick.min.js")}}"></script>
<!-- <script src="assets/js/app.min.js"></script> -->
<!-- Layerslider -->
<script src="{{ asset("assets/js/layerslider.utils.js")}}"></script>
<script src="{{ asset("assets/js/layerslider.transitions.js")}}"></script>
<script src="{{ asset("assets/js/layerslider.kreaturamedia.jquery.js")}}"></script>
<!-- jquery ui -->
<script src="{{ asset("assets/js/jquery-ui.min.js")}}"></script>
<!-- Bootstrap -->
<script src="{{ asset("assets/js/bootstrap.min.js")}}"></script>
<!-- Magnific Popup -->
<script src="{{ asset("assets/js/jquery.magnific-popup.min.js")}}"></script>
<!-- Isotope Filter -->
<script src="{{ asset("assets/js/imagesloaded.pkgd.min.js")}}"></script>
<script src="{{ asset("assets/js/isotope.pkgd.min.js")}}"></script>
<!-- Main Js File -->
<script src= "{{ asset("assets/js/main.js")}}"></script>
</body>
</html>


