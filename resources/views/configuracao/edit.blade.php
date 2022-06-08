@extends('layout_admin')
@section('title','Alterar Configuracao' )
@section('content')
    <form method="POST" action="{{route('admin.configuracao.update', ['configuracao' => $configuracao]) }}" class="form-group">
        @csrf
        @method('PUT')
        @include('configuracao.partials.create-edit')
        <input type="hidden" name="genero_code" value="{{$configuracao->preco_bilhete_sem_iva}}">
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.preco_bilhete_sem_iva.edit', ['preco_bilhete_sem_iva' => $preco_bilhete_sem_iva]) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
