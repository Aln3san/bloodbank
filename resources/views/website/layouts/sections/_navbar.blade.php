<nav class="navbar navbar-expand-xl" dir="ltr">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @switch(app()->getLocale())
            @case('ar')
                {{-- محتوى العربي --}}
                 @guest
                        <div class="navbar-register">
                            <a href="sgin-in.html" class="main-font">{{ __('messages.create_new_account') }}</a>
                            <a href={{ route('website.login') }} class="main-font btn">{{ __('messages.login') }}</a>
                        </div>
                    @endguest
                    @auth('website')
                        <div class="navbar-donation-request">
                            <a href="donation-request.html" class="main-font btn"><span
                                    class="ps-3">{{ __('messages.donation_requests') }}</span><img
                                    src={{ asset('website/imgs/blood-donation.png') }} />
                            </a>
                        </div>
                    @endauth
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link main-font active" aria-current="page"
                                href={{ route('website.home') }}>{{ __('messages.home') }}</a>
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
                    
                    <a class="navbar-brand" href={{ route('website.home') }}>
                    <img src={{ asset('website/imgs/logo.png') }} alt="" />
                </a>
                </div>
            @break

            @case('en')
                {{-- محتوى الانجليزي --}}
                <a class="navbar-brand" href={{ route('website.home') }}>
                    <img src={{ asset('website/imgs/logo-ltr.png') }} alt="" />
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link main-font active" aria-current="page"
                                href={{ route('website.home') }}>{{ __('messages.home') }}</a>
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
                </div>
                @guest
                    <div class="navbar-register">
                        <a href="sgin-in.html" class="main-font">{{ __('messages.create_new_account') }}</a>
                        <a href={{ route('website.login') }} class="main-font btn">{{ __('messages.login') }}</a>
                    </div>
                @endguest
                @auth('website')
                    <div class="navbar-donation-request">
                        <a href="donation-request.html" class="main-font btn"><span
                                class="ps-3">{{ __('messages.donation_requests') }}</span><img
                                src={{ asset('website/imgs/blood-donation.png') }} />
                        </a>
                    </div>
                @endauth
            @break

        @endswitch


    </div>
</nav>
