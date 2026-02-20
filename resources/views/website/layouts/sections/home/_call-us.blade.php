<section class="call-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="call-us-title main-font main-color mb-5">{{ __('messages.call_us') }}</h3>
                    <p class="main-font">
                        {{ __('messages.call_us_description') }}
                    </p>
                    <a href="#" class="whats-app">
                        <p class="main-font">{{ $settings->phone }}</p>
                        <img src={{ asset('website/imgs/whats.png') }} />
                    </a>
                </div>
            </div>
        </div>
    </section>