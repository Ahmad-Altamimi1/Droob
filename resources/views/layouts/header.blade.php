<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>News Details - Andtourtravel </title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}" />
    <!-- animate css -->
    <link rel="stylesheet" href="{{ url('assets/css/animate.min.css') }}" />
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="{{ url('assets/css/fontawesome.all.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ url('assets/css/owl.carousel.min.css') }}" />
    <!-- Slick css -->
    <link rel="stylesheet" type="{{ url('text/css" href="assets/css/slick.min.css') }}" />
    <!--slick-theme.css-->
    <link rel="stylesheet" type="{{ url('text/css" href="assets/css/slick-theme.css') }}" />
    <!-- Rangeslider css -->
    <link rel="stylesheet" href="{{ url('assets/css/nouislider.css') }}" />
    <!-- owl.theme.default css -->
    <link rel="stylesheet" href="{{ url('assets/css/owl.theme.default.min.css') }}" />
    <!-- navber css -->
    <link rel="stylesheet" href="{{ url('assets/css/navber.css') }}" />
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{ url('assets/css/meanmenu.css') }}" />
    <!-- Style css -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" />
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ url('assets/css/responsive.css') }}" />
    <!-- Favicon -->
    
</head>

<body>
    <!-- preloader Area -->
  

    <!-- Header Area -->

    <header class="main_header_arae">
        <!-- Top Bar -->
        <div class="topbar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <ul class="topbar-list">
                            <li>
                                <a href="#!"><i class="fab fa-facebook"></i></a>
                                <a href="#!"><i class="fab fa-twitter-square"></i></a>
                                <a href="#!"><i class="fab fa-instagram"></i></a>
                                <a href="#!"><i class="fab fa-linkedin"></i></a>
                            </li>
                            <li><a href="#!"><span>+011 234 567 89</span></a></li>
                            <li><a href="#!"><span>contact@domain.com</span></a></li>

                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <ul class="topbar-others-options">
                            <li><a href="{{ route('login') }}">تسجيل الدخول</a></li>/
                            <li> <a href="{{ route('register') }}">ليس لديك حساب ؟</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar Bar -->
        <div class="navbar-area">
            <div class="main-responsive-nav">
                <div class="container">
                    <div class="main-responsive-menu">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('images/logo_f.png') }}" alt="logo" width="60px">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-navbar">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                       
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="nav-link">
                                        الصفحه الرئيسيه
                                    </a>
                                </li>
                              
                             
                            </ul>
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                   
                                     <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset('images/logo_f.png') }}" alt="logo" width="60px">
                        </a>
                                </div>
                                    {{-- <div class="option-item">
                                        <a href="become-vendor.html" class="btn  btn_navber">Become a partner</a>
                                    </div> --}}
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu">
                        <div class="inner">
                            <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="option-inner">
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                </div>
                                <div class="option-item">
                                    <a href="contact.html" class="btn  btn_navber"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
