@extends('layout_admin')
@section('title', 'Alterar User')
@section('content')

    <form method="POST" action="{{route('admin.users.update',['user'=>$user])}}" class="form-group" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('users.partials.create-edit')
        <div>
            <img src="{{ $user->foto_url ? asset('storage/fotos/' . $user->foto_url) : asset('img/default_img.png')  }}">
        </div>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-success" name="ok">Save</button>
            <a href="{{route('admin.users.edit',['user'=>$user])}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
