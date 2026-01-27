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
                    <li class="breadcrumb-item active">{{ __('messages.settings_list') }}</li>
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
                    @include('admin.layout.partial._flashmessage')
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">{{ __('messages.settings_list') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>{{ __('messages.about_app') }}</th>
                                    <th>{{ __('messages.email') }}</th>
                                    <th>{{ __('messages.phone') }}</th>
                                    <th> {{ __('messages.fb_url') }} </th>
                                    <th>{{ __('messages.x_url') }}</th>
                                    <th>{{ __('messages.insta_url') }}</th>
                                    <th>{{ __('messages.youtube_url') }}</th>
                                    <th>{{ __('messages.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $setting)
                                    <tr id="tr_{{ $setting->id }}">
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $setting->about_app }}</td>
                                        <td>{{ $setting->email }}</td>
                                        <td>{{ $setting->phone }}</td>
                                        <td>{{ $setting->fb_url }}</td>
                                        <td>{{ $setting->x_url }}</td>
                                        <td>{{ $setting->insta_url }}</td>
                                        <td>{{ $setting->youtube_url }}</td>
                                        <td>
                                            <a href="{{ route('settings.edit', $setting->id) }}"
                                                class="btn btn-sm btn-primary w-100"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{-- <ul class="pagination pagination-sm m-0 float-right"> --}}
                        {{-- <li class="page-item"><a class="page-link" href="#">«</a></li> --}}
                        {{-- {{ $settings->links() }} --}}
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    @include('admin.layout.partial._alerts')
@endsection
