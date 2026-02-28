@extends('website.layouts.app')

@section('content')
    <!-- Start Header Page Section -->
    <section class="header-page container border my-5 p-3">
        <span class="main-font">{{ __('messages.home') }}</span>
        <span>/</span>
        <span class="main-font">{{ __('messages.donation_request') }}</span>
        <span>/</span>
        <span class="main-font">{{ __('messages.donation_request') }} : {{ $donation->patient_name }}</span>
    </section>
    <!-- End Header Page Section -->

    <!-- Start Donation Request Details Section -->
    <section class="donation-request-details border mb-3 container">
        <div class="row">
            <div class="col-lg-6 one-donation-request-details my-3">
                <span class="main-font">{{ __('messages.name') }}</span><span
                    class="main-font one-donation-request-details-name">{{ $donation->patient_name }}</span>
            </div>
            <div class="col-lg-6 one-donation-request-details my-3">
                <span class="main-font">{{ __('messages.blood_type') }}</span><span
                    class="main-font one-donation-request-details-name">{{ $donation->bloodType->name }}</span>
            </div>
            <div class="col-lg-6 one-donation-request-details my-3">
                <span class="main-font">{{ __('messages.age') }}</span><span
                    class="main-font one-donation-request-details-name">{{ $donation->patient_age }}</span>
            </div>
            <div class="col-lg-6 one-donation-request-details my-3">
                <span class="main-font">{{ __('messages.required_bags') }}</span><span
                    class="main-font one-donation-request-details-name">{{ __('messages.bags') }}:
                    {{ $donation->bags_number }}</span>
            </div>
            <div class="col-lg-6 one-donation-request-details my-3">
                <span class="main-font">{{ __('messages.hospital') }}</span><span
                    class="main-font one-donation-request-details-name">{{ $donation->hospital_name }}</span>
            </div>
            <div class="col-lg-6 one-donation-request-details my-3">
                <span class="main-font">{{ __('messages.phone') }}</span><span
                    class="main-font one-donation-request-details-name">{{ $donation->patient_phone }}</span>
            </div>
            <div class="col-12 one-donation-request-details my-3">
                <span class="main-font donation-request-hospital">{{ __('messages.hospital_address') }}</span><span
                    class="main-font one-donation-request-details-name donation-request-hospital-name">{{ $donation->city->governorate->name }}-{{ $donation->city->name }}</span>
            </div>
            <a href="#" class="donation-request-details-btn btn main-font w-25 mx-auto my-3">تفاصيل</a>
            <div class="col-12 donation-request-description border">
                <p class="main-font">{{ $donation->notes }}
                </p>
            </div>
            <div class="col-12-donation-request-map mt-4 p-0">
                {{-- <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1437.4124129044276!2d31.37463493945339!3d31.03288793670867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f79c34ce592c17%3A0xd485c27d0eb068aa!2z2YXYs9iq2LTZgdmKINin2YTYtdiv2LE!5e0!3m2!1sar!2seg!4v1758345129331!5m2!1sar!2seg"
                    width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="w-100 border"></iframe> --}}
                <div id="map" style="height: 400px;"></div>
            </div>
        </div>
    </section>
    <!-- End Donation Request Details Section -->
    @push('scripts')
        <script>
            var lat = {{ $donation->latitude }};
            var lng = {{ $donation->longitude }};

            var map = L.map('map').setView([lat, lng], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            L.marker([lat, lng]).addTo(map)
                .bindPopup('Client Location')
                .openPopup();
        </script>
    @endpush
@endsection
