@extends('admin.layout.main')

@section('page_header')
    <h1>{{ __('messages.roles') }}</h1>
@endsection

@section('content')
<div class="card">
    @include('admin.layout.partial._flashmessage')
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">{{ __('messages.roles_list') }}</h3>
        <a href={{ url(route('roles.create')) }} class="btn btn-primary btn-sm ml-auto"><i class="far fa-plus-square"></i> {{ __('messages.add') }}</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>{{ __('messages.name') }}</th>
                    <th>{{ __('messages.permissions') }}</th>
                    <th style="width: 40px">{{ __('messages.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr id="tr_{{ $role->id }}">
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        @foreach($role->permissions as $p)
                            <span class="badge badge-info">{{ $p->name }}</span>
                        @endforeach
                    </td>
                    <td class="d-flex">
                        <a href={{ url(route('roles.edit', $role->id)) }} class="btn btn-primary mx-1"><i class="far fa-edit"></i></a>
                        <button type="button" data-id="tr_{{ $role->id }}" data-url={{ url(route('roles.destroy', $role->id)) }} class="btn delete-item btn-danger mx-1"><i class="far fa-trash-alt"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{ $roles->links() }}
    </div>
</div>

    @include('admin.layout.partial._alerts')

@endsection
