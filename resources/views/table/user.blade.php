@if (count($users))
    <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Имя
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Роль
                    </th>
                    <th>
                        Локация
                    </th>
                    <th>
                        Action
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
                            {{ $user->email }}
                        </td>

                        <td>
                            @foreach ($user->roles as $role)
                                {{ $role['name'] }}
                            @endforeach
                        </td>
                        <td>
                            {{ $user->areas->pluck('name')->join(', ') }}
                        </td>

                        <td>
                            <div class="btn-group">
                                <a style="border-radius: 5px" class="mx-1 btn btn-info"
                                    href="{{ route('users.edit', ['user' => $user->id]) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
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
    <p>Пользователей пока нет...</p>
@endif
@push('scripts')
    <script>
        $(function() {
            $("#example1").DataTable({
                paging: false,
                ordering: false,
                info: false,
                responsive: false,
                lengthChange: true,
                buttons: ["colvis"],
                searching: false,
                select: true,
                colReorder: false,
                stateSave: true,

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
