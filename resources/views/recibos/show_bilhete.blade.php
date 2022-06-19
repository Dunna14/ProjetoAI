@extends('layout_website')
@section('title', 'Historico de compras')
@section('content')
<a>
    @foreach ($bilhetes as $bilhete )


    id:{{$bilhete->id}}
    recibo_id:{{$bilhete->recibo_id}}
    sessao_id:{{$bilhete->sessao_id}}
    lugar_id:{{$bilhete->lugar_id}}
    <a href="{{route('bilhete.downloadBilhetePDF', $bilhete)}}">download pfd</a>
    <br>
    @endforeach
</a>
@endsection