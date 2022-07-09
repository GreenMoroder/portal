@if (count($users))
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
                    Статус
                </th>
                <th>
                    Action</th>
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

                    <td class="project-state">
                        <span class="badge badge-success">Success</span>
                    </td>
                    <td style="min-width: 100px">

                        <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                            class="btn btn-info btn-sm float-left mr-1">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action=""{{ route('users.destroy', ['user' => $user->id]) }}" method="POST"
                            class="float-left">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Подтвердите удаление')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Пользователей пока нет...</p>
@endif
