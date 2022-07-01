@extends('admin.layouts.layout')

@section('title')
    Роль «{{ $role->name }}»
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Роль «{{ $role->name }}»</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Роль «{{ $role->name }}»</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Редактировать</h3>
            </div>


            <form method="POST" action="{{ route('roles.update', $role->id) }}">
                @csrf
                @method ('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input value="{{ $role->name }}" name="name"
                            class="form-control @error('name') is-invalid @enderror" type="text" class="form-control"
                            id="exampleInputEmail1">
                    </div>


                    @foreach ($permissions as $permission)
                        <div class="form-check">

                            <input type="checkbox" value="{{ $permission->id }}"
                                @if ($role->hasPermissionTo($permission->name)) checked @endif name="permissions[]"
                                class="form-check-input" id="{{ $permission->id }}">
                            <label for="{{ $permission->id }}" class="form-check-label">{{ $permission->name }}</label>

                        </div>
                    @endforeach

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
