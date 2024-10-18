<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical" data-boxed-layout="boxed" data-card="shadow">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />

  <!-- Core Css -->
  <link rel="stylesheet" href="{{asset('../assets/admin/css/styles.css')}}" />
  <link rel="stylesheet" href="{{asset("../assets/admin/libs/sweetalert2/dist/sweetalert2.min.css")}}">

  <title>SwiftEdge Admin</title>
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <img src="{{asset('../assets/admin/images/logos/logo-icon.svg')}}" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <div id="main-wrapper">
        @include('admin.layout.sidebar')
