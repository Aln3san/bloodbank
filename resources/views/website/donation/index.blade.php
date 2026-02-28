@extends('website.layouts.app', [
    'bodyClass' => 'sgin-in-body',
])


@section('content')
    <!-- Start Header Page Section -->
    <section class="header-page container border my-5 p-3">
        <span class="main-font">{{ __('messages.home') }}</span>
        <span>/</span>
        <span class="main-font">{{ __('messages.donation_request') }}</span>
    </section>
    <!-- End Header Page Section -->
    @if ($donations->isNotEmpty())

        @if (app()->getLocale() == 'en')
            <section class="donation-request mb-5 py-5">
                <div class="container">
                    <div class="div-title">
                        <h2 class="main-font text-center">{{ __('messages.donation_requests') }}</h2>
                        <hr />
                    </div>
                    <div class="div-form">
                        <form action="{{ url()->current() }}" method="get">
                            <select class="form-control rounded-pill my-2 py-2" name="blood_type" id="blood-type">
                                <option value="">{{ __('messages.select_blood_type') ?? 'اختر فصيلة الدم' }}</option>
                                @foreach ($blood_types as $bt)
                                    <option value="{{ $bt->id }}"
                                        {{ request('blood_type') == $bt->id ? 'selected' : '' }}>{{ $bt->name }}
                                    </option>
                                @endforeach
                            </select>
                            <select class="form-control rounded-pill my-2 py-2" name="city" id="city">
                                <option value="">{{ __('messages.select_city') }}</option>
                                @foreach ($cities as $c)
                                    <option value="{{ $c->id }}" {{ request('city') == $c->id ? 'selected' : '' }}>
                                        {{ $c->name }}</option>
                                @endforeach
                            </select>

                            <button class="btn rounded-circle p-2 bg-white" type="submit">
                                <span class="text-black px-1"><i class="fa-solid fa-magnifying-glass"></i></span>
                            </button>
                        </form>
                    </div>
                    <div class="div-donation-request">
                        @foreach ($donations as $donation)
                            <div class="one-donation-request d-flex justify-content-between align-items-center mb-4">
                                <div class="div-donation-blood-type d-flex align-items-center">
                                    <h3 class="donation-blood-type">
                                        {{ $donation->bloodType->name ?? ($donation->blood_type_id ?? '-') }}</h3>
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
                                </div>
                                <div class="d-inline-block">
                                    <a href="{{ route('website.donations.show', $donation->id) }}"
                                        class="donation-request-details btn main-font">{{ __('messages.details') }}</a>
                                </div>

                            </div>
                        @endforeach
                    </div>
                    {{ $donations->links('website.layouts.sections.pagination') }}
                </div>
            </section>
        @endif
        @if (app()->getLocale() == 'ar')
            <section class="donation-request mb-5 py-5">
                <div class="container">
                    <div class="div-title">
                        <h2 class="main-font text-center">{{ __('messages.donation_requests') }}</h2>
                        <hr />
                    </div>
                    <div class="div-form">
                        <form action="{{ url()->current() }}" method="get">
                            <select class="form-control rounded-pill my-2 py-2" name="blood_type" id="blood-type">
                                <option value="">{{ __('messages.select_blood_type') ?? 'اختر فصيلة الدم' }}</option>
                                @foreach ($blood_types as $bt)
                                    <option value="{{ $bt->id }}"
                                        {{ request('blood_type') == $bt->id ? 'selected' : '' }}>{{ $bt->name }}
                                    </option>
                                @endforeach
                            </select>
                            <select class="form-control rounded-pill my-2 py-2" name="city" id="city">
                                <option value="">{{ __('messages.select_city') ?? 'اختر المدينه' }}</option>
                                @foreach ($cities as $c)
                                    <option value="{{ $c->id }}" {{ request('city') == $c->id ? 'selected' : '' }}>
                                        {{ $c->name }}</option>
                                @endforeach
                            </select>

                            <button class="btn rounded-circle p-2 bg-white" type="submit">
                                <span class="text-black px-1"><i class="fa-solid fa-magnifying-glass"></i></span>
                            </button>
                        </form>
                    </div>
                    <div class="div-donation-request">
                        @foreach ($donations as $donation)
                            <div class="one-donation-request d-flex justify-content-between align-items-center mb-4">
                                <div class="div-donation-blood-type d-flex align-items-center">
                                    <h3 class="donation-blood-type">
                                        {{ $donation->bloodType->name ?? ($donation->blood_type_id ?? '-') }}</h3>
                                    <div class="ms-3 mt-3">
                                        <p class="main-font">
                                            {{ __('messages.case_name') }} :<span
                                                class="main-font ps-4">{{ $donation->patient_name ?? ($donation->name ?? '-') }}</span>
                                        </p>
                                        <p class="main-font">
                                            {{ __('messages.hospital') }} :<span
                                                class="main-font ps-4">{{ $donation->hospital_name ?? ($donation->hospital ?? '-') }}</span>
                                        </p>
                                        <p class="main-font">
                                            {{ __('messages.city') }} :<span
                                                class="main-font ps-4">{{ $donation->city->name ?? ($donation->city_name ?? '-') }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-inline-block">
                                    <a href="{{ route('website.donations.show', $donation->id) }}"
                                        class="donation-request-details btn main-font">{{ __('messages.details') }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $donations->links('website.layouts.sections.pagination') }}
                </div>
            </section>
        @endif
    @else
        <p class="text-center">{{ __('messages.no_donations') ?? 'No donation requests.' }}</p>
    @endif


@endsection
