@extends('admin.layout.main')

@section('page_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('messages.blood_dashboard') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('messages.home') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">

                <a href={{ route('governorates.index') }} class="text-dark">
                    <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-city"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ __('messages.governorates') }}</span>
                        <span class="info-box-number">10</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                </a>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection