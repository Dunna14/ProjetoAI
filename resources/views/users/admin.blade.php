@extends('layout_admin')

@section('title', 'Users')

@section('content')
    <div class="row mb-3">
        <div class="col-3">
            @can('create', App\Models\User::class)
                <a href="{{ route('admin.users.create') }}" class="btn btn-success" role="button"
                    aria-pressed="true">Novo User</a>
            @endcan
        </div>
        <div class="col-9">
            <form method="GET" action="{{ route('admin.users') }}" class="form-group">
                <div class="input-group">
                    <select class="custom-select" name="tipo" id="inputTipo" aria-label="Tipo">
                        <option value="" {{ '' == old('tipo', $tipo) ? 'selected' : '' }}>Todos os Tipos</option>
                        @foreach ($tipos as $name =>$tipo)
                            <option value={{ $name }} {{ $tipo == old('tipo', $tipo) ? 'selected' : '' }}>
                                {{ $name }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Filtrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>password</th>
                <th>tipo</th>
                <th>Bloqueado</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->tipo }}</td>
                    <td>{{ $user->bloqueado }}</td>

                    <td nowrap>
                        @can('view', $user)
                            <a href="{{ route('admin.users.edit', ['user' => $user]) }}"
                                class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i
                                    class="fas fa-pen"></i></a>
                        @else
                            <span class="btn btn-secondary btn-sm disabled"><i class="fa fa-pen"></i></span>
                        @endcan
                        @can('delete', $user)
                        <form action="{{ route('admin.users.destroy', ['user' => $user]) }}" method="POST"
                            class='d-inline' onsubmit="return confirm('Tem a certeza que deseja apagar o registo?')">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                        @else
                            <span class="btn btn-secondary btn-sm disabled"><i class="fa fa-trash"></i></span>
                        @endcan

                        @if($user->tipo == 'A')
                            <span class="btn btn-secondary btn-sm disabled"><i class="fa fa-{{$user->bloqueado == 1 ? "lock" : "unlock"}}"></i></span>

                            @else
                        <form action="{{ route('admin.users.edit_bloeuqado', ['user' => $user]) }}" method="POST"
                            class='d-inline' onsubmit="return confirm('Tem a certeza que deseja alterar o registo?')">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-lock"></i></button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->withQueryString()->links() }}
@endsection
