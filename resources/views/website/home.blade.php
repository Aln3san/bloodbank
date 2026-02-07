@extends('website.layouts.app')

@section('content')
    <!-- Start Header Section -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-12 ms-auto">
                    <div class="header-slider owl-carousel owl-theme">
                        <div>
                            <h1 class="main-font main-color">
                                {{ __('messages.blood_bank_forward_for_better_health') }}
                            </h1>
                            <p class="main-font">
                                {{ __('messages.example_text') }} <br />
                                {{ __('messages.example_text_2') }} <br />
                                {{ __('messages.example_text_3') }}
                            </p>
                            <a href="#" class="read-more btn rounded-0">{{ __('messages.more') }}</a>
                        </div>
                        <div>
                            <h1 class="main-font main-color">
                                {{ __('messages.blood_bank_forward_for_better_health') }}
                            </h1>
                            <p class="main-font">
                                {{ __('messages.example_text') }} <br />
                                {{ __('messages.example_text_2') }} <br />
                                {{ __('messages.example_text_3') }}
                            </p>
                            <a href="#" class="read-more btn rounded-0">{{ __('messages.more') }}</a>
                        </div>
                        <div>
                            <h1 class="main-font main-color">
                                {{ __('messages.blood_bank_forward_for_better_health') }}
                            </h1>
                            <p class="main-font">
                                {{ __('messages.example_text') }} <br />
                                {{ __('messages.example_text_2') }} <br />
                                {{ __('messages.example_text_3') }}
                            </p>
                            <a href="#" class="read-more btn rounded-0">{{ __('messages.more') }}</a>
                        </div>
                        <div>
                            <h1 class="main-font main-color">
                                {{ __('messages.blood_bank_forward_for_better_health') }}
                            </h1>
                            <p class="main-font">
                                {{ __('messages.example_text') }} <br />
                                {{ __('messages.example_text_2') }} <br />
                                {{ __('messages.example_text_3') }}
                            </p>
                            <a href="#" class="read-more btn rounded-0">{{ __('messages.more') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header Section -->

    <!-- Start About Us Section -->
    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <p class="main-font">
                        <span class="main-color">{{ __('messages.blood_bank') }}</span>
                        {{ __('messages.example_text') }}
                        {{ __('messages.example_text_2') }}
                        {{ __('messages.example_text_3') }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Section -->

    <!-- Start Articles Section -->
    <section class="articles my-5 py-5">
        <div class="container">
            <h2 class="articles-title main-font main-color">{{ __('messages.articles') }}</h2>
            <hr />
            <div class="articles-slider owl-carousel owl-theme">
                <div class="card rounded-0">
                    <a href="#" class="articles-love"><i class="fa-regular fa-heart"></i></a>
                    <img src={{ asset('website/imgs/p1.jpg') }} class="card-img-top" />
                    <div class="card-body">
                        <h5 class="card-title main-font main-color">
                            {{ __('messages.methods_of_preventing_diseases') }}
                        </h5>
                        <p class="card-text main-font">
                            {{ __('messages.example_text') }}
                        </p>
                        <a href="#"
                            class="articles-details main-font btn rounded-0 d-block mx-auto">{{ __('messages.details') }}</a>
                    </div>
                </div>
                <div class="card rounded-0">
                    <a href="#" class="articles-love"><i class="fa-regular fa-heart"></i></a>
                    <img src={{ asset('website/imgs/p2.jpg') }} class="card-img-top" />
                    <div class="card-body">
                        <h5 class="card-title main-font main-color">
                            {{ __('messages.methods_of_preventing_diseases') }}
                        </h5>
                        <p class="card-text main-font">
                            {{ __('messages.example_text') }}
                        </p>
                        <a href="#"
                            class="articles-details main-font btn rounded-0 d-block mx-auto">{{ __('messages.details') }}</a>
                    </div>
                </div>
                <div class="card rounded-0">
                    <a href="#" class="articles-love"><i class="fa-regular fa-heart"></i></a>
                    <img src={{ asset('website/imgs/p1.jpg') }} class="card-img-top" />
                    <div class="card-body">
                        <h5 class="card-title main-font main-color">
                            {{ __('messages.methods_of_preventing_diseases') }}
                        </h5>
                        <p class="card-text main-font">
                            {{ __('messages.example_text') }}
                        </p>
                        <a href="#"
                            class="articles-details main-font btn rounded-0 d-block mx-auto">{{ __('messages.details') }}</a>
                    </div>
                </div>
                <div class="card rounded-0">
                    <a href="#" class="articles-love"><i class="fa-regular fa-heart"></i></a>
                    <img src={{ asset('website/imgs/p2.jpg') }} class="card-img-top" />
                    <div class="card-body">
                        <h5 class="card-title main-font main-color">
                            {{ __('messages.methods_of_preventing_diseases') }}
                        </h5>
                        <p class="card-text main-font">
                            {{ __('messages.example_text') }}
                        </p>
                        <a href="#"
                            class="articles-details main-font btn rounded-0 d-block mx-auto">{{ __('messages.details') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Articles Section -->

    <!-- Start Donation Request Section -->
    <section class="donation-request mb-5 py-5">
        <div class="container">
            <div class="div-title">
                <h2 class="main-font text-center">Donation Requests</h2>
                <hr />
            </div>
            <div class="div-form">
                <form action="#" method="get">
                    <select class="form-control rounded-pill my-2 py-2" name="blood-type" id="blood-type">
                        <option value="" disabled selected>{{ __('messages.choose_blood_type') }}</option>
                        <option value="1">A+</option>
                    </select>
                    <select class="form-control rounded-pill my-2 py-2" type="text" name="city" id="city">
                        <option value="" disabled selected>{{ __('messages.choose_city') }}</option>
                        <option value="1">Al-Mansoura</option>
                    </select>

                    <button class="btn rounded-circle p-2 bg-white" type="submit">
                        <a href="#"><i class="fa-brands fa-search"></i></a>
                    </button>
                </form>
            </div>
            <div class="div-donation-request">
                <div class="one-donation-request d-flex justify-content-between align-items-center mb-4">
                    <div class="div-donation-blood-type d-flex algin-items-center">
                        <h3 class="donation-blood-type">+B</h3>
                        <div class="ms-3 mt-3">
                            <p class="main-font">
                                Case name :<span class="main-font ps-4">احمد محمد احمد</span>
                            </p>
                            <p class="main-font">
                                Hospital :<span class="main-font ps-4">القصر العيني</span>
                            </p>
                            <p class="main-font">
                                City :<span class="main-font ps-4">المنصوره</span>
                            </p>
                        </div>
                    </div>
                    <div class="d-inline-block">
                        <a href="#" class="donation-request-details btn main-font">{{ __('messages.details') }}</a>
                    </div>
                </div>
                <div class="one-donation-request d-flex justify-content-between align-items-center mb-4">
                    <div class="div-donation-blood-type d-flex algin-items-center">
                        <h3 class="donation-blood-type">+A</h3>
                        <div class="ms-3 mt-3">
                            <p class="main-font">
                                Case name :<span class="main-font ps-4">احمد محمد احمد</span>
                            </p>
                            <p class="main-font">
                                Hospital :<span class="main-font ps-4">القصر العيني</span>
                            </p>
                            <p class="main-font">
                                City :<span class="main-font ps-4">المنصوره</span>
                            </p>
                        </div>
                    </div>
                    <div class="d-inline-block">
                        <a href="#" class="donation-request-details btn main-font">{{ __('messages.details') }}</a>
                    </div>
                </div>
                <div class="one-donation-request d-flex justify-content-between align-items-center mb-4">
                    <div class="div-donation-blood-type d-flex algin-items-center">
                        <h3 class="donation-blood-type">+AB</h3>
                        <div class="ms-3 mt-3">
                            <p class="main-font">
                                Case name :<span class="main-font ps-4">احمد محمد احمد</span>
                            </p>
                            <p class="main-font">
                                Hospital :<span class="main-font ps-4">القصر العيني</span>
                            </p>
                            <p class="main-font">
                                City :<span class="main-font ps-4">المنصوره</span>
                            </p>
                        </div>
                    </div>
                    <div class="d-inline-block">
                        <a href="#" class="donation-request-details btn main-font">{{ __('messages.details') }}</a>
                    </div>
                </div>
                <div class="one-donation-request d-flex justify-content-between align-items-center mb-4">
                    <div class="div-donation-blood-type d-flex algin-items-center">
                        <h3 class="donation-blood-type">-O</h3>
                        <div class="ms-3 mt-3">
                            <p class="main-font">
                                Case name :<span class="main-font ps-4">احمد محمد احمد</span>
                            </p>
                            <p class="main-font">
                                Hospital :<span class="main-font ps-4">القصر العيني</span>
                            </p>
                            <p class="main-font">
                                City :<span class="main-font ps-4">المنصوره</span>
                            </p>
                        </div>
                    </div>
                    <div class="d-inline-block">
                        <a href="#" class="donation-request-details btn main-font">{{ __('messages.details') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Donation Request Section -->

    <!-- Start Call Us Section -->
    <section class="call-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="call-us-title main-font main-color mb-5">{{ __('messages.call_us') }}</h3>
                    <p class="main-font">
                        {{ __('messages.call_us_description') }}
                    </p>
                    <a href="#" class="whats-app">
                        <p class="main-font">1215454551 <span class="ps-4">+002</span></p>
                        <img src={{ asset('website/imgs/whats.png') }} />
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call Us Section -->

    <!-- Start Our App Section -->
    <section class="our-app">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <h3 class="our-app-title main-font mb-5">{{ __('messages.blood_bank_app') }}</h3>
                    <p>
                        {{ __('messages.example_text') }}
                    </p>
                    <p class="main-font">{{ __('messages.available_on') }}</p>
                    <div class="our-app-download">
                        <a href="#"><img src={{ asset('website/imgs/google.png') }} class="mx-2" /></a>
                        <a href="#"><img src={{ asset('website/imgs/ios.png') }} class="mx-2" /></a>
                    </div>
                </div>
                <div class="our-app-img col-xl-6 mt-4">
                    <img src={{ asset('website/imgs/App.png') }} class="d-block m-auto" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Our App Section -->
@endsection
