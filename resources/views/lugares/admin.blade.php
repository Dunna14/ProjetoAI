@extends('layout_admin')
@section('title', 'Lugares')
@section('content')
    <div class="row mb-3">
        @can('create', App\Models\Lugar::class)
            <a href="{{ route('admin.lugares.create') }}" class="btn btn-success" role="button" aria-pressed="true">Novo Lugar</a>
        @endcan
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Fila</th>
                <th>Posição</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lugares as $lugar)
                <tr>
                    <td>{{ $lugar->fila }}</td>
                    <td>{{ $lugar->posicao }}</td>
                    <td nowrap>
                        @can('view', $lugar)
                            <a href="{{ route('admin.lugares.edit', ['lugar' => $lugar]) }}" class="btn btn-primary btn-sm"
                                role="button" aria-pressed="true"><i class="fa fa-pen"></i></a>
                        @else
                            <span class="btn btn-secondary btn-sm disabled"><i class="fa fa-pen"></i></span>
                        @endcan
                        @can('delete', $lugar)
                        <form action="{{ route('admin.lugares.destroy', ['lugar' => $lugar]) }}" method="POST"
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
