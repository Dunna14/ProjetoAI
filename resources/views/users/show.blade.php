@extends('layout_website')
@section('title', $user->name)



@section('content')
    <div class="movie-info bord-b border-white ml-8 mr-8">
        <div class="container mx-auto px-4 py-16 sm:flex">
            <img class="h-64 rounded-full"
                src="{{ $user->foto_url ? asset('storage/fotos/' . $user->foto_url) : asset('img/default_img.png') }}">
            <div class="md:ml-24 ">
                <br>
                <h2 class="text-4xl text-white font-semibold "> {{ $user->name }}</h2>
                <div class="sm:flex items-center text-gray-400 text-xl">
                    <span class="mt-4">Email: {{ $user->email }}</span>
                </div>

                <div class="mt-10">
                    <a aria-hidden="true" href="{{ route('user.edit') }}">
                        <button type="button"
                            class="flex h-10 flex-row text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">

                            <span class="flex items-center justify-center text-lg"> <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg></span> <span class="ml-2">ALTERAR PERFIL</span></button>
                        <a aria-hidden="true" href="{{ route('recibos.show', $user) }}">
                            <button type="button"
                                class="flex h-10 flex-row text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">

                                <span class="flex items-center justify-center text-lg"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                    </svg>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span> <span class="ml-2">HISTORICO DE COMPRAS</span></button>
                        </a>
                        <a aria-hidden="true" href="{{ route('clientes.edit_cliente') }}">
                            <button type="button"
                                class="flex h-10 flex-row text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                                <i class="fa fa-credit-card" aria-hidden="true"></i>
                                <span class="ml-2">Alterar dados de pagamento</span></button>
                        </a>
                    </a>
                </div>
            </div>

        </div>
    @endsection
