@extends('admin.layouts.layout')

@section('title')
    Пользователь «{{ $user->name }}»
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Пользователь «{{ $user->name }}»</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Пользователь «{{ $user->name }}»</li>
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
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method ('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Пользователь</label>
                        <input value="{{ $user->name }}" name="name"
                            class="form-control @error('name') is-invalid @enderror" type="text" class="form-control"
                            id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label>Роль</label>
                        <select name="role_id" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{ $role['id'] }}"@if ($user->hasRole($role['name'])) selected @endif>
                                    {{ $role['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="areas">Выбор локаций</label>
                        <select name="areas[]" id="areas" class="select2" multiple="multiple"
                            data-placeholder="Выбор локаций" style="width: 100%;">
                            @foreach ($areas as $k => $v)
                                <option value="{{ $k }}"@if (in_array($k, $user->areas->pluck('id')->all())) selected @endif>
                                    {{ $v }}</option>
                            @endforeach


                        </select>
                    </div>
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
