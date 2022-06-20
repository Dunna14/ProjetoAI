@extends('layout_website')
@section('title', $user->name)


@section('content')
    <div class="movie-info bord-b border-white ml-8 mr-8">
        <div class="container mx-auto px-4 py-16 sm:flex">
            <img class="h-64 rounded-full mt-8"
                src="{{ $user->foto_url ? asset('storage/fotos/' . $user->foto_url) : asset('img/default_img.png') }}">

            <div class="md:ml-24 w-full">
                <form method="POST" action="{{ route('cliente.update', ['user' => $user]) }}" class="form-group"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <br>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="text" class="block mb-1 text-xl font-medium text-gray-300">Nif: </label>
                            <input type="text" name="nif" id="inputNif"
                                class="bg-gray-50 border border-gray-300 text-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ old('nif', $cliente->nif) ? $cliente->nif : '' }}" required>
                        </div>
                        @error('nif')
                            <div class="small text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div>

                        <select class="custom-select" name="tipo_pagamento" id="inputtipo_pagamento"
                            aria-label="tipo_pagamento">
                            <option id="dropdown-button" selected="{{ old('tipo_pagamento', $cliente->tipo_pagamento) }}">
                                Tipo de Pagamento
                            </option>

                            <option {{ old('tipo_pagamento', $cliente->tipo_pagamento == 'MBWAY') ? 'selected' : '' }}
                                value="MBWAY">MBWAY</option>
                            <option {{ old('tipo_pagamento', $cliente->tipo_pagamento == 'VISA') ? 'selected' : '' }}
                                value="VISA">VISA</option>
                            <option {{ old('tipo_pagamento', $cliente->tipo_pagamento == 'PAYPAL') ? 'selected' : '' }}
                                value="PAYPAL">PAYPAL</option>

                        </select>
                        @error('tipo_pagamento')
                            <div class="small text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="text" class="block mb-1 text-xl font-medium text-gray-300">Referencia do
                                    Pagamento:
                                </label>
                                <input type="text" name="ref_pagamento" id="inputref_pagamento"
                                    class="bg-gray-50 border border-gray-300 text-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ old('ref_pagamento', $cliente->ref_pagamento) ? $cliente->ref_pagamento : '' }}"
                                    required>
                            </div>
                            @error('ref_pagamento')
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
