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
                    <li class="breadcrumb-item active">{{ __('messages.settings') }}</li>
                    <li class="breadcrumb-item active">{{ __('messages.update_setting') }}</li>
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
                        <h3 class="card-title">{{ __('messages.update_setting') }}</h3>
                        <a href={{ route('settings.index') }} class="btn btn-primary btn-sm ml-auto"><i
                                class="fas fa-home"></i></a>
                    </div>
                    <form action={{ url(route('settings.update', $setting->id)) }} method="POST">
                        @csrf
                        @method('PUT')
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card card-primary">
                                <!-- /.card-header -->
                                <!-- form start -->

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="fb_url">{{ __('messages.about_app') }}</label>
                                        <input type="text" class="form-control" id="about_app" name="about_app"
                                            value="{{ $setting->about_app }}" placeholder="{{ __('messages.about_app') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('messages.email') }}</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="{{ $setting->email }}" placeholder="{{ __('messages.email') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">{{ __('messages.phone') }}</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="{{ $setting->phone }}" placeholder="{{ __('messages.phone') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="fb_url">{{ __('messages.fb_url') }}</label>
                                        <input type="text" class="form-control" id="fb_url" name="fb_url"
                                            value="{{ $setting->fb_url }}" placeholder="{{ __('messages.fb_url') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="x_url">{{ __('messages.x_url') }}</label>
                                        <input type="text" class="form-control" id="x_url" name="x_url"
                                            value="{{ $setting->x_url }}" placeholder="{{ __('messages.x_url') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="insta_url">{{ __('messages.insta_url') }}</label>
                                        <input type="text" class="form-control" id="insta_url" name="insta_url"
                                            value="{{ $setting->insta_url }}" placeholder="{{ __('messages.insta_url') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="youtube_url">{{ __('messages.youtube_url') }}</label>
                                        <input type="text" class="form-control" id="youtube_url" name="youtube_url"
                                            value="{{ $setting->youtube_url }}" placeholder="{{ __('messages.youtube_url') }}">
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
