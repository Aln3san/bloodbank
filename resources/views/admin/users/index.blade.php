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
                    <li class="breadcrumb-item active">{{ __('messages.users_list') }}</li>
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
                        <h3 class="card-title">{{ __('messages.users_list') }}</h3>
                        <a href={{ url(route('users.create')) }} class="btn btn-primary btn-sm ml-auto"><i
                                class="far fa-plus-square"></i> {{ __('messages.add') }}</a>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('users.index') }}" id="filter-form" class="mb-3">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="{{ __('messages.name') }}" value="{{ $filters['name'] ?? '' }}">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="email" class="form-control"
                                        placeholder="{{ __('messages.email') }}" value="{{ $filters['email'] ?? '' }}">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary w-100"
                                        type="submit">{{ __('messages.search') }}</button>
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
                                    <th>{{ __('messages.email') }}</th>
                                    <th>{{ __('messages.roles') }}</th>
                                    <th style="width: 40px">{{ __('messages.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr id="tr_{{ $user->id }}">
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @foreach ($user->roles as $role)
                                                <span class="badge badge-info">{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                        <td class="d-flex">
                                            <a href={{ url(route('users.edit', $user->id)) }}
                                                class="btn btn-primary mx-1"><i class="far fa-edit"></i></a>
                                            <button type="button" data-id="tr_{{ $user->id }}"
                                                data-url={{ url(route('users.destroy', $user->id)) }}
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
                        {{ $users->links() }}
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    @include('admin.layout.partial._alerts')
@endsection
