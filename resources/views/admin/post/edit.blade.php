@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пост {{ $post->title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Пост {{ $post->title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <form action=" {{ route('admin.post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Название поста</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                               placeholder="Введите название поста" value="{{ old('title',
                                               $post->title)
                                               }}">
                                        @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="content">Контент</label>
                                        <textarea class="form-control" id="summernote" name="content">
                                            {{ $post->content }}
                                        </textarea>
                                        @error('content')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <img src="{{ Storage::url($post->preview_image) }}"
                                                 alt="" class="w-25">
                                        </div>
                                        <label for="preview_image">Изображение для анонса</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="preview_image"
                                                       name="preview_image">
                                                <label class="custom-file-label" for="preview_image">Выберите файл
                                                </label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Загрузить</span>
                                            </div>
                                        </div>
                                        @error('preview_image')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <img src="{{ Storage::url($post->main_image) }}" alt="" class="w-25">
                                        </div>
                                        <label for="main_image">Главное изображение</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="main_image"
                                                       name="main_image">
                                                <label class="custom-file-label" for="main_image">Выберите файл</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Загрузить</span>
                                            </div>
                                        </div>
                                        @error('main_image')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Категория</label>
                                        <select class="form-control" name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                                    {{ $category->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Теги</label>
                                        <select name="tag_ids[]" class="select2" multiple="multiple"
                                                data-placeholder="Выберите теги" style="width: 100%;">
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag->id }}"
                                                    @foreach($post->tags as $post_tag)
                                                        {{ $post_tag->id == $tag->id ? 'selected' : '' }}
                                                        @endforeach
                                                >

                                                    {{ $tag->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Обновить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
