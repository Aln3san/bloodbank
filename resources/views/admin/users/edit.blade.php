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
                    <li class="breadcrumb-item active">{{ __('messages.update_user') }}</li>
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
                        <h3 class="card-title">{{ __('messages.update_user') }}</h3>
                        <a href={{ route('users.index') }} class="btn btn-primary btn-sm ml-auto"><i class="fas fa-home"></i></a>
                    </div>
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">{{ __('messages.name') }}</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="{{ __('messages.name') }}" value="{{ $user->name }}">
                                                   @error('name')
                                                       <div class="text-danger">{{ $message }}</div>
                                                   @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">{{ __('messages.email') }}</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="{{ __('messages.email') }}" value="{{ $user->email }}">
                                                   @error('email')
                                                       <div class="text-danger">{{ $message }}</div>
                                                   @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">{{ __('messages.password') }}</label>
                                                <input type="password" class="form-control" id="password" name="password"
                                                    placeholder="{{ __('messages.password') }}">
                                                   @error('password')
                                                       <div class="text-danger">{{ $message }}</div>
                                                   @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="role_id">{{ __('messages.roles') }}</label>
                                                <select name="role" id="role" class="form-control">
                                                    <option selected disabled>{{ __('messages.select_roles') }}</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->name }}" {{ $user->roles->contains('name', $role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('role')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password_confirmation">{{ __('messages.password') }}</label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                                    placeholder="{{ __('messages.password') }}">
                                                   @error('password_confirmation')
                                                       <div class="text-danger">{{ $message }}</div>
                                                   @enderror
                                            </div>
                                        </div>
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