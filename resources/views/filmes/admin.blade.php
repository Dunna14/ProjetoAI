@extends('layout_admin')

@section('title', 'Filmes')

@section('content')
    <div class="row mb-3">
        <div class="col-3">
            @can('create', App\Models\Filme::class)
                <a href="{{ route('admin.filmes.create') }}" class="btn btn-success" role="button"
                    aria-pressed="true">Nova
                    Filme</a>
            @endcan
        </div>
        <div class="col-9">
            <form method="GET" action="{{ route('admin.filmes') }}" class="form-group">
                <div class="input-group">
                    <select class="custom-select" name="genero" id="inputgenero" aria-label="Genero">
                        <option value="" {{ '' == old('genero', $genero) ? 'selected' : '' }}>Todos Generos</option>
                        @foreach ($generos as $code =>$nome)
                            <option value={{ $code }} {{ $code == old('genero', $genero) ? 'selected' : '' }}>
                                {{ $nome }}</option>
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
                <th>Titulo</th>
                <th>Sumario</th>
                <th>Ano</th>
                <th>Genero</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($filmes as $filme)
                <tr>
                    <td>{{ $filme->titulo }}</td>
                    <td>{{ $filme->sumario }}</td>
                    <td>{{ $filme->ano }}</td>
                    <td>{{ $filme->genero_code }}</td>
                    <td><i class="fas {{ $filme ->opcional ? 'fa-check' : 'fa-times' }}"></i></td>
                    <td nowrap>
                        @can('view', $filme)
                            <a href="{{ route('admin.filmes.edit', ['filme' => $filme]) }}"
                                class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i
                                    class="fas fa-pen"></i></a>
                        @else
                            <span class="btn btn-secondary btn-sm disabled"><i class="fa fa-pen"></i></span>
                        @endcan
                        @can('delete', $filme)
                        <form action="{{ route('admin.filmes.destroy', ['filme' => $filme]) }}" method="POST"
                            class='d-inline' onsubmit="return confirm('Tem a certeza que deseja apagar o registo?')">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                        @else
                            <span class="btn btn-secondary btn-sm disabled"><i class="fa fa-trash"></i></span>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $filmes->withQueryString()->links() }}
@endsection
