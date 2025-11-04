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
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    @include('admin.layout.partial._flashmessage')
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">{{ __('messages.governorates_list') }}</h3>
                        <a href={{ url(route('governorates.create')) }} class="btn btn-primary btn-sm ml-auto"><i
                                class="far fa-plus-square"></i> {{ __('messages.add') }}</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>{{ __('messages.name') }}</th>
                                    <th>{{ __('messages.cities_count') }}</th>
                                    <th style="width: 40px">{{ __('messages.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($governorates as $governorate)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $governorate->name }}</td>
                                        <td>
                                            {{ $governorate->cities_count }}
                                        </td>
                                        <td class="d-flex">
                                            <a href={{ url(route('governorates.edit', $governorate->id)) }}
                                                class="btn btn-primary mx-1"><i class="far fa-edit"></i></a>
                                            <a href={{ url(route('governorates.destroy', $governorate->id)) }}
                                                class="btn btn-danger mx-1"><i class="far fa-trash-alt"></i></a>
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
                        {{ $governorates->links() }}
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    {{-- <script>
        if (confirm('Some message')) {
            alert('Thanks for confirming');
        } else {
            alert('You canceled the execution.');
        }
    </script> --}}
@endsection
