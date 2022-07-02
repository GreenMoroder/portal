@extends('front.layouts.layout')

@section('title')
Редактирование категории
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Редактирование категории</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Новая категория</li>
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
            <h3 class="card-title">Категория {{$category->title}}</h3>
        </div>


        <form method="POST" action="{{route('categories.update', ['category'=>$category->id])}}">
            @csrf
            @method ('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Название</label>
                    <input value="{{$category->title}}" name="title" class="form-control @error ('title') is-invalid @enderror" type="text" class="form-control" id="exampleInputEmail1">
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