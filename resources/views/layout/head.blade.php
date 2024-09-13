
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    @if(App::environment('production'))
        @include('home.seo')
    @else
    <title>SwiftEdge</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('logo.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset("assets/plugins/fontawesome/css/fontawesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/fontawesome/css/all.min.css")}}">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/owl.theme.default.min.css")}}">

    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{asset("assets/plugins/slick/slick.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/slick/slick-theme.css")}}">
    <link rel="stylesheet" href="{{asset("assets/bootstrap-icons/bootstrap-icons.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/glightbox.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/tiny-slider.css")}}">
    <!-- Aos CSS -->
    <link rel="stylesheet" href="{{asset("assets/plugins/aos/aos.css")}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/style1.css")}}">

</head>

<body class="body-home-one">
<!-- Main Wrapper -->
<div class="main-wrapper">


