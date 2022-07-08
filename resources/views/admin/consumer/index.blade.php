@extends('admin.layouts.layout')

@section('title')
    Потребители
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Список потребителей</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Потребители</li>
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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 30px">#</th>
                                        <th>Номер лицевого счета</th>
                                        <th>ФИО</th>
                                        <th>Населенный пункт</th>
                                        <th>Улица</th>
                                        <th>Дом</th>
                                        <th>Корпус</th>
                                        <th>Квартира</th>
                                        <th>Тип прибора учета</th>
                                        <th>Заводской номер ПУ</th>
                                        <th>Дата гос проверки</th>
                                        <th>№ пломбы</th>
                                        <th>Год выпуска прибора учета</th>
                                        <th>Зона суток</th>
                                        <th>Дата обхода</th>
                                        <th>Показания прибора учета на дату обхода</th>
                                        <th>Примечание</th>
                                        <th>Фото</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consumers as $consumer)
                                        <tr>
                                            <td>{{ $consumer->id }}</td>
                                            <td>{{ $consumer->personal_account }}</td>
                                            <td>{{ $consumer->full_name }}</td>
                                            <td>{{ $consumer->district }}</td>
                                            <td>{{ $consumer->street }}</td>
                                            <td>{{ $consumer->house }}</td>
                                            <td>{{ $consumer->building }}</td>
                                            <td>{{ $consumer->apartment }}</td>
                                            <td>{{ $consumer->model }}</td>
                                            <td>{{ $consumer->number }}</td>
                                            <td>{{ $consumer->verif_date }}</td>
                                            <td>{{ $consumer->seal }}</td>
                                            <td>{{ $consumer->year_release }}</td>
                                            <td>{{ $consumer->day_zone }}</td>
                                            <td>{{ $consumer->crawl_date }}</td>
                                            <td>{{ $consumer->reading }}</td>
                                            <td>{{ $consumer->note }}</td>
                                            <td><a target="_blank" href="{{ $consumer->getImage() }}"><img
                                                        src="{{ $consumer->getImage() }}" alt=""
                                                        class="img-thumbnail" width="100"></a></td>
                                            <td style="min-width: 100px">
                                                <a href="{{ route('consumers.edit', ['consumer' => $consumer->id]) }}"
                                                    class="btn btn-info btn-sm float-left mr-1">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form
                                                    action="{{ route('consumers.destroy', ['consumer' => $consumer->id]) }}"
                                                    method="POST" class="float-left">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Подтвердите удаление')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="width: 30px">#</th>
                                        <th>Номер лицевого счета</th>
                                        <th>ФИО</th>
                                        <th>Населенный пункт</th>
                                        <th>Улица</th>
                                        <th>Дом</th>
                                        <th>Корпус</th>
                                        <th>Квартира</th>
                                        <th>Тип прибора учета</th>
                                        <th>Заводской номер ПУ</th>
                                        <th>Дата гос проверки</th>
                                        <th>№ пломбы</th>
                                        <th>Год выпуска прибора учета</th>
                                        <th>Зона суток</th>
                                        <th>Дата обхода</th>
                                        <th>Показания прибора учета на дату обхода</th>
                                        <th>Примечание</th>
                                        <th>Фото</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
