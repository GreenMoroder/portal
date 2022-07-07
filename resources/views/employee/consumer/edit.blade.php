@extends('employee.layouts.layout')

@section('title')
    Потребитель электроэнергии # {{ $consumer->id }}
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Потребитель электроэнергии # {{ $consumer->id }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Потребитель электроэнергии # {{ $consumer->id }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- Default box -->

                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $consumer->full_name }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Номер лицевого счета</label>
                                <input type="text" class="form-control" placeholder="{{ $consumer->personal_account }}"
                                    disabled="">
                            </div>
                            <div class="form-group">
                                <label>ФИО</label>
                                <input type="text" class="form-control" placeholder="{{ $consumer->full_name }}"
                                    disabled="">
                            </div>
                            <div class="form-group">
                                <label>Населенный пункт</label>
                                <input type="text" class="form-control" placeholder="{{ $consumer->district }}"
                                    disabled="">
                            </div>
                            <div class="form-group">
                                <label>Улица</label>
                                <input type="text" class="form-control" placeholder="{{ $consumer->street }}"
                                    disabled="">
                            </div>
                            <div class="form-group">
                                <label>Дом</label>
                                <input type="text" class="form-control" placeholder="{{ $consumer->house }}"
                                    disabled="">
                            </div>
                            <div class="form-group">
                                <label>Корпус</label>
                                <input type="text" class="form-control" placeholder="{{ $consumer->building }}"
                                    disabled="">
                            </div>
                            <div class="form-group">
                                <label>Квартира</label>
                                <input type="text" class="form-control" placeholder="{{ $consumer->apartment }}"
                                    disabled="">
                            </div>
                            <div class="form-group">
                                <label>Тип прибора учета</label>
                                <input type="text" class="form-control" placeholder="{{ $consumer->model }}"
                                    disabled="">
                            </div>
                            <div class="form-group">
                                <label>Заводской номер ПУ</label>
                                <input type="text" class="form-control" placeholder="{{ $consumer->number }}"
                                    disabled="">
                            </div>
                            <div class="form-group">
                                <label>Дата гос проверки</label>
                                <input type="text" class="form-control" placeholder="{{ $consumer->verif_date }}"
                                    disabled="">
                            </div>
                            <div class="form-group">
                                <label>№ пломбы</label>
                                <input type="text" class="form-control" placeholder="{{ $consumer->seal }}"
                                    disabled="">
                            </div>
                            <div class="form-group">
                                <label>Зона суток</label>
                                <input type="text" class="form-control" placeholder="{{ $consumer->day_zone }}"
                                    disabled="">
                            </div>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                    <!-- /.card -->
                </div>


                <div class="col-md-6">
                    <!-- Default box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $consumer->full_name }}</h3>
                        </div>
                        <form enctype="multipart/form-data" method="POST"
                            action="{{ route('employees.update', ['employee' => $consumer->id]) }}">
                            @csrf
                            @method ('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Дата обхода</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input value="{{ $consumer->getCrawlDate() }}" name="crawl_date"
                                            class="form-control @error('crawl_date') is-invalid @enderror" type="text"
                                            class="form-control" id="crawl_date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="year_release">Год выпуска прибора учета</label>
                                    <input value="{{ $consumer->year_release }}" name="year_release"
                                        class="form-control @error('year_release') is-invalid @enderror" type="text"
                                        class="form-control" id="year_release">
                                </div>
                                <div class="form-group">
                                    <label for="reading">Показания прибора учета на дату обхода</label>
                                    <input value="{{ $consumer->reading }}" name="reading"
                                        class="form-control @error('reading') is-invalid @enderror" type="text"
                                        class="form-control" id="reading">
                                </div>
                                <div class="form-group">
                                    <label for="note">Примечание</label>
                                    <textarea id="note" name="note" class="form-control @error('note') is-invalid @enderror" rows="3"
                                        placeholder="{{ $consumer->note }}"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="photo">Фото</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="photo" id="photo" type="file"
                                                class="custom-file-input">
                                            <label class="custom-file-label" for="photo">Choose file</label>
                                        </div>
                                    </div>
                                    <div><img src="{{ $consumer->getImage() }}" alt=""
                                            class="img-thumbnail mt-2" width="200">
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection