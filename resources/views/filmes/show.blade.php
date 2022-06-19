@extends('layout_website')
@section('title',$filme->titulo )

@section('selectbar')
<form class="d-md-flex input-group w-auto my-auto" method="GET" action="{{ route('filmes.index') }}"
                    class="form-group">
<select class="custom-select" name="genero" id="inputgenero" aria-label="Genero">
                        <option id="dropdown-button"value="" {{ '' == old('genero', $genero) ? 'selected' : '' }}>Todos Generos</option>
                        @foreach ($generos as $code =>$nome)
                            <option  value={{ $code }} {{ $code == old('genero', $genero) ? 'selected' : '' }}>
                                {{ $nome }}</option>
                        @endforeach
                    </select>
                    <button type="submit"><span class="input-group-text border-0 h-10 border-white bg-slate-800 text-gray-100"><i
                                class="fas fa-search"></i></span></button>
                </form>
    @endsection

    @section('content')
    <div class="movie-info bord-b border-white ml-8 mr-8">
        <div class="container mx-auto px-4 py-16 sm:flex">
            <img class="h-96 w-64" src="{{ $filme->cartaz_url  ? asset('storage/cartazes/'. $filme->cartaz_url) : asset('img/default_cartaz.png')  }}">
            <div class="md:ml-24 ">
                <br>
                <h2 class="text-4xl text-white font-semibold "> {{$filme->titulo}}</h2>
                <div class="sm:flex items-center text-gray-600 ">
                    <a href="/filmes?genero={{$filme->genero_code}}"
                        class="ml-1 hover:text-orange-300 transition ease-out duration-500">{{$generos[$filme->genero_code]}}</a>
                    <span class="mx-2">|</span>
                    <span class="mx-1">Ano: {{$filme->ano}}</span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{$filme->sumario}}
                </p>

                <div class="mt-16">

                @if($filme->trailer_url != null)
                    <a href="{{url($filme->trailer_url)}}">
                        <button type="button"
                            class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                            <i class="fa fa-play mr-1" aria-hidden="true"></i> Ver Trailer !</button>
                    </a>
                @else
                <p class="text-white font-bold">Este filme nao tem trailer 😔 !</p>
                @endif
                </div>
            </div>
        </div>
        <div class="filme_sessoes border-b border-gray-400">
            <div class="container  mx-auto px-4 py-16">
                <h2 class="text-4xl text-white font-semibold">Sessoes</h2>
                <br>
                @if($sessoes != '')
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Data
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Horario
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sala
                                </th>
                                <th scope="col" class="text-center">
                                    Comprar
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sessoes as $sessao)
                            <tr
                                class="bg-slate-800 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-semibold text-white whitespace-nowrap">
                                    {{$sessao->data}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$sessao->horario_inicio}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$sessao->sala_id}}
                                </td>
                                <td class="text-center">
                                <a href="{{ route('filmes.show_sessao', ['filme' => $filme, 'sessao' => $sessao] ) }}">
                                        <button type="button"
                                            class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 h-10"><i
                                                class="fa fa-shopping-cart text-white"></i></button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                @else
                <p class="text-center text-white font-bold">Este filme nao tem sessoes 😔 !</p>
                @endif
            </div>
            {{$sessoes->withQueryString()->links()}}
            <br>
        </div>

    
    </div>



    @endsection