@if (count($areas))
    <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 30px">#</th>
                    <th>Локация</th>
                    <th>Контроллер</th>
                    <th>Снятые показания</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($areas as $area)
                    <tr>
                        <td class="align-middle text-center">{{ $area->id }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('areas.show', [$area->id]) }}" type="button" class="btn btn-default">
                                    {{ $area->name }}</a>
                                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu" style="">

                                    <a class="dropdown-item"
                                        href="{{ route('consumers.export', ['area' => $area->id, 'name' => $area->name]) }}"><i
                                            class="fas fa-file-export"></i> Экспортировать</a>
                                    <a class="dropdown-item" href="{{ route('areas.edit', ['area' => $area->id]) }}"><i
                                            class="fas fa-edit"></i> Редактировать</a>

                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('areas.destroy', ['area' => $area->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" type="submit" class=""
                                            onclick="return confirm('Подтвердите удаление')">
                                            <i class="fas fa-trash"></i> Удалить
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td>{{ $area->users->pluck('name')->join(', ') }}</td>
                        <td>
                            <div class="progress-group">
                                Прогресс
                                <span class="float-right"><b>{{ $part[$area->id] }}</b>/{{ $total[$area->id] }}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary"
                                        style="width:{{ ($part[$area->id] / $total[$area->id]) * 100 }}%"></div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p>Локаций пока нет...</p>
@endif
@push('scripts')
    <script>
        $(function() {
            $("#example1").DataTable({
                paging: false,
                ordering: true,
                info: false,
                stateSave: true,
                responsive: false,
                lengthChange: true,
                autoWidth: false,
                buttons: false,
                searching: false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
