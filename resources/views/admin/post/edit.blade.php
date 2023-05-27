@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1>Редактирование статьи</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group w-25">
                            <input type="text"
                                   name="title"
                                   class="form-control"
                                   placeholder="Название статьи"
                                   value="{{ $post->title }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                            @error('content')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group w-50">
                            <label for="exampleInputFile">Картинка для превью</label>
                            @if(isset($post->preview_image) && !empty($post->preview_image))
                                <div class="mb-3">
                                    <img class="w-25" src="{{ url('storage/' . $post->preview_image) }}" alt="preview_image">
                                </div>
                            @endif
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image">
                                    <label class="custom-file-label">Выберите изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>

                            @error('preview_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group w-50">
                            <label for="exampleInputFile">Картинка для детальной страницы</label>
                            @if(isset($post->main_image) && !empty($post->main_image))
                                <div class="mb-3">
                                    <img class="w-25" src="{{ url('storage/' . $post->main_image) }}" alt="main_image">
                                </div>
                            @endif
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_image">
                                    <label class="custom-file-label">Выберите изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>

                            @error('main_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group w-25">
                            <label>Выберите категорию</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group w-25">
                            <label>Выберите теги</label>
                            <div class="select2-purple">
                                <select name="tag_ids[]"
                                        class="select2"
                                        multiple="multiple"
                                        data-placeholder="Выберите тег"
                                        data-dropdown-css-class="select2-purple"
                                        style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }}
                                                value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @error('tag_ids')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="submit" class="btn btn-primary" value="Сохранить">
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
