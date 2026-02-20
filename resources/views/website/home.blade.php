@extends('website.layouts.app')

@section('content')
    <!-- Start Header Section -->
    @include('website.layouts.sections.home._header')
    <!-- End Header Section -->

    <!-- Start About Us Section -->
    @include('website.layouts.sections.home._about-us')
    <!-- End About Us Section -->

    <!-- Start Articles Section -->
    @include('website.layouts.sections.home._articles')
    <!-- End Articles Section -->

    <!-- Start Donation Request Section -->
    @include('website.layouts.sections.home._donation-request')
    <!-- End Donation Request Section -->

    <!-- Start Call Us Section -->
    @include('website.layouts.sections.home._call-us')
    <!-- End Call Us Section -->

    <!-- Start Our App Section -->
    @include('website.layouts.sections.home._our-app')
    <!-- End Our App Section -->
@endsection
