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
                    <li class="breadcrumb-item active">{{ __('messages.posts_list') }}</li>
                    <li class="breadcrumb-item active">{{ __('messages.post_list_create') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('photo');
            const preview = document.getElementById('photo-preview');
            const container = document.getElementById('photo-preview-container');

            if (!input) return;

            input.addEventListener('change', function (e) {
                const file = e.target.files && e.target.files[0];
                if (!file) {
                    container.style.display = 'none';
                    preview.src = '#';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (ev) {
                    preview.src = ev.target.result;
                    container.style.display = 'block';
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">{{ __('messages.post_list_create') }}</h3>
                        <a href={{ route('posts.index') }} class="btn btn-primary btn-sm ml-auto"><i
                                class="fas fa-home"></i></a>
                    </div>
                    <form action={{ url(route('posts.store')) }} method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card card-primary">
                                <!-- /.card-header -->
                                <!-- form start -->

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">{{ __('messages.post_title') }}</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="{{ __('messages.post_title') }}">
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="content">{{ __('messages.post_content') }}</label>
                                        <textarea class="form-control" id="content" name="content" placeholder="{{ __('messages.post_content') }}"></textarea>
                                        @error('content')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="photo">{{ __('messages.post_photo') }}</label>
                                        <div class="mb-2" id="photo-preview-container" style="display:none;">
                                            <img id="photo-preview" src="#" alt="preview" class="img-thumbnail" style="max-width:150px;" />
                                        </div>
                                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                                        @error('photo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="category">{{ __('messages.category') }}</label>
                                        <select class="form-control" id="category" name="category_id">
                                            <option value="">{{ __('messages.choose_category') }}</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
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
