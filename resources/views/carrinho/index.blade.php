@extends('layout_website')

@section('content')

<form action="{{ route('carrinho.destroy') }}" method="POST">
    @csrf
    @method("DELETE")
    <input type="submit" value="Apagar carrinho">
</form>


@foreach ($carrinho as $carrinhoLinha)
@dump($carrinhoLinha)




<!--<button class="btn btn-warning" onClick="MyWindow=window.open('viewer.php?tshirt={{$carrinhoLinha['cor_codigo']}}&estampa={{$carrinhoLinha['imagem_url']}}','popup','width=500,height=550'); return false;">Preview</button>
-->
@endforeach




@endsection
