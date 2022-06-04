@extends('layout_admin')
@section('title','Alterar Sala' )
@section('content')
    <form method="POST" action="{{route('admin.salas.update', ['sala' => $sala]) }}" class="form-group">
        @csrf
        @method('PUT')
        @include('salas.partials.create-edit')
        <input type="hidden" name="sala_nome" value="{{$sala->nome}}">
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.salas.edit', ['sala' => $sala]) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
