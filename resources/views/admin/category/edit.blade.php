@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1>Редактирование категории</h1>
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
                    <form action="{{ route('admin.category.update', $category->id) }}" class="w-25" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" value="{{ $category->title }}" placeholder="Новое название категории">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Сохранить">
                        @error('title')
                            <div class="text-danger">
                                Это поле необходимо заполнить {{ $message }}
                            </div>
                        @enderror
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
