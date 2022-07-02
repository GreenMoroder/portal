@extends('front.layouts.layout')

@section('title')
    Новый потребитель
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Импортировать</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Импортировать</li>
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
                <h3 class="card-title">Потребители</h3>
            </div>
            <form enctype="multipart/form-data" method="POST" action="{{ route('consumers.import') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="category_id">Локация</label>
                        <select name="category_id" id="category_id" class="form-control ">
                            @foreach ($areas as $k => $v)
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="file">Формат: XLSX</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="file" id="file" type="file" class="custom-file-input">
                                <label class="custom-file-label" for="file">Choose file</label>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
            </form>
        </div>


        {{-- <form method="POST" action="{{ route('consumers.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Номер лицевого счета</label>
                        <input name="personal_account" class="form-control @error('personal_account') is-invalid @enderror"
                            type="text" class="form-control" id="exampleInputEmail1" placeholder="Номер лицевого счета">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ФИО</label>
                        <input name="full_name" class="form-control @error('full_name') is-invalid @enderror" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="ФИО">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Населенный пункт</label>
                        <input name="district" class="form-control @error('district') is-invalid @enderror" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="Населенный пункт">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Улица</label>
                        <input name="street" class="form-control @error('street') is-invalid @enderror" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="Улица">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Дом</label>
                        <input name="house" class="form-control @error('house') is-invalid @enderror" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="Дом">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Корпус</label>
                        <input name="building" class="form-control @error('building') is-invalid @enderror" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="Корпус">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Квартира</label>
                        <input name="apartment" class="form-control @error('apartment') is-invalid @enderror" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="Квартира">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Тип прибора учета</label>
                        <input name="model" class="form-control @error('model') is-invalid @enderror" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="Тип прибора учета">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Заводской номер ПУ</label>
                        <input name="number" class="form-control @error('number') is-invalid @enderror" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="Заводской номер ПУ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Дата гос проверки</label>
                        <input name="verif_date" class="form-control @error('verif_date') is-invalid @enderror"
                            type="text" class="form-control" id="exampleInputEmail1" placeholder="Дата гос проверки">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">№ пломбы</label>
                        <input name="seal" class="form-control @error('seal') is-invalid @enderror" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="№ пломбы">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Год выпуска прибора учета</label>
                        <input name="year_release" class="form-control @error('year_release') is-invalid @enderror"
                            type="text" class="form-control" id="exampleInputEmail1"
                            placeholder="Год выпуска прибора учета">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Зона суток</label>
                        <input name="day_zone" class="form-control @error('day_zone') is-invalid @enderror"
                            type="text" class="form-control" id="exampleInputEmail1" placeholder="Зона суток">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Дата обхода</label>
                        <input name="crawl_date" class="form-control @error('crawl_date') is-invalid @enderror"
                            type="text" class="form-control" id="exampleInputEmail1" placeholder="Дата обхода">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Показания прибора учета на дату обхода</label>
                        <input name="reading" class="form-control @error('reading') is-invalid @enderror" type="text"
                            class="form-control" id="exampleInputEmail1"
                            placeholder="Показания прибора учета на дату обхода">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Примечание</label>
                        <input name="note" class="form-control @error('note') is-invalid @enderror" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="Примечание">
                    </div>
                    <div class="form-group">
                        <label for="photo">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="photo" id="photo" type="file" class="custom-file-input">
                                <label class="custom-file-label" for="photo">Choose file</label>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div> --}}
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
