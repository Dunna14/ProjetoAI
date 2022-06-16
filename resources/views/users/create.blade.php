@extends('layout_admin')
@section('title', 'Novo User')
@section('content')

    <form method="POST" action="{{route('admin.users.store')}}" class="form-group" enctype="multipart/form-data">
        @csrf
        @include('users.partials.create-edit')
        <div class="form-group text-right">
            <button type="submit" class="btn btn-success" name="ok">Save</button>
            <a href="{{route('admin.users.create')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>

@endsection
