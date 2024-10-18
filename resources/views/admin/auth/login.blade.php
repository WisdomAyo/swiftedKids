
<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/png" href="{{asset("../assets/admin/images/logos/favicon.png")}}" />

  <!-- Core Css -->
  <link rel="stylesheet" href="{{asset("../assets/admin/css/styles.css")}}" />

  <title>Xtreme Bootstrap Admin</title>
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <img src="{{asset("../assets/admin/images/logos/logo.png")}}" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <div id="main-wrapper" class="auth-customizer-none">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
      <div class="position-relative z-3">
        <div class="row">
          <div class="col-xl-7 col-xxl-8">
            <a href="/" class="text-nowrap logo-img d-flex align-items-center px-4 py-9 w-100">
              <b class="logo-icon">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img src="{{asset("../assets/admin/images/logo.png")}}" alt="homepage" class="dark-logo"  width="150" height="50"/>
                <!-- Light Logo icon -->
                {{-- <img src="{{asset("../assets/admin/images/logo.png")}}" alt="homepage" class="light-logo" /> --}}
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              {{-- <span class="logo-text">
                <!-- dark Logo text -->
                <img src="{{asset("../assets/admin/images/logo.png")}}" alt="homepage" class="dark-logo ps-2" />
                <!-- Light Logo text -->
                <img src="{{asset("../assets/admin/images/logo.png")}}" class="light-logo ps-2" alt="homepage" />
              </span> --}}
            </a>
            <div class="d-none d-xl-flex align-items-center justify-content-center h-n80">
              <img src="{{asset("../assets/admin/images/backgrounds/login-security.svg")}}" alt="xtreme-img" class="img-fluid" width="600">
            </div>
          </div>
          <div class="col-xl-5 col-xxl-4">

            <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
              <div class="auth-max-width  col-sm-8 col-md-6 col-xl-9">
                      <!-- Form START -->
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
                <h2 class="mb-1 fs-7 fw-bolder">Welcome Back</h2>



                <form  method="POST"  action="{{ route('admin.login') }}">
                    @csrf

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>

                    <input type="email" class="form-control border-0 bg-light rounded-end ps-1" placeholder="E-mail" name="email">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>

                    <input type="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="password"  name="password">
                  </div>
                    <button type="submit" class="btn btn-primary">Sign In</button>


                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
  function handleColorTheme(e) {
    document.documentElement.setAttribute("data-color-theme", e);
  }
</script>


    </div>
    <!--  Search Bar -->

  </div>
  <div class="dark-transparent sidebartoggler"></div>
  <!-- Import Js Files -->
  <script src="{{ asset("../assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>
  <script src="{{ asset("../assets/admin/libs/simplebar/dist/simplebar.min.js")}}"></script>
  <script src="{{ asset("../assets/admin/js/theme/app.init.js")}}"></script>
  <script src="{{ asset("../assets/admin/js/theme/theme.js")}}"></script>
  <script src="{{asset("../assets/admin/js/theme/app.min.js")}}"></script>
  <script src="{{asset("../assets/admin/js/theme/feather.min.js")}}"></script>

  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
