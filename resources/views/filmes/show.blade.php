@extends('layout_website')
@section('title',$filme->titulo )

@section('selectbar')
<select class="custom-select" name="genero" id="inputgenero" aria-label="Genero">
                        <option id="dropdown-button"value="" {{ '' == old('genero', $genero) ? 'selected' : '' }}>Todos Generos</option>
                        @foreach ($generos as $code =>$nome)
                            <option  value={{ $code }} {{ $code == old('genero', $genero) ? 'selected' : '' }}>
                                {{ $nome }}</option>
                        @endforeach
                    </select>
@endsection

@section('content')
<div class="movie-info bord-b border-white ml-8 mr-8">
    <div class = "container mx-auto px-4 py-16 sm:flex">
    <img class="h-96 w-64" src="{{ asset('storage/cartazes/'. $filme->cartaz_url) }}">
<div class = "md:ml-24 ">
<br>
<h2 class="text-4xl text-white font-semibold "> {{$filme->titulo}}</h2>
<div class="sm:flex items-center text-gray-600 ">
                    <a href= "/filmes?genero={{$filme->genero_code}}"class="ml-1 hover:text-orange-300 transition ease-out duration-500">{{$generos[$filme->genero_code]}}</a>
                        <span  class="mx-2">|</span>    
                    <span  class="mx-1">Ano: {{$filme->ano}}</span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{$filme->sumario}}
                </p>
     
               <div class="mt-16"> 
<a  href="{{url($filme->trailer_url)}}">
  <button type="button" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 "> <i class="fa fa-play mr-1" aria-hidden="true"></i> Ver Trailer !</button>
</a>
</div>
</div> 
</div>
@endsection