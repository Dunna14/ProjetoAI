@extends('layout_website')
@section('title', 'Historico de compras')
@section('content')


<div class="movie-info bord-b border-white ml-8 mr-8">
<h2 class="text-4xl text-white font-semibold mb-4 "> Bilhetes</h2>

<div class="filme_sessoes border-b border-gray-400">
            <div class="container  mx-auto px-4 py-16">
                <br>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sessao
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Lugar
                                </th>
                                <th scope="col" class="text-center">
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($bilhetes as $bilhete )
                            <tr
                                class="bg-slate-800 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-semibold text-white whitespace-nowrap">
                                {{$bilhete->id}}
                                </th>
                                <td class="px-6 py-4">
                                {{$bilhete->sessao_id}}
                                                            </td>
                                <td class="px-6 py-4">
                                {{$bilhete->lugar_id}}
                                </td>
                                <td class="text-center">
                                <a href="{{route('bilhete.downloadBilhetePDF', $bilhete)}}">
                                        <button type="button"
                                            class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 h-10">Download PDF</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
            {{$bilhetes->withQueryString()->links()}}
            <br>
        </div>
    <br>
</div>
@endsection
