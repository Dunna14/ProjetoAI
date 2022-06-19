@extends('layout_website')
@section('title', 'Historico de compras')

@section('content')


@foreach ($recibos as $recibo)

    <a> Data:{{$recibo->data}}
        Tipo:{{$recibo->tipo_pagamento}}
        Preço:{{$recibo->preco_total_com_iva}}
        referencia de pagamento: {{$recibo->ref_pagamento}}
        <a href="{{route('recibos.show_bilhete',$recibo)}}">Mostrar bilhetes</a>
    </a>
    <br>
@endforeach
{{$recibos->withQueryString()->links()}}
@endsection
