@extends('layout_admin')
@section('title', 'Novo Genero' )
@section('content')
    <form method="POST" action="{{route('admin.generos.store')}}" class="form-group">
        @csrf
        @include('generos.partials.create-edit')
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.generos.create')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
