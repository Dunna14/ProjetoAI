@extends('layout_admin')
@section('title', 'Nova Sessão' )
@section('content')
    <form method="POST" action="{{route('admin.sessoes.store')}}" class="form-group">
        @csrf
        @include('sessoes.partials.create-edit')
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.sessoes.create')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
