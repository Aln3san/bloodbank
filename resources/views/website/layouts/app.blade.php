<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href={{ asset('website/css/all.min.css') }} />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href={{ asset('website/css/owl.carousel.min.css') }} />
    <link rel="stylesheet" href={{ asset('website/css/owl.theme.default.min.css') }} />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{ asset('website/css/bootstrap.rtl.min.css') }} />
    <!-- Style CSS -->
    <link rel="stylesheet" href={{ asset('website/css/style.css') }} />
    <link rel="stylesheet" href={{ asset('website/css/responsive.css') }} />
    <title>بنك الدم</title>
</head>

<body>
    <!-- Start Sup Navbar Section -->
    <section class="sup-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 sup-navbar-language text-center">
                    <a href="#"><span class="main-font language-active">عربي</span></a>
                    <span>|</span>
                    <a href="#"><span class="main-font">EN</span></a>
                </div>
                <div class="col-lg-4 sup-navbar-socials text-center">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
                <div class="col-lg-4 sup-navbar-contact text-center">
                    <a href="#"><span>+2455454544545 <i class="fa-solid fa-phone"></i></span></a>
                    <span>|</span>
                    <a href="#"><span>name@name.com <i class="fa-solid fa-envelope"></i></span></a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Sup Navbar Section -->

    <!-- Start Navbar Section -->
    <nav class="navbar navbar-expand-xl">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src={{ asset('website/imgs/logo.png') }} alt="" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link main-font active" aria-current="page"
                            href="index.html">{{ __('messages.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link main-font" href="#">{{ __('messages.about_blood_bank') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link main-font" href="#">{{ __('messages.articles') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link main-font" href="#">{{ __('messages.donations') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link main-font" href="about-us.html">{{ __('messages.about_us') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link main-font" href="#">{{ __('messages.contact_us') }}</a>
                    </li>
                </ul>
                <div class="navbar-register">
                    <a href="sgin-in.html" class="main-font">{{ __('messages.create_new_account') }}</a>
                    <a href="log-in.html" class="main-font btn">{{ __('messages.login') }}</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar Section -->

    @yield('content')

    <!-- Start Footer Section -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <img src={{ asset('website/imgs/logo.png') }} />
                    <h5 class="main-font my-4">{{ __('messages.blood_bank') }}</h5>
                    <p class="footer-blood-bank-description main-font">
                        {{ __('messages.example_text') }}
                    </p>
                </div>
                <div class="col-lg-4 mb-5">
                    <ul>
                        <li class="main-font active"><a href="#">{{ __('messages.home') }}</a></li>
                        <li class="main-font"><a href="#">{{ __('messages.about_blood_bank') }}</a></li>
                        <li class="main-font"><a href="#">{{ __('messages.articles') }}</a></li>
                        <li class="main-font"><a href="#">{{ __('messages.donation_requests') }}</a></li>
                        <li class="main-font"><a href="#">{{ __('messages.about_us') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 footer-download mb-5">
                    <p class="main-font main-color text-end">{{ __('messages.available_on') }}</p>
                    <a href="#"><img src={{ asset('website/imgs/google1.png') }}
                            class="d-block mb-3 mt-5 pt-4 ms-auto" /></a>
                    <a href="#"><img src={{ asset('website/imgs/ios1.png') }} class="d-block ms-auto" /></a>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <div class="container d-flex justify-content-between">
                <div class="copy-right-social mt-2">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
                <div class="mt-3">
                    <p class="main-font text-white">
                        {{ __('messages.all_rights_reserved') }} <span
                            class="main-color">{{ __('messages.blood_bank') }}</span> @
                        2019
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Section -->

    <!-- Jquery Js -->
    <script src={{ asset('website/js/jquery.min.js.js') }}></script>
    <!-- Owl Carousel Js -->
    <script src={{ asset('website/js/owl.carousel.min.js') }}></script>
    <script src={{ asset('website/js/owl-caruosel.js') }}></script>
    <!-- Font Awesome Js -->
    <script src={{ asset('website/js/all.min.js') }}></script>
    <!-- Botstrap Js -->
    <script src={{ asset('website/js/bootstrap.bundle.min.js') }}></script>
</body>

</html>
