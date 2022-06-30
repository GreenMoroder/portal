@extends('admin.layouts.layout')

@section('title')
    Локация «{{ $area->name }}»
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Локация «{{ $area->name }}»</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Локация «{{ $area->name }}»</li>
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


            <form method="POST" action="{{ route('areas.update', ['area' => $area->id]) }}">
                @csrf
                @method ('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input value="{{ $area->name }}" name="name"
                            class="form-control @error('name') is-invalid @enderror" type="text" class="form-control"
                            id="exampleInputEmail1">
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
