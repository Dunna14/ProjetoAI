@extends('layout_admin')
@section('title', 'Alterar Filme')
@section('content')

    <form method="POST" action="{{route('admin.filmes.update',['filme'=>$filme])}}" class="form-group" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('filmes.partials.create-edit')
        <div>
            <img src="{{ asset($filme->cartaz_url) }}">
        </div>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-success" name="ok">Save</button>
            <a href="{{route('admin.filmes.edit',['filme'=>$filme])}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
