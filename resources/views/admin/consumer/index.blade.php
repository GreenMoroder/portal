@extends('admin.layouts.layout')

@section('title')
    Полный список потребителей
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Полный список потребителей</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Назад</a></li>
                        <li class="breadcrumb-item active">Полный список потребителей</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Реестр контрольного снятия показаний персоналом</h3>
                        </div>
                        <div class="card-body">
                            @include('table.consumer')
                        </div>
                        <div class="card-footer clearfix">
                            <div class="pagination pagination-sm m-0 float-right">
                                {{ $consumers->onEachSide(1)->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
