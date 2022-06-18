@extends('layout_website')
@section('title', $filme->titulo)

@section('selectbar')
    <select class="custom-select" name="genero" id="inputgenero" aria-label="Genero">
        <option id="dropdown-button" value="" {{ '' == old('genero', $genero) ? 'selected' : '' }}>Todos Generos
        </option>
        @foreach ($generos as $code => $nome)
            <option value={{ $code }} {{ $code == old('genero', $genero) ? 'selected' : '' }}>
                {{ $nome }}</option>
        @endforeach

    @endsection

    @section('content')
        @if($sala != null)
        <div class='ml-8 mr-8'>
            <div class="container mx-auto text-center flex justify-center h-screen">
                <div>
                    <h2 class="text-4xl text-white font-semibold mb-2"> {{ $filme->titulo }}</h2>
                    <div class="sm:flex text-gray-400  justify-center">

                        <span class="mx-1">{{ $sala->nome }}</span>
                        <span class="mx-2">|</span>
                        <span class="mx-1">Data: {{ $sessao->data }}</span>
                        <span class="mx-2">|</span>
                        <span class="mx-1">Hora: {{ $sessao->horario_inicio }}</span>

                    </div>
                    <table class='mt-5'>
                        <thead>
                            <tr>
                                <th></th>
                                @for ($j = 1; $j <= $colunas; $j++)
                                    <th class='text-center text-l text-white'>{{ $j }}</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($filas as $fila)
                                <tr>
                                    <th class='text-l text-white'>{{ $fila->fila }}</th>
                                    @foreach ($lugares as $lugar)
                                        @php($i = false)
                                        @foreach ($bilhetes as $bilhete)
                                            @if ($lugar->id == $bilhete->lugar_id)
                                                @php($i = true)
                                            @endif
                                        @endforeach
                                        @if (!$i && $lugar->fila == $fila->fila)
                                            <td>
                                                <form
                                                    action="{{ route('carrinho.bilhete.store', ['sessao' => $sessao, 'lugar' => $lugar]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="submit" value="Add"
                                                        class="w-12 h-12 m-2 text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm text-center"></input>
                                                </form>
                                            </td>
                                        @elseif($i && $lugar->fila == $fila->fila)
                                            <th>
                                                <button disabled type="button"
                                                    class="w-12 h-12 m-2  text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm"></button>
                                            </th>
                                        @endif
                                    @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @else
        <h2 class="text-4xl text-white font-semibold mb-2">Não existe sala para ver este filme :|</h2>
        @endif
    @endsection
