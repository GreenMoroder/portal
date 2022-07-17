@if (count($consumers))
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
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consumers as $consumer)
                <tr id="{{ $consumer->id }}">
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
                    <td><a target="_blank" href="{{ $consumer->getImage() }}"><img src="{{ $consumer->getImage() }}"
                                class="img-thumbnail" width="100"></a></td>

                    <td>
                        <div class="btn-group">
                            <a style="border-radius: 5px" class="mx-1 btn btn-info"
                                href="{{ route('consumers.edit', ['consumer' => $consumer->id]) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('consumers.destroy', ['consumer' => $consumer->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="mx-1 btn btn-danger" type="submit"
                                    onclick="return confirm('Подтвердите удаление')"><i
                                        class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
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
                <th>Действие</th>
            </tr>
        </tfoot>
    </table>
@else
    <p>Данных пока нет...</p>
@endif
@push('scripts')
    <script>
        $(function() {
            $("#example1").DataTable({
                paging: false,
                ordering: true,
                info: false,
                select: true,
                responsive: false,
                lengthChange: true,
                autoWidth: false,
                buttons: ["colvis"],
                searching: false,
                stateSave: true,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
