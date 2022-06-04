@extends('layout_admin')
@section('title', 'Nova Sala' )
@section('content')
    <form method="POST" action="{{route('admin.salas.store')}}" class="form-group">
        @csrf
        @include('salas.partials.create-edit')
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.salas.create')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
