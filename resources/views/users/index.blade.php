<!--APAGAR ISTO-->
@extends('layout_website')
@section('title', 'Users')

@section('content')


<p class="text-6xl ml-4 mt-8 text-white">@yield('title') <span class="text-5xl text-white">
                            @if($genero != '')
                            - {{$generos[$genero]}}
                            @endif
                        </span></p>

<div class="container">
    <div class= "grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-8">
    @foreach ($filmes as $filme)

        <div class="mt-8">
            <a href="{{ route('filmes.show', ['filme' => $filme]) }}">
            <img class="h-96 w-64 hover:opacity-75 transition ease-in-out duration-150" src="{{ $filme->cartaz_url  ? asset('storage/cartazes/'. $filme->cartaz_url) : asset('img/default_cartaz.png')  }}">
            </a>
            <div>
                <a href="{{ route('filmes.show', ['filme' => $filme]) }}" class="text-xl text-gray-100 mt-1 hover:text-gray:500">{{$filme->titulo}}</a>
                <div class="flex items-center text-gray-700">
                    <span class="ml-1">{{$generos[$filme->genero_code]}}</span>
                    <span class="mx-2" >|</span>
                    <span>Ano: {{$filme->ano}}</span>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>

<br>

{{$filmes->withQueryString()->links()}}
<br>
@endsection
