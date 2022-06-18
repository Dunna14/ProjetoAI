@extends('layout_website')
@section('title', $user->name)



@section('content')
<div class="movie-info bord-b border-white ml-8 mr-8">
    <div class="container mx-auto px-4 py-16 sm:flex">
        <img class="h-64 rounded-full mt-8"
            src="{{ $user->foto_url ? asset('storage/fotos/' . $user->foto_url) : asset('img/default_img.png') }}">

        <div class="md:ml-24 w-full">
            <form method="POST" action="{{ route('user.update',['user'=>$user])}}" class="form-group" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <br>
            <div class="form-group">
                <div class="mb-3">
                    <label for="text" class="block mb-1 text-xl font-medium text-gray-300">Nome: </label>
                    <input type="text" name="name" id="inputName"
                        class="bg-gray-50 border border-gray-300 text-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('name',$user->name) }}" required>
                </div>
                @error('name')
                <div class="small text-danger"> {{ $message }} </div>
                @enderror
            </div>
            <div>
                <div class="form-group">
                    <div class="mb-3">
                        <label for="email" class="block mb-1 text-xl font-medium text-gray-300">Email: </label>
                        <input type="email" id="inputEmail" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('email',$user->email) }}" required>
                    </div>
                    @error('email')
                    <div class="small text-danger"> {{ $message }} </div>
                    @enderror
                </div>
            </div>
            <div >
                <div class="form-group">

                    <div class="row mb-3">
                        <label for="old_password" class="col-md-4 col-form-label text-md-end">Password Antiga</label>

                        <div class="col-md-6">
                            <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required">

                            @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">Nova Password</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">Confirmar Password</label>

                        <div class="col-md-6">
                            <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required">

                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>
            <div>
            <div class="form-group">
            <label class="block mb-2 text-xl font-medium text-gray-300 dark:text-gray-300" for="file_input">Imagem:</label>
            <input class="block w-full text-sm text-gray-300 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                @error('email')
                <div class="small text-danger"> {{ $message }} </div>
                @enderror
            </div>
            </div>
            <div class="mt-16">

                <button type="submit"
                    class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                    <i class="fa fa-play mr-1" aria-hidden="true"></i> GUARDAR </button>

            </div>
        </form>
        </div>
    </div>

</div>
@endsection
