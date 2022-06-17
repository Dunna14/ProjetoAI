@extends('layout_website')
@section('title', $user->name)



    @section('content')
        <div class="movie-info bord-b border-white ml-8 mr-8">
            <div class="container mx-auto px-4 py-16 sm:flex">
                <img class="h-96 w-64"
                    src="{{ $user->foto_url ? asset('storage/fotos/' . $user->foto_url) : asset('img/default_img.png') }}">
                <div class="md:ml-24 ">
                    <br>
                    <h2 class="text-4xl text-white font-semibold "> {{ $user->name }}</h2>
                    <div class="sm:flex items-center text-gray-600 ">
                        <span class="mx-2">|</span>
                        <span class="mx-1">Email: {{ $user->email }}</span>
                    </div>
                    <p class="text-gray-300 mt-8">
                        {{ $user->tipo }}
                    </p>

                    <div class="mt-16">

                        <button type="button"
                            class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                            <a class="fa fa-play mr-1" aria-hidden="true" href="{{ route('user.edit') }}"></a> ALTERAR PERFIL</button>


                    </div>
                </div>
            </div>

        </div>
    @endsection
