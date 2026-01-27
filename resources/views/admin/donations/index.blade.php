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
                    <li class="breadcrumb-item active">{{ __('messages.donations_list') }}</li>
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
                        <h3 class="card-title">{{ __('messages.donations_list') }}</h3>
                    </div>
                    <div class="card-body">
                        <form method="GET" class="row g-2 mb-3">
                            <div class="col-md-3">
                                <input type="text" name="patient_name" value="{{ $filters['patient_name'] ?? '' }}" class="form-control" placeholder="{{ __('messages.patient_name') }}">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="patient_phone" value="{{ $filters['patient_phone'] ?? '' }}" class="form-control" placeholder="{{ __('messages.patient_phone') }}">
                            </div>
                            <div class="col-md-3">
                                <select name="blood_type_id" class="form-control">
                                    <option value="">{{ __('messages.blood_type') }}</option>
                                    @foreach($bloodTypes as $bt)
                                        <option value="{{ $bt->id }}" @if(($filters['blood_type_id'] ?? '') == $bt->id) selected @endif>{{ $bt->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="city_id" class="form-control">
                                    <option value="">{{ __('messages.city_name') }}</option>
                                    @foreach($cities as $c)
                                        <option value="{{ $c->id }}" @if(($filters['city_id'] ?? '') == $c->id) selected @endif>{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mt-2">
                                <button type="submit" class="btn btn-primary">{{ __('messages.filter') }}</button>
                                <a href="{{ route('donations.index') }}" class="btn btn-secondary">{{ __('messages.clear') }}</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>{{ __('messages.patient_name') }}</th>
                                    <th>{{ __('messages.patient_age') }}</th>
                                    <th>{{ __('messages.patient_phone') }}</th>
                                    <th>{{ __('messages.blood_type') }}</th>
                                    <th>{{ __('messages.bags_naumber') }}</th>
                                    <th>{{ __('messages.hospital_name') }}</th>
                                    <th>{{ __('messages.latitude') }}</th>
                                    <th>{{ __('messages.longitude') }}</th>
                                    <th>{{ __('messages.city_name') }}</th>
                                    <th>{{ __('messages.notes') }}</th>
                                    <th>{{ __('messages.created_at') }}</th>
                                    <th>{{ __('messages.updated_at') }}</th>
                                    <th style="width: 40px">{{ __('messages.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donations as $donation)
                                    <tr id="tr_{{ $donation->id }}">
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $donation->patient_name }}</td>
                                            <td>{{ $donation->patient_age }}</td>
                                            <td>{{ $donation->patient_phone}}</td>
                                            <td>{{ $donation->bloodType->name }}</td>
                                            <td>{{ $donation->bags_number }}</td>
                                            <td>{{ $donation->hospital_name }}</td>
                                            <td>{{ $donation->latitude }}</td>
                                            <td>{{ $donation->longitude }}</td>
                                            <td>{{ $donation->city->name }}</td>
                                            <td>{{ $donation->notes }}</td>
                                            <td>{{ $donation->created_at }}</td>
                                            <td>{{ $donation->updated_at }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('donations.show', $donation->id) }}" class="btn btn-primary mx-1"><i class="fas fa-eye"></i></a>
                                            <button type="button" data-id="tr_{{ $donation->id }}"
                                                data-url="{{ route('donations.destroy', $donation->id) }}"
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
                        {{ $donations->links() }}
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    @include('admin.layout.partial._alerts')
   
@endsection