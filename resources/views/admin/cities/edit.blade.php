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
                    <li class="breadcrumb-item active">{{ __('messages.cities_list') }}</li>
                    <li class="breadcrumb-item active">{{ __('messages.update_city') }}</li>
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
                        <h3 class="card-title">{{ __('messages.update_city') }}</h3>
                        <a href={{ route('cities.index') }} class="btn btn-primary btn-sm ml-auto"><i
                                class="fas fa-home"></i></a>
                    </div>
                    <form action={{ url(route('cities.update', $city->id)) }} method="POST">
                        @csrf
                        @method('PUT')
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card card-primary">
                                <!-- /.card-header -->
                                <!-- form start -->

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">{{ __('messages.city_name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $city->name }}" placeholder="{{ __('messages.city_name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="governorate_id">{{ __('messages.governorate_id') }}</label>
                                        <select name="governorate_id" id="governorate_id" class="form-control">
                                            <option selected disabled>Choose Governorate</option>
                                            @foreach ($governorates as $governorate)
                                                <option value={{ $governorate->id }}>{{ $governorate->name }}</option>
                                            @endforeach
                                        </select>
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
