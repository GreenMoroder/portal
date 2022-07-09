@if (count($roles))
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 1%">
                    #
                </th>
                <th style="width: 20%">
                    Роль
                </th>
                <th style="width: 20%">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>
                        {{ $role->id }}
                    </td>
                    <td>
                        {{ $role->name }}
                    </td>
                    <td>
                        <a href="{{ route('roles.edit', ['role' => $role->id]) }}"
                            class="btn btn-info btn-sm float-left mr-1">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="POST"
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
    </div>
@else
    <p>Ролей пока нет...</p>
@endif
