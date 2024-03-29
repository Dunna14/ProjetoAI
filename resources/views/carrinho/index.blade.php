@extends('layout_website')
@section('title', 'Carrinho')
@section('content')

    <div class="filme_sessoes border-b border-gray-400">
        <div class="container  mx-auto px-4 py-16">
            <h2 class="text-4xl text-white font-semibold">Carrinho</h2>


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Filme
                            </th>
                            <th scope="col" class="px-6 py-3">
                                opcoes
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carrinho as $row)
                            <tr
                                class="bg-slate-800 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4">
                                    <div class="container mx-auto sm:flex">
                                        <img class="h-48 w-32"
                                            src="{{ $row['cartaz'] ? asset('storage/cartazes/' . $row['cartaz']) : asset('img/default_cartaz.png') }}">
                                        <div class="md:ml-16 mt-10">
                                            <h2 class="text-2xl text-white font-semibold "> {{ $row['filme'] }}</h2>

                                            <p class="mx-1">Data: {{ $row['data'] }}</p>

                                            <p class="mx-1">Horas: {{ $row['hora'] }}</p>

                                            <p class="mx-1">Lugar: {{ $row['fila'] }}{{ $row['posicao'] }}</p>

                                        </div>
                                    </div>
                                </td>
                                <td class="w-80">

                                    <div>
                                        <a
                                            href="{{ route('filmes.show_sessao', ['filme' => $row['filme_id'], 'sessao' => $row['sessao']]) }}">
                                            <button type="submit"
                                                class="w-64 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Adicionar
                                                mais um bilhete</button>
                                        </a>
                                        <p></p>
                                        <form action="{{ route('carrinho.bilhete.destroy', ['bilhete' => $row['id']]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-64 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Apagar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
<tfooter>
<div class="sm:flex text-gray-400 mt-2">

<span class="mx-1 hover:text-orange-300 transition ease-out duration-500">
    <form action="{{ route('carrinho.destroy') }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Apagar carrinho">
    </form>
</span>
</div>
</tfooter>
                </table>

            </div>

            @if (Auth::user())
                                        @if(is_null(Auth::user()->cliente))
                                        @if (Auth::user()->tipo=='C')
                                            <a href="{{ route('clientes.edit_cliente') }}">
                                                <button type="button"
                                                    class="w-64 mt-6 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                                    Tem de configurar o cliente</button>
                                            </a>
                                        @endif
                                            @else
                                            <a href="#" data-toggle="modal" data-target="#payLogal">
                                            <button type="button"
                                                    class="w-64 mt-6 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                                    Pagar</button>
                                            </a>
                                            @endif
                                        @endif
                                        @guest
                                            <a href="{{ route('login') }}">
                                                <button type="button"
                                                    class="w-64 mt-6 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Tem
                                                    de efetuar o login para proceder à compra</button>
                                            </a>
                                        @endguest

            <div class="modal fade" id="payLogal" tabindex="-1" role="dialog" aria-labelledby="payLogal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-slate-800">

                <div class="modal-body text-center">

                    <h5 class="text-white" id="payLogal">Pretende proceder ao pagamento?</h5>

                    <br>

                    <div class="flex items-center justify-center">
                        <form action="{{ route('bilheteira.create') }}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit"
                                class=" text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Sim</button>
                        </form>

                        <button data-dismiss="modal" type="submit"
                                class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Nao</button>


                    </div>
                </div>
            </div>
        </div>
    </div>

        @endsection
