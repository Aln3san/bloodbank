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
                    <li class="breadcrumb-item active">{{ __('messages.contacts_list') }}</li>
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
                        <h3 class="card-title">{{ __('messages.contacts_list') }}</h3>
                    </div>
                    <div class="card-body">
                        <form method="GET" class="row g-2 mb-3">
                            <div class="col-md-6">
                                <input type="text" name="subject" value="{{ $filters['subject'] ?? '' }}" class="form-control" placeholder="{{ __('messages.subject') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="message" value="{{ $filters['message'] ?? '' }}" class="form-control" placeholder="{{ __('messages.message') }}">
                            </div>
                            <div class="col-md-12 mt-2">
                                <button type="submit" class="btn btn-primary">{{ __('messages.filter') }}</button>
                                <a href="{{ route('contacts.index') }}" class="btn btn-secondary">{{ __('messages.clear') }}</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>{{ __('messages.subject') }}</th>
                                    <th>{{ __('messages.message') }}</th>
                                    <th style="width: 40px">{{ __('messages.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr id="tr_{{ $contact->id }}">
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $contact->subject }}</td>
                                            <td>{{ $contact->message }}</td>
                                        <td class="d-flex">
                                            <button type="button" data-id="tr_{{ $contact->id }}"
                                                data-url="{{ route('contacts.destroy', $contact->id) }}"
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
                        {{ $contacts->links() }}
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    @include('admin.layout.partial._alerts')
   
@endsection
