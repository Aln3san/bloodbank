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
            @can('read users')
            <div class="col-md-3 col-sm-6 col-12">
                <a href={{ route('users.index') }} class="text-dark">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-users-cog"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('messages.users') }}</span>
                            <span class="info-box-number">{{ $usersCount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <! -- /.info-box -->
                </a>
            </div>
            @endcan

            @can('read clients')
            <div class="col-md-3 col-sm-6 col-12">
                <a href={{ route('clients.index') }} class="text-dark">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('messages.clients') }}</span>
                            <span class="info-box-number">{{ $clientsCount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <! -- /.info-box -->
                </a>
            </div>
            @endcan

            @can('read governorates')           
            <div class="col-md-3 col-sm-6 col-12">

                <a href={{ route('governorates.index') }} class="text-dark">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-city"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('messages.governorates') }}</span>
                            <span class="info-box-number">{{ $governoratesCount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <! -- /.info-box -->
                </a>

            </div>
            @endcan

            @can('read cities')
            <div class="col-md-3 col-sm-6 col-12">
                <a href={{ route('cities.index') }} class="text-dark">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-building"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('messages.cities') }}</span>
                            <span class="info-box-number">{{ $citiesCount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <! -- /.info-box -->
                </a>
            </div>
            @endcan

            @can('read categories')
            <div class="col-md-3 col-sm-6 col-12">
                <a href={{ route('categories.index') }} class="text-dark">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-stream"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('messages.categories') }}</span>
                            <span class="info-box-number">{{ $categoriesCount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <! -- /.info-box -->
                </a>
            </div>
            @endcan

            @can('read posts')
            <div class="col-md-3 col-sm-6 col-12">
                <a href={{ route('posts.index') }} class="text-dark">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-newspaper"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('messages.posts') }}</span>
                            <span class="info-box-number">{{ $postsCount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <! -- /.info-box -->
                </a>
            </div>
            @endcan

            @can('read contacts')
            <div class="col-md-3 col-sm-6 col-12">
                <a href={{ route('contacts.index') }} class="text-dark">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-id-card-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('messages.contacts') }}</span>
                            <span class="info-box-number">{{ $contactsCount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <! -- /.info-box -->
                </a>
            </div>
            @endcan

            @can('read donations')
            <div class="col-md-3 col-sm-6 col-12">
                <a href={{ route('donations.index') }} class="text-dark">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-hand-holding-usd"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('messages.donations') }}</span>
                            <span class="info-box-number">{{ $donationCount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <! -- /.info-box -->
                </a>
            </div>
            @endcan

            @can('read settings')
            <div class="col-md-3 col-sm-6 col-12">
                <a href={{ route('settings.index') }} class="text-dark">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-cogs"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('messages.settings') }}</span>
                            <span class="info-box-number">{{ $settingsCount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <! -- /.info-box -->
                </a>
            </div>
            @endcan

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
