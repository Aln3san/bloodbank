<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

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
    {{-- <link rel="stylesheet" href={{ asset('website/css/style.css') }} /> --}}
    <link rel="stylesheet" href="{{ asset(app()->getLocale() == 'en' ? 'website/css/style.css' : 'website/css/style-rtl.css') }}">
    <link rel="stylesheet" href={{ asset('website/css/responsive.css') }} />
    <title>{{ __('messages.blood_bank') }}</title>
</head>

<body>
    <!-- Start Sup Navbar Section -->
    @include('website.layouts.sections._sup_navbar')
    <!-- End Sup Navbar Section -->

    <!-- Start Navbar Section -->
    @include('website.layouts.sections._navbar')
    <!-- End Navbar Section -->

    @yield('content')

    <!-- Start Footer Section -->
    @include('website.layouts.sections._footer')
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
