@if (count($areas))
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 30px">#</th>
                <th>Локация</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($areas as $area)
                <tr>
                    <td>{{ $area->id }}</td>
                    <td><a href="{{ route('consumers.show', [$area->id]) }}">{{ $area->name }}</a>
                    </td>
                    <td>
                        <a href="{{ route('areas.edit', ['area' => $area->id]) }}"
                            class="btn btn-info btn-sm float-left mr-1">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route('areas.destroy', ['area' => $area->id]) }}" method="POST"
                            class="float-left">
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
    </table>
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
                responsive: true,
                lengthChange: true,
                autoWidth: false,
                buttons: false,
                searching: false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
