@extends('website.layouts.app')

@section('content')
    <!-- Start Header Page Section -->
    <section class="header-page container border my-5 p-3">
        <span class="main-font">{{ __('messages.home') }}</span>
        <span>/</span>
        <span class="main-font">{{ __('messages.about_us') }}</span>
    </section>
    <!-- End Header Page Section -->

    <!--  Start Header Page Section -->
    <section class="about-us-page container border">
        @if (app()->getLocale() == 'en')
            <img src="{{ asset('website/imgs/logo-ltr.png') }}" class="d-block mx-auto" />
        @else
            <img src="{{ asset('website/imgs/logo.png') }}" class="d-block mx-auto" />
        @endif
        <p class="main-font">
            {{ $about->about_app }}
        </p>
    </section>
    <!-- End Header Page Section -->
@endsection
