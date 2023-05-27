@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1>Редактирование пользователя</h1>
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
                    <form action="{{ route('admin.user.update', $user->id) }}" class="w-25" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Ваше имя">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Ваша почта">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @if(!empty($roles))
                            <div class="form-group">
                                <label>Выберите роль</label>
                                <select name="role" class="form-control">
                                    @foreach($roles as $id => $role)
                                        <option value="{{ $id }}"
                                            {{ $id == $user->role ? 'selected' : '' }}>{{ $role }}</option>
                                    @endforeach
                                </select>

                                @error('role_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @endif

                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="submit" class="btn btn-primary" value="Изменить">
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
