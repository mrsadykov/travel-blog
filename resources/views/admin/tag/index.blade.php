@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Список тегов</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                    </ol>
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
                <div class="col-1">
                    <a href="{{  route('admin.tag.create') }}" type="button" class="btn btn-block btn-primary">Добавить</a>
                </div>
            </div>
            <!-- /.row -->
            <div class="row mt-3">
                <div class="col-6">
                    @if(count($tags) > 0)
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th colspan="3">Действия</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($tags as $tag)
                                        <tr>
                                            <td>{{ $tag->id }}</td>
                                            <td>{{ $tag->title }}</td>
                                            <td><a href="{{ route('admin.tag.show', $tag->id)  }}"><i class="fa-regular fa-eye"></i></a></td>
                                            <td><a class="text-green" href="{{ route('admin.tag.edit', $tag->id)  }}"><i class="fa-solid fa-pencil"></i></a></td>
                                            <td>
                                                <form class="w-100" method="post" action="{{ route('admin.tag.delete', $tag->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent"><i class="fa-solid fa-trash text-danger" role="button"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    <!-- /.card -->
                    @else
                        <p>Список тегов пуст</p>
                    @endif
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
