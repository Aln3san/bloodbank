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
                    <li class="breadcrumb-item active">{{ __('messages.governorates_list_update') }}</li>
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
                        <h3 class="card-title">{{ __('messages.governorates_list_update') }}</h3>
            <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm ml-auto"><i
                class="fas fa-home"></i></a>
                    </div>
                    <form action={{ url(route('posts.update', $post->id)) }} method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card card-primary">
                                <!-- /.card-header -->
                                <!-- form start -->

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">{{ __('messages.post_title') }}</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}"
                                            placeholder="{{ __('messages.post_title') }}">
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="content">{{ __('messages.post_content') }}</label>
                                        <textarea class="form-control" id="content" name="content" placeholder="{{ __('messages.post_content') }}">{{ old('content', $post->content) }}</textarea>
                                        @error('content')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="photo">{{ __('messages.post_photo') }}</label>
                                        @if($post->photo)
                                            <div class="mb-2">
                                                <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($post->photo) }}" alt="{{ $post->title }}" class="img-thumbnail" style="max-width:150px;">
                                            </div>
                                        @endif
                                        <input type="file" class="form-control" id="photo" name="photo">
                                        @error('photo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="category">{{ __('messages.category') }}</label>
                                        <select class="form-control" id="category" name="category_id">
                                            <option value="">{{ __('messages.choose_category') }}</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
