@extends('layout_admin')
@section('title', 'Novo Lugar' )
@section('content')
    <form method="POST" action="{{route('admin.lugares.store')}}" class="form-group">
        @csrf
        @include('lugares.partials.create-edit')
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.lugares.create')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
