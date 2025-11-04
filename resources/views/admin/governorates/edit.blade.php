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
                    <li class="breadcrumb-item active">{{ __('messages.governorates_list') }}</li>
                    <li class="breadcrumb-item active">{{ __('messages.governorates_list_update') }}</li>
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
                        <h3 class="card-title">{{ __('messages.governorates_list_update') }}</h3>
                        <a href={{ route('governorates.index') }} class="btn btn-primary btn-sm ml-auto"><i
                                class="fas fa-home"></i></a>
                    </div>
                    <form action={{ url(route('governorates.update', $governorate->id)) }} method="POST">
                        @csrf
                        @method('PUT')
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card card-primary">
                                <!-- /.card-header -->
                                <!-- form start -->

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">{{ __('messages.governorate_name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $governorate->name }}"
                                            placeholder="{{ __('messages.governorate_name') }}">
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
