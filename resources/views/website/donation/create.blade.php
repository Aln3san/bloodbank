@extends('website.layouts.app')

@section('content')
    <section class="sgin-form container border mb-5">
        <form action="{{ route('website.donations.store') }}" method="post">
            @csrf

            <label for="patient_name">{{ __('messages.case_name') ?? 'Patient name' }}</label>
            <input class="main-font form-control my-4 rounded-0" type="text" name="patient_name" id="patient_name"
                placeholder="{{ __('messages.case_name') ?? 'Patient name' }}" value="{{ old('patient_name') }}" />
            @error('patient_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="patient_age">{{ __('messages.age') ?? 'Age' }}</label>
            <input class="main-font form-control my-4 rounded-0" type="number" name="patient_age" id="patient_age"
                placeholder="{{ __('messages.age') ?? 'Age' }}" value="{{ old('patient_age') }}" />
            @error('patient_age')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="blood_type_id">{{ __('messages.blood_type') }}</label>
            <select class="main-font form-control rounded-0 my-4" name="blood_type_id" id="blood_type_id">
                <option value="">{{ __('messages.choose_blood_type') ?? 'Choose blood type' }}</option>
                @foreach (App\Models\BloodType::all() as $bt)
                    <option value="{{ $bt->id }}" {{ old('blood_type_id') == $bt->id ? 'selected' : '' }}>
                        {{ $bt->name }}</option>
                @endforeach
            </select>
            @error('blood_type_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="bags_number">{{ __('messages.bags_number') ?? 'Bags number' }}</label>
            <input class="main-font form-control my-4 rounded-0" type="number" name="bags_number" id="bags_number"
                placeholder="{{ __('messages.bags_number') ?? 'Bags number' }}" value="{{ old('bags_number') }}"
                min="1" />
            @error('bags_number')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="hospital_name">{{ __('messages.hospital') }}</label>
            <input class="main-font form-control my-4 rounded-0" type="text" name="hospital_name" id="hospital_name"
                placeholder="{{ __('messages.hospital') }}" value="{{ old('hospital_name') }}" />
            @error('hospital_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="city_id">{{ __('messages.city') }}</label>
            <select class="main-font form-control rounded-0 my-4" name="city_id" id="city_id">
                <option value="">{{ __('messages.choose_city') ?? 'Choose city' }}</option>
                @foreach (App\Models\City::all() as $c)
                    <option value="{{ $c->id }}" {{ old('city_id') == $c->id ? 'selected' : '' }}>
                        {{ $c->name }}</option>
                @endforeach
            </select>
            @error('city_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="patient_phone">{{ __('messages.phone') }}</label>
            <input class="main-font form-control my-4 rounded-0" type="text" name="patient_phone" id="patient_phone"
                placeholder="{{ __('messages.phone') }}" value="{{ old('patient_phone') }}" />
            @error('patient_phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            @php
                // Default center (Cairo) when no previous coordinates
                $initLat = old('latitude') ?: 30.0444;
                $initLng = old('longitude') ?: 31.2357;
            @endphp

            <label for="location_map">{{ __('messages.location') ?? 'Location' }}</label>
            <div id="map" style="height: 320px;" class="mb-3"></div>

            {{-- Hidden inputs that will be submitted --}}
            <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude') }}">
            <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude') }}">

            {{-- Readonly display of selected coordinates for user feedback --}}
            <div class="d-flex gap-2 mb-3">
                <input class="main-font form-control" type="text" id="latitude_display" readonly
                    value="{{ old('latitude', $initLat) }}">
                <input class="main-font form-control" type="text" id="longitude_display" readonly
                    value="{{ old('longitude', $initLng) }}">
            </div>
            @error('latitude')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            @error('longitude')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            {{-- Leaflet assets and map initializer --}}
            @push('scripts')
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
                <script>
                    (function() {
                        const initLat = parseFloat({!! json_encode($initLat) !!});
                        const initLng = parseFloat({!! json_encode($initLng) !!});

                        const map = L.map('map').setView([initLat, initLng], 12);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; OpenStreetMap contributors'
                        }).addTo(map);

                        let marker = null;

                        // If previous values exist, place marker
                        const latVal = document.getElementById('latitude').value;
                        const lngVal = document.getElementById('longitude').value;
                        if (latVal && lngVal) {
                            marker = L.marker([parseFloat(latVal), parseFloat(lngVal)]).addTo(map);
                            map.setView([parseFloat(latVal), parseFloat(lngVal)], 13);
                        }

                        function setMarker(lat, lng) {
                            if (marker) {
                                marker.setLatLng([lat, lng]);
                            } else {
                                marker = L.marker([lat, lng]).addTo(map);
                            }
                            document.getElementById('latitude').value = lat;
                            document.getElementById('longitude').value = lng;
                            document.getElementById('latitude_display').value = lat;
                            document.getElementById('longitude_display').value = lng;
                        }

                        // Click map to choose location
                        map.on('click', function(e) {
                            const lat = e.latlng.lat.toFixed(6);
                            const lng = e.latlng.lng.toFixed(6);
                            setMarker(lat, lng);
                        });

                        // Try to use browser geolocation to set initial marker if user hasn't set coords
                        if (!latVal || !lngVal) {
                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(function(pos) {
                                    const lat = pos.coords.latitude.toFixed(6);
                                    const lng = pos.coords.longitude.toFixed(6);
                                    setMarker(lat, lng);
                                    map.setView([lat, lng], 13);
                                }, function() {
                                    // user denied or unavailable, keep default
                                });
                            }
                        }
                    })();
                </script>
            @endpush


            <label for="notes">{{ __('messages.notes') ?? 'Notes' }}</label>
            <textarea class="main-font form-control my-4 rounded-0" name="notes" id="notes" rows="4"
                placeholder="{{ __('messages.notes') ?? 'Notes' }}">{{ old('notes') }}</textarea>
            @error('notes')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <button type="submit"
                class="main-font btn border rounded-0 d-block mx-auto">{{ __('messages.send') ?? 'Send' }}</button>
        </form>
    </section>
@endsection
