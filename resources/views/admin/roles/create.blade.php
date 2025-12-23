@extends('admin.layout.main')

@section('page_header')
    <h1>{{ __('messages.create_role') }}</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('roles.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label>{{ __('messages.name') }}</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            </div>

            <div class="form-group">
                <label>{{ __('messages.permissions') }}</label>
                <select name="permissions[]" multiple class="form-control">
                    @foreach($permissions->groupBy(function($p) { return $p->group ?? 'other'; }) as $group => $items)
                        <optgroup label="{{ $group }}">
                            @foreach($items as $permission)
                                @php($selected = in_array($permission->name, (array) old('permissions', isset($role) ? $role->permissions->pluck('name')->toArray() : [])))
                                <option value="{{ $permission->name }}" {{ $selected ? 'selected' : '' }}>{{ $permission->name }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary">{{ __('messages.create') }}</button>
        </form>
    </div>
</div>
@endsection
