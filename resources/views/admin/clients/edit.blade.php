@extends('admin.layout.main')

@section('page_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('messages.dashboard') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href={{ route('dashboard') }}>{{ __('messages.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('messages.clients_list') }}</li>
                    <li class="breadcrumb-item active">{{ __('messages.update_client') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">{{ __('messages.update_client') }}</h3>
                        <a href={{ route('clients.index') }} class="btn btn-primary btn-sm ml-auto"><i class="fas fa-home"></i></a>
                    </div>
                    <form action="{{ route('clients.update', $client->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">{{ __('messages.client_name') }}</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="{{ __('messages.client_name') }}" value="{{ $client->name }}">
                                                   @error('name')
                                                       <div class="text-danger">{{ $message }}</div>
                                                   @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">{{ __('messages.client_phone') }}</label>
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                    placeholder="{{ __('messages.client_phone') }}" value="{{ $client->phone }}">
                                                   @error('phone')
                                                       <div class="text-danger">{{ $message }}</div>
                                                   @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">{{ __('messages.client_email') }}</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="{{ __('messages.client_email') }}" value="{{ $client->email }}">
                                                   @error('email')
                                                       <div class="text-danger">{{ $message }}</div>
                                                   @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">{{ __('messages.client_password') }}</label>
                                                <input type="password" class="form-control" id="password" name="password"
                                                    placeholder="{{ __('messages.client_password') }}">
                                                   @error('password')
                                                       <div class="text-danger">{{ $message }}</div>
                                                   @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password_confirmation">{{ __('messages.client_password') }}</label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                                    placeholder="{{ __('messages.client_password') }}">
                                                   @error('password_confirmation')
                                                       <div class="text-danger">{{ $message }}</div>
                                                   @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">{{ __('messages.client_dob') }}</label>
                                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $client->date_of_birth }}">
                                                   @error('date_of_birth')
                                                       <div class="text-danger">{{ $message }}</div>
                                                   @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="blood_type_id">{{ __('messages.client_blood_type') }}</label>
                                                <select name="blood_type_id" id="blood_type_id" class="form-control">
                                                    <option selected disabled>{{ __('messages.client_blood_type') }}</option>
                                                    @foreach($blood_types as $type)
                                                        <option value="{{ $type->id }}" {{ $client->blood_type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                                   @error('blood_type_id')
                                                       <div class="text-danger">{{ $message }}</div>
                                                   @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="last_donation_date">{{ __('messages.client_last_donation_date') }}</label>
                                                <input type="date" class="form-control" id="last_donation_date" name="last_donation_date" value="{{ $client->last_donation_date }}">
                                                   @error('last_donation_date')
                                                       <div class="text-danger">{{ $message }}</div>
                                                   @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="city_id">{{ __('messages.client_city') }}</label>
                                                <select name="city_id" id="city_id" class="form-control">
                                                    <option selected disabled>{{ __('messages.client_city') }}</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{ $city->id }}" data-governorate="{{ $city->governorate_id }}" {{ $client->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                                   @error('city_id')
                                                       <div class="text-danger">{{ $message }}</div>
                                                   @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                        <!-- /.card-footer -->
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
                        </div>

                    </form>

                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    
@endsection
