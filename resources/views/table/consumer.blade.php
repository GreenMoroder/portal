@if (count($consumers))
    <div class="table-responsive">
        <table id="example1" class="table table-sm table-bordered table-striped text-nowrap">
            <thead>
                <tr>
                    <th style="width: 30px">#</th>
                    <th data-toggle="tooltip" title="Номер лицевого счета">Номер счета</th>
                    <th>ФИО</th>
                    <th data-toggle="tooltip" title="Населенный пункт">НП</th>
                    <th>Улица</th>
                    <th>Дом</th>
                    <th data-toggle="tooltip" title="Корпус">К</th>
                    <th data-toggle="tooltip" title="Квартира">Кв</th>
                    <th>Тип прибора учета</th>
                    <th>Заводской номер ПУ</th>
                    <th data-toggle="tooltip" title="Дата гос проверки">Дата проверки</th>
                    <th>№ пломбы</th>
                    <th data-toggle="tooltip" title="Год выпуска прибора учета">Год выпуска</th>
                    <th>Зона суток</th>
                    <th>Дата обхода</th>
                    <th data-toggle="tooltip" title="Показания прибора учета на дату обхода">Показания</th>
                    <th>Примечание</th>
                    <th data-toggle="tooltip" title="Фотофиксация показаний в альбомном виде">Фото</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consumers as $consumer)
                    <tr @if ($consumer->id == session('id')) class="selected" @endif id="{{ $consumer->id }}">
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
                                    src="{{ $consumer->getImage() }}" class="img-thumbnail" width="100"></a></td>

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
        </table>
    </div>
@else
    <p>Данных пока нет...</p>
@endif
@push('scripts')
    <script>
        $(function() {
            $("#example1").DataTable({
                autoWidth: false,
                paging: false,
                ordering: false,
                info: false,
                responsive: false,
                lengthChange: true,
                buttons: ["colvis"],
                searching: false,
                select: true,
                colReorder: true,
                stateSave: true,

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@endpush
