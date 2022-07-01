@extends('admin.layouts.layout')

@section('title')
    Список пользователей
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Пользователи</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Пользователи</li>
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
                <h3 class="card-title">Список</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (count($users))
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    #
                                </th>
                                <th style="width: 20%">
                                    Имя
                                </th>
                                <th style="width: 30%">
                                    Роль
                                </th>

                                <th style="width: 20%">
                                    Статус
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            {{ $role['name'] }}
                                        @endforeach
                                    </td>


                                    <td class="project-state">
                                        <span class="badge badge-success">Success</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="{{ route('users.show', [$user->id]) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                        </a>


                                        <a class="btn btn-danger btn-sm" href="#"
                                            onclick="event.preventDefault();
                                        document.getElementById('delete-form').submit();">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                        <form id="delete-form" class="d-none"
                                            action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">

                                            </button>

                                        </form>
                                    </td>
                                </tr>
                        </tbody>
                @endforeach
                </table>
            @else
                <p>Пользователей пока нет...</p>
                @endif



            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

                {{-- {{ $areas->links() }} --}}
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection
