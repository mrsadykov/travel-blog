@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-6 d-flex align-items-center">
                        <div class="row align-items-center w-100">
                            <div class="col-10">
                                <h1 class="m-0 mr-2">{{ $user->name }}</h1>
                            </div>

                            <div class="col-1">
                                <a href="{{ route('admin.user.edit', $user->id)  }}"><i class="fa-solid fa-pencil"></i></a>
                            </div>

                            <div class="col-1">
                                <form class="w-100" method="post" action="{{ route('admin.user.delete', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-transparent"><i class="fa-solid fa-trash text-danger" role="button"></i></button>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.col -->

                    <div class="col-6">
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
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>{{ $user->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Имя</td>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Электронная почта</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Роль</td>
                                            <td>{{ $user->role }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
