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
                                    <tr id="tr_{{ $governorate->id }}">
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $governorate->name }}</td>
                                        <td>
                                            {{ $governorate->cities_count }}
                                        </td>
                                        <td class="d-flex">
                                            <a href={{ url(route('governorates.edit', $governorate->id)) }}
                                                class="btn btn-primary mx-1"><i class="far fa-edit"></i></a>
                                            <button type="button" data-id="tr_{{ $governorate->id }}"
                                                data-url={{ url(route('governorates.destroy', $governorate->id)) }}
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
                        {{ $governorates->links() }}
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    @push('scripts')
        <script>
            $('.delete-item').click(function(e) {
                e.preventDefault();
                $(this).data('url');
                let btn = $(this);
                Swal.fire({
                    title: "{{ __('messages.are_you_sure') }}",
                    text: "{{ __('messages.you_wont_be_able_to_revert_this') }}",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "{{ __('messages.yes_delete_it') }}",
                    cancelButtonText: "{{ __('messages.cancel') }}",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: btn.data('url'),
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function(result) {
                                $('#' + btn.data('id')).remove();
                                Swal.fire({
                                    title: "{{ __('messages.deleted') }}",
                                    text: result.message,
                                    icon: "success"
                                });
                            },
                            error: function(error) {
                                Swal.fire({
                                    icon: "error",
                                    title: "{{ __('messages.opps') }}...",
                                    text: "{{ __('messages.something_went_wrong') }}",
                                });
                            }
                        });

                    }
                });
            })
        </script>
    @endpush
@endsection
