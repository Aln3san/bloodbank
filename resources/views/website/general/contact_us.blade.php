@extends('website.layouts.app')

@section('content')
    <!-- Start Header Page Section -->
    <section class="header-page container border my-5 p-3">
        <span class="main-font">{{ __('messages.home') }}</span>
        <span>/</span>
        <span class="main-font">{{ __('messages.contact_us') }}</span>
    </section>
    <!-- End Header Page Section -->

    <!-- Start Contact Us Section -->
    <section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="call-us-title">
                        <p class="main-font">اتصل بنا</p>
                    </div>
                    <div class="contact-details border">
                        @if (app()->getLocale() == 'ar')
                            <img src="{{ asset('website/imgs/logo.png') }}" class="contact-details-img d-block mx-auto" />
                        @else
                            <img src="{{ asset('website/imgs/logo-ltr.png') }}"
                                class="contact-details-img d-block mx-auto" />
                        @endif
                        <hr />
                        <p class="main-font">{{ __('messages.phone') }} : <span>124123412312</span></p>
                        <p class="main-font">{{ __('messages.fax') }} : <span>24254554</span></p>
                        <p class="main-font">
                            {{ __('messages.email') }} : <span>name@name.com</span>
                        </p>
                        <p class="main-font main-color text-center mt-5">{{ __('messages.contact_us') }}</p>
                        <div class="socials">
                            <a href="#"><img src="{{ asset('website/imgs/006-google-plus.svg') }}" /></a>
                            <a href="#"><img src="{{ asset('website/imgs/005-whatsapp.svg') }}" /></a>
                            <a href="#"><img src="{{ asset('website/imgs/004-instagram.svg') }}" /></a>
                            <a href="#"><img src="{{ asset('website/imgs/003-youtube.svg') }}" /></a>
                            <a href="#"><img src="{{ asset('website/imgs/002-twitter.svg') }}" /></a>
                            <a href="#"><img src="{{ asset('website/imgs/001-facebook.svg') }}" /></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="call-us-title">
                        <p class="main-font">{{ __('messages.contact_us') }}</p>
                    </div>
                    <div class="contact-form border">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('website.contact.store') }}" method="post">
                            @csrf
                            <input class="form-control main-font rounded-0 @error('name') is-invalid @enderror" type="text" name="name" id="name"
                                placeholder="{{ __('messages.name') }}" value="{{ old('name') }}" />
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror

                            <input class="form-control main-font rounded-0 @error('email') is-invalid @enderror" type="text" name="email" id="email"
                                placeholder="{{ __('messages.email') }}" value="{{ old('email') }}" />
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror

                            <input class="form-control main-font rounded-0 @error('phone') is-invalid @enderror" type="text" name="phone" id="phone"
                                placeholder="{{ __('messages.phone') }}" value="{{ old('phone') }}" />
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror

                            <input class="form-control main-font rounded-0 @error('subject') is-invalid @enderror" type="text" name="subject"
                                id="subject" placeholder="{{ __('messages.message_title') }}" value="{{ old('subject') }}" />
                            @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror

                            <textarea class="form-control main-font rounded-0 @error('message') is-invalid @enderror" name="message" id="message"
                                placeholder="{{ __('messages.message') }}">{{ old('message') }}</textarea>
                            @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror

                            <button type="submit" class="btn main-font d-block w-100 text-center rounded-0 mt-4">
                                {{ __('messages.send') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Us Section -->
@endsection
