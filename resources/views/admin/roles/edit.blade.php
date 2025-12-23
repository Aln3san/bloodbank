@extends('admin.layout.main')

@section('page_header')
    <h1>{{ __('messages.update_role') }}</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('roles.update', $role->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>{{ __('messages.name') }}</label>
                <input type="text" name="name" value="{{ old('name', $role->name) }}" class="form-control">
            </div>

            <div class="form-group">
                <label>{{ __('messages.permissions') }}</label>
                <select name="permissions[]" multiple class="form-control">
                    @foreach($permissions as $permission)
                        <option value="{{ $permission->name }}" @if($role->permissions->contains('id', $permission->id)) selected @endif>{{ $permission->name }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary">{{ __('messages.update') }}</button>
        </form>
    </div>
</div>
@endsection
