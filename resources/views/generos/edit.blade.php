@extends('layout_admin')
@section('title','Alterar Genero' )
@section('content')
    <form method="POST" action="{{route('admin.generos.update', ['genero' => $genero]) }}" class="form-group">
        @csrf
        @method('PUT')
        @include('generos.partials.create-edit')
        <input type="hidden" name="genero_code" value="{{$genero->code}}">
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.generos.edit', ['genero' => $genero]) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
