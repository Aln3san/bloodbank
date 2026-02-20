<section class="donation-request mb-5 py-5">
    <div class="container">
        <div class="div-title">
            <h2 class="main-font text-center">{{ __('messages.donation_requests') }}</h2>
            <hr />
        </div>
        <div class="div-form">
            <form action="{{ route('website.home') }}" method="get"
                class="d-flex justify-content-center align-items-center">
                <select class="form-control rounded-pill my-2 py-2 me-2" name="blood_type" id="blood-type">
                    <option value="">{{ __('messages.choose_blood_type') }}</option>
                    @isset($bloodTypes)
                        @foreach ($bloodTypes as $bt)
                            <option value="{{ $bt->id }}" {{ request('blood_type') == $bt->id ? 'selected' : '' }}>
                                {{ $bt->name }}
                            </option>
                        @endforeach
                    @endisset
                </select>

                <select class="form-control rounded-pill my-2 py-2 me-2" name="city" id="city">
                    <option value="">{{ __('messages.choose_city') }}</option>
                    @isset($cities)
                        @foreach ($cities as $c)
                            <option value="{{ $c->id }}" {{ request('city') == $c->id ? 'selected' : '' }}>
                                {{ $c->name }}
                            </option>
                        @endforeach
                    @endisset
                </select>

                <button class="btn rounded-circle p-2 bg-white" type="submit" aria-label="search">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
        <div class="div-donation-request">
            @if (isset($donations) && $donations->count())
                @if (app()->getLocale() == 'en')
                    @foreach ($donations as $donation)
                        <div class="one-donation-request d-flex justify-content-between align-items-center mb-4">

                            <div class="d-inline-block">
                                <a href="{{ url('donation-requests/' . $donation->id) }}"
                                    class="donation-request-details btn main-font">{{ __('messages.details') }}</a>
                            </div>
                            <div class="div-donation-blood-type d-flex align-items-center">
                                <div class="ms-3 mt-3">
                                    <p class="main-font">
                                        Case name :<span
                                            class="main-font ps-4">{{ $donation->patient_name ?? ($donation->name ?? '-') }}</span>
                                    </p>
                                    <p class="main-font">
                                        Hospital :<span
                                            class="main-font ps-4">{{ $donation->hospital_name ?? ($donation->hospital ?? '-') }}</span>
                                    </p>
                                    <p class="main-font">
                                        City :<span
                                            class="main-font ps-4">{{ $donation->city->name ?? ($donation->city_name ?? '-') }}</span>
                                    </p>
                                </div>
                                <h3 class="donation-blood-type">
                                    {{ $donation->bloodType->name ?? ($donation->blood_type_id ?? '-') }}</h3>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if (app()->getLocale() == 'ar')
                    @foreach ($donations as $donation)
                        <div class="one-donation-request d-flex justify-content-between align-items-center mb-4">
                            <div class="div-donation-blood-type d-flex align-items-center">
                                <h3 class="donation-blood-type">{{ $donation->bloodType->name ?? ($donation->blood_type_id ?? '-') }}</h3>
                                <div class="ms-3 mt-3">
                                    <p class="main-font">
                                        {{ __('messages.case_name') }} :<span class="main-font ps-4">{{ $donation->patient_name ?? ($donation->name ?? '-') }}</span>
                                    </p>
                                    <p class="main-font">
                                        {{ __('messages.hospital') }} :<span class="main-font ps-4">{{ $donation->hospital_name ?? ($donation->hospital ?? '-') }}</span>
                                    </p>
                                    <p class="main-font">
                                        {{ __('messages.city') }} :<span class="main-font ps-4">{{ $donation->city->name ?? ($donation->city_name ?? '-') }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="d-inline-block">
                                <a href="{{ url('donation-requests/' . $donation->id) }}"
                                    class="donation-request-details btn main-font">{{ __('messages.details') }}</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            @else
                <p class="text-center">{{ __('messages.no_donations') ?? 'No donation requests.' }}</p>
            @endif
        </div>
    </div>
</section>
