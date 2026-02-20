<section class="sup-navbar">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 sup-navbar-language text-center">
                <a href={{ route('change.language', 'ar') }}><span class="main-font {{ app()->getLocale() == 'ar' ? 'language-active' : '' }}">عربي</span></a>
                <span>|</span>
                <a href={{ route('change.language', 'en') }}><span class="main-font {{ app()->getLocale() == 'en' ? 'language-active' : '' }}">EN</span></a>
            </div>
            <div class="col-lg-4 sup-navbar-socials text-center">
                <a href={{ $settings->fb_url }}><i class="fa-brands fa-facebook-f"></i></a>
                <a href={{ $settings->insta_url }}><i class="fa-brands fa-instagram"></i></a>
                <a href={{ $settings->x_url }}><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
            @guest
                <div class="col-lg-4 sup-navbar-contact text-center">
                    <a href="#"><span>+2455454544545 <i class="fa-solid fa-phone"></i></span></a>
                    <span>|</span>
                    <a href="#"><span>name@name.com <i class="fa-solid fa-envelope"></i></span></a>
                </div>
            @endguest
            @auth('website')
                <div class="col-lg-4 sup-navbar-contact text-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="text-warning">{{ __('messages.welcome') }}</span> احمد محمد
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <i class="fa-solid fa-house"></i>
                                        <p class="mt-3 ms-2">{{ __('messages.home') }}</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <i class="fa-regular fa-user"></i>
                                        <p class="mt-3 ms-2">{{ __('messages.profile') }}</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <i class="fa-regular fa-bell"></i>
                                        <p class="mt-3 ms-2">{{ __('messages.notifications_settings') }}</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <i class="fa-regular fa-heart"></i>
                                        <p class="mt-3 ms-2">{{ __('messages.favorites') }}</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <i class="fa-regular fa-comments"></i>
                                        <p class="mt-3 ms-2">{{ __('messages.reports') }}</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <i class="fa-solid fa-phone-flip"></i>
                                        <p class="mt-3 ms-2">{{ __('messages.contact_us') }}</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        <p class="mt-3 ms-2">{{ __('messages.logout') }}</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </div>
            @endauth
        </div>
    </div>
</section>
