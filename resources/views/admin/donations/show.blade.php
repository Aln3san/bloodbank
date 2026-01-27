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
                        <h3 class="card-title">{{ __('messages.donation_details') }}</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>{{ __('messages.patient_name') }}</th>
                                    <td>{{ $donation->patient_name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.patient_age') }}</th>
                                    <td>{{ $donation->patient_age }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.patient_phone') }}</th>
                                    <td>{{ $donation->patient_phone }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.blood_type') }}</th>
                                    <td>{{ $donation->bloodType->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.bags_naumber') }}</th>
                                    <td>{{ $donation->bags_number }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.hospital_name') }}</th>
                                    <td>{{ $donation->hospital_name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.latitude') }}</th>
                                    <td>{{ $donation->latitude }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.longitude') }}</th>
                                    <td>{{ $donation->longitude }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.city_name') }}</th>
                                    <td>{{ $donation->city->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.notes') }}</th>
                                    <td>{{ $donation->notes }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.created_at') }}</th>
                                    <td>{{ $donation->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.updated_at') }}</th>
                                    <td>{{ $donation->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-3 text-end">
                            <a href="{{ route('donations.index') }}" class="btn btn-secondary"><i class="fas fa-home"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.layout.partial._alerts')
@endsection
