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
                        <h3 class="card-title">{{ __('messages.clients_list') }}</h3>
                        <a href={{ url(route('clients.create')) }} class="btn btn-primary btn-sm ml-auto"><i
                                class="far fa-plus-square"></i> {{ __('messages.add') }}</a>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('clients.index') }}" id="filter-form" class="mb-3">
                            <div class="row g-2">
                                <div class="col-md-3">
                                    <input type="text" name="name" class="form-control" placeholder="{{ __('messages.client_name') }}" value="{{ $filters['name'] ?? '' }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="phone" class="form-control" placeholder="{{ __('messages.client_phone') }}" value="{{ $filters['phone'] ?? '' }}">
                                </div>
                                <div class="col-md-3">
                                    <select name="city_id" class="form-control">
                                        <option value="">{{ __('messages.client_city') }}</option>
                                        @foreach($cities as $c)
                                            <option value="{{ $c->id }}" {{ isset($filters['city_id']) && $filters['city_id']==$c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="blood_type_id" class="form-control">
                                        <option value="">{{ __('messages.client_blood_type') }}</option>
                                        @foreach($blood_types as $b)
                                            <option value="{{ $b->id }}" {{ isset($filters['blood_type_id']) && $filters['blood_type_id']==$b->id ? 'selected' : '' }}>{{ $b->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-primary w-100" type="submit">{{ __('messages.search') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>{{ __('messages.name') }}</th>
                                    <th>{{ __('messages.client_phone') }}</th>
                                    <th>{{ __('messages.client_email') }}</th>
                                     <th>{{ __('messages.client_blood_type') }}</th>
                                    <th>{{ __('messages.client_city') }}</th>
                                    <th>{{ __('messages.client_dob') }}</th>
                                    <th>{{ __('messages.client_last_donation_date') }}</th>
                                    <th style="width: 40px">{{ __('messages.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr id="tr_{{ $client->id }}">
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->phone }}</td>
                                    
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->bloodType->name }}</td>
                                        <td>{{ $client->city->name }}</td>
                                        <td>{{ $client->date_of_birth }}</td>
                                        <td>{{ $client->last_donation_date }}</td>
                                        <td class="d-flex">
                                            <a href={{ url(route('clients.edit', $client->id)) }}
                                                class="btn btn-primary mx-1"><i class="far fa-edit"></i></a>
                                            <button type="button" data-id="tr_{{ $client->id }}"
                                                data-url={{ url(route('clients.destroy', $client->id)) }}
                                                class="btn delete-item btn-danger mx-1"><i
                                                    class="far fa-trash-alt"></i></button>
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
                        {{ $clients->links() }}
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    @include('admin.layout.partial._alerts')
   
@endsection
