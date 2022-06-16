<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function index(Request $request)
    {
        return view('carrinho.index')
            ->with('pageTitle', 'Carrinho de compras')
            ->with('carrinho', session('carrinho') ?? []);
    }



    public function store(Request $request)
    {
        $carrinho = $request->session()->get('carrinho', []);
        $idEstampa = $request->input('idEstampa');
        $imagem_url= $request->input('imagem_url');
        $cor_codigo = $request->input('cor_codigo');
        $tamanho = $request->input('tamanho');
        $quantidade = $request->input('quantidade');

        $qtd = ($carrinho[$idEstampa]['qtd'] ?? 0) + 1;

        $carrinho[$idEstampa] = [
            'qtd' => $qtd,
            'idEstampa' => $idEstampa,
            'imagem_url'=> $imagem_url,
            'cor_codigo' => $cor_codigo,
            'tamanho' => $tamanho,
            'quantidade' => $quantidade,
        ];


        $tamanhoCarrinho = count($carrinho);
        $request->session()->put('tamanhoCarrinho', $tamanhoCarrinho);

        $request->session()->put('carrinho', $carrinho);
        //return dd($qtd);
        return back()
            ->with('alert-msg', 'Foi adicionado ao carrinho o filme "' . $idEstampa . '" ao carrinho! Quantidade de inscrições = ' .  $qtd)
            ->with('alert-type', 'success');
    }

    public function destroy(Request $request)
    {
        $request->session()->forget('carrinho');
        return back()
            ->with('alert-msg', 'Carrinho foi limpo!')
            ->with('alert-type', 'danger');
    }
}
