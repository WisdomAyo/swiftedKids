<!DOCTYPE html>
<html lang="en">

<head>
	<title>SwiftEdge</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="">
	<meta name="description" content="SwiftEdge">



	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&amp;family=Roboto:wght@400;500;700&amp;display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tagify/3.22.3/tagify.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/3.22.3/tagify.min.js"></script>


	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendor/font-awesome/css/all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/vendor/bootstrap-icons/bootstrap-icons.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/vendor/apexcharts/css/apexcharts.css')}}">


	<link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/css/style2.css')}}">
    

</head>

<body>
    <header class="navbar-light navbar-sticky">
        <!-- Logo Nav START -->
        <nav class="navbar navbar-expand-xl">
            <div class="container">
                <!-- Logo START -->
                <a class="navbar-brand" href="index-2.html">
                    <img class="light-mode-item navbar-brand-item" src="{{asset('assets/img/logo.png')}}" alt="logo">
                    <img class="dark-mode-item navbar-brand-item" src="{{asset('assets/img/logo.png')}}" alt="logo">
                </a>
                <!-- Logo END -->

                <!-- Responsive navbar toggler -->
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-animation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <!-- Main navbar START -->
                <div class="navbar-collapse w-100 collapse" id="navbarCollapse">

                    <!-- Nav Main menu START -->
                    <ul class="navbar-nav navbar-nav-scroll mx-auto">
                        <!-- Nav item 1 Demos -->
                        <li class="nav-item dropdown"><a class="nav-link" href="/"  aria-expanded="false">Home</a></li>
                        <li class="nav-item dropdown"><a class="nav-link" href="{{route('about')}}"  aria-expanded="false">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('courses')}}"   aria-expanded="false">Course</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('class')}}">Classes</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('tutor')}}"   aria-expanded="false">Find A Tutor</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
                    </ul>

                </div>
                <!-- Main navbar END -->

                <!-- Profile START -->
                @auth
                <!-- Profile Dropdown for Logged-In Users -->
                <div class="dropdown ms-1 ms-lg-0 col-auto d-none d-xl-block">
                    <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="avatar-img rounded-circle" src="{{auth()->user()->profile_image  ? asset('storage/' . auth()->user()->profile_image) : asset('assets/images/avatar/default.jpg')}}" alt="" width="50" height="50">
                    </a>
                    <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                        <!-- Profile Info -->
                        <li class="px-3 mb-3 sub-menu">
                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <div class="avatar me-3">
                                    <img class=" rounded-circle shadow" src="{{auth()->user()->profile_image  ? asset('storage/' . auth()->user()->profile_image) : asset('assets/images/avatar/default.jpg')}}" alt="avatar" width="40" height="40">
                                </div>
                                <div>
                                    <a class="h6 " href="#">{{ Auth::user()->name }}  <span class="small m-0">{{ Auth::user()->role === 'teacher' ? 'Teacher' : 'Student' }}</span> </a> <!-- User's name -->
                                    <!-- Display if the user is a teacher or student -->
                                    <p class="small m-0">{{ Auth::user()->email }}</p> <!-- User's email -->
                                </div>
                            </div>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <!-- Links -->
                        <li>
                            <a class="dropdown-item" href="{{ Auth::user()->role === 'teacher' ? route('teacher.dashboard') : route('student.dashboard') }}">
                                <i class="bi bi-person fa-fw me-2"></i>Dashboard
                            </a>
                        </li>
                        @if(Auth::user()->role === 'teacher')
                        <!-- Only show the "Add Course" link if the user is a teacher -->
                        <li>
                            <a class="dropdown-item" href="">
                                <i class="bi bi-gear fa-fw me-2"></i>Add Course
                            </a>
                        </li>
                        @endif
                        <li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
                        <li>
                            <a class="dropdown-item bg-danger-soft-hover" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-power fa-fw me-2"></i>Sign Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                    </ul>
                </div>
                @endauth
                <!-- Profile START -->
            </div>
        </nav>
        <!-- Logo Nav END -->
    </header>
