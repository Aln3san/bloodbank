@extends('website.layouts.app', [
    'bodyClass' => 'sgin-in-body'
])

@section('content')
    <!-- Start Sgin Form Section -->
    <section class="sgin-form container border mb-5">
        <form action="{{ route('website.profile.update', auth('website')->user()->id) }}" method="post">
            @csrf
            @method('PUT')

            <label for="name">{{ __('messages.name') }}</label>
            <input class="main-font form-control my-4 rounded-0" type="text" name="name" id="name"
                placeholder="{{ __('messages.name') }}" value="{{ old('name', auth('website')->user()->name ?? '') }}" />

            <label for="email">{{ __('messages.email') }}</label>
            <input class="main-font form-control my-4 rounded-0" type="text" name="email" id="email"
                placeholder="{{ __('messages.email') }}" value="{{ old('email', auth('website')->user()->email ?? '') }}" />

            <label for="date_of_birth" class="main-font">{{ __('messages.date_of_birth') }}</label>
            <input class="main-font form-control my-4 rounded-0" type="date" name="date_of_birth" id="date_of_birth"
                value="{{ old('date_of_birth', auth('website')->user()->date_of_birth ?? '') }}" />

            <label for="blood_type_id">{{ __('messages.blood_type') }}</label>
            <select class="main-font form-control rounded-0 my-4" name="blood_type_id" id="blood_type_id">
                <option value="" disabled selected>{{ __('messages.choose_blood_type') }}</option>
                @foreach (App\Models\BloodType::all() as $bt)
                    <option value="{{ $bt->id }}"
                        {{ old('blood_type_id', auth('website')->user()->blood_type_id ?? '') == $bt->id ? 'selected' : '' }}>
                        {{ $bt->name }}</option>
                @endforeach
            </select>

            <label for="governorate_id">{{ __('messages.governorates') }}</label>
            <select class="main-font form-control rounded-0 my-4" name="governorate_id" id="governorate_id">
                <option value="" disabled
                    {{ old('governorate_id', auth('website')->user()->governorate_id ?? '') ? '' : 'selected' }}>
                    {{ __('messages.choose_governorate') }}</option>
                @foreach ($governorates as $gov)
                    <option value="{{ $gov->id }}"
                        {{ old('governorate_id', auth('website')->user()->governorate_id ?? '') == $gov->id ? 'selected' : '' }}>
                        {{ $gov->name }}</option>
                @endforeach
            </select>

            <label for="city_id">{{ __('messages.cities') }}</label>
            <select class="main-font form-control rounded-0 my-4" name="city_id" id="city_id">
                <option value="" disabled
                    {{ old('city_id', auth('website')->user()->city_id ?? '') ? '' : 'selected' }}>
                    {{ __('messages.cities') }}</option>
            </select>

            <label for="phone">{{ __('messages.phone') }}</label>
            <input class="main-font form-control my-4 rounded-0" type="text" name="phone" id="phone"
                placeholder="{{ __('messages.phone') }}"
                value="{{ old('phone', auth('website')->user()->phone ?? '') }}" />

            <label for="last_donation_date" class="main-font">{{ __('messages.last_donation_date') }}</label>
            <input class="main-font form-control my-4 rounded-0" type="date" name="last_donation_date"
                id="last_donation_date"
                value="{{ old('last_donation_date', auth('website')->user()->last_donation_date ?? '') }}" />

            <label for="password">{{ __('messages.password') }}</label>
            <input class="main-font form-control my-4 rounded-0" type="password" name="password" id="password"
                placeholder="{{ __('messages.password') }}" />

            <label for="password_confirmation">{{ __('messages.password_confirmation') }}</label>
            <input class="main-font form-control my-4 rounded-0" type="password" name="password_confirmation"
                id="password_confirmation" placeholder="{{ __('messages.confirm_password') }}" />

            <button type="submit"
                class="main-font btn border rounded-0 d-block mx-auto">{{ __('messages.update') }}</button>
        </form>
    </section>
    <!-- End Sgin Form Section -->
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const govSelect = document.getElementById('governorate_id');
                const citySelect = document.getElementById('city_id');
                const oldCity = '{{ old('city_id', auth('website')->user()->city_id ?? '') }}';

                if (!govSelect) return;

                // if an old governorate is selected (from validation), load its cities
                const initialGov = govSelect.value;
                if (initialGov) loadCities(initialGov, oldCity);

                govSelect.addEventListener('change', function() {
                    const govId = this.value;
                    loadCities(govId);
                });

                function loadCities(govId, selectCityId = null) {
                    citySelect.innerHTML = '<option value="" disabled selected>{{ __('messages.cities') }}</option>';
                    if (!govId) return;

                    fetch(`/api/v1/cities?governorate_id=${govId}`)
                        .then(r => r.json())
                        .then(json => {
                            console.log('cities API response:', json);
                            const cities = json?.data?.Cities || json?.Cities || [];

                            // enable select and populate
                            citySelect.removeAttribute('disabled');

                            if (!cities.length) {
                                const opt = document.createElement('option');
                                opt.value = '';
                                opt.textContent = '{{ __('messages.no_cities') ?? 'No cities' }}';
                                opt.disabled = true;
                                opt.selected = true;
                                citySelect.appendChild(opt);
                                return;
                            }

                            cities.forEach(city => {
                                const opt = document.createElement('option');
                                opt.value = city.id;
                                opt.textContent = city.name;
                                if (selectCityId && selectCityId == city.id) opt.selected = true;
                                citySelect.appendChild(opt);
                            });
                        })
                        .catch(e => console.error('Failed to load cities', e));
                }
            });
        </script>
    @endpush
@endsection
