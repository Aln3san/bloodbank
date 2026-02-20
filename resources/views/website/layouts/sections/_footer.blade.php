<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5">
                    @if(app()->getLocale() == 'en')
                        <img src={{ asset('website/imgs/logo-ltr.png') }} />
                    @else
                        <img src={{ asset('website/imgs/logo.png') }} />
                    @endif
                    <h5 class="main-font my-4">{{ __('messages.blood_bank') }}</h5>
                    <p class="footer-blood-bank-description main-font">
                        {{ __('messages.example_text') }}
                    </p>
                </div>
                <div class="col-lg-4 mb-5">
                    <ul>
                        <li class="main-font active"><a href="{{ route('website.home') }}">{{ __('messages.home') }}</a></li>
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
                    <a href={{ $settings->fb_url }}><i class="fa-brands fa-facebook-f"></i></a>
                    <a href={{ $settings->insta_url }}><i class="fa-brands fa-instagram"></i></a>
                    <a href={{ $settings->x_url }}><i class="fa-brands fa-twitter"></i></a>
                    <a href={{ $settings->phone }}><i class="fa-brands fa-whatsapp"></i></a>
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