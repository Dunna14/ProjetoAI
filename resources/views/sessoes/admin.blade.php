@extends('layout_admin')
@section('title', 'Sessões')
@section('content')
    <div class="row mb-3">
        @can('create', App\Models\Sessao::class)
            <a href="{{ route('admin.sessoes.create') }}" class="btn btn-success" role="button" aria-pressed="true">Nova Sessao</a>
        @endcan
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Data</th>
                <th>Hora Inicio</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sessoes as $sessao)
                <tr>
                    <td>{{ $sessao->data }}</td>
                    <td>{{ $sessao->horario_inicio }}</td>
                    <td nowrap>
                        @can('view', $sessao)
                            <a href="{{ route('admin.sessoes.edit', ['sessao' => $sessao]) }}" class="btn btn-primary btn-sm"
                                role="button" aria-pressed="true"><i class="fa fa-pen"></i></a>
                        @else
                            <span class="btn btn-secondary btn-sm disabled"><i class="fa fa-pen"></i></span>
                        @endcan
                        @can('delete', $sessao)
                        <form action="{{ route('admin.sessoes.destroy', ['sessao' => $sessao]) }}" method="POST"
                            class="d-inline" onsubmit="return confirm('Tem a certeza que deseja apagar o registo');">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </form>
                        @else
                        <span class="btn btn-secondary btn-sm disabled"><i class="fa fa-trash"></i></span>
                    @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
