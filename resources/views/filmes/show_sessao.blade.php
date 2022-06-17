@extends('layout_website')
@section('title',$filme->titulo )

@section('selectbar')
<select class="custom-select" name="genero" id="inputgenero" aria-label="Genero">
    <option id="dropdown-button" value="" {{ '' == old('genero', $genero) ? 'selected' : '' }}>Todos Generos</option>
    @foreach ($generos as $code =>$nome)
    <option value={{ $code }} {{ $code == old('genero', $genero) ? 'selected' : '' }}>
        {{ $nome }}</option>
    @endforeach

    @endsection

    @section('content')
            
    @foreach($lugares as $lugar)
    @php ($i = false)
    @foreach($bilhetes as $bilhete)

    @if($lugar->id == $bilhete->lugar_id)
            @php ($i = true)
    @endif
    @endforeach

    @if(!$i)
        {{$lugar->id}}
    @endif
    @endforeach
    @endsection