<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Models\Sessao;
use App\Models\Bilhete;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function index(Request $request)
    {
        return view('carrinho.index')
            ->with('pageTitle', 'Carrinho de compras')
            ->with('carrinho', session('carrinho') ?? []);
    }



    public function store_bilhete(Request $request, Sessao $sessao, Lugar $lugar)
    {
        $carrinho = $request->session()->get('carrinho', []);
        $qtd = ($carrinho[$sessao->id]['qtd'] ?? 0) + 1;

        $carrinho[$sessao->id] = [
            'id' => $sessao->id,
            'qtd' => $qtd,
            'fila' => $lugar->fila,
            'posicao' => $lugar->posicao
        ];


        $tamanhoCarrinho = count($carrinho);
        $request->session()->put('tamanhoCarrinho', $tamanhoCarrinho);

        $request->session()->put('carrinho', $carrinho);
        return back()
            ->with('alert-msg', 'Foi adicionado a sessao "' . $sessao->id . '" ao carrinho! Quantidade de bilhetes = ' .  $qtd)
            ->with('alert-type', 'success');
    }

    public function update_carrinho(Request $request, Bilhete $bilhete) {

        $carrinho = $request->session()->get('carrinho', []);
        $qtd = $carrinho[$bilhete->id]['qtd'] ?? 0;
        $qtd += $request->quantidade;
        if ($request->quantidade < 0) {
            $msg = 'Foram removidas ' . -$request->quantidade . ' bilhetes ao carrinho com o filme: "' . $bilhete->sessoes->filmes->titulo . '"! Quantidade de bilhetes atuais = ' .  $qtd;
        } elseif ($request->quantidade > 0) {
            $msg = 'Foram adicionadas ' . $request->quantidade . ' bilhetes ao carrinho com o filme: "' . $bilhete->sessoes->filmes->titulo . '"! Quantidade de bilhetes atuais = ' .  $qtd;
        }
        if ($qtd <= 0) {
            unset($carrinho[$bilhete->id]);
            $msg = 'Foram removidas todos os bilhetes do carrinho "' . $bilhete->sessoes->filmes->titulo . '"';
        } else {
            $carrinho[$bilhete->id] = [
                'id' => $bilhete->id,
                'qtd' => $qtd,
                'sessao' => $bilhete->sessao_id,
                'lugar' => $bilhete->lugar_id,
                'filme' => $bilhete->filme_id
            ];
        }
        $request->session()->put('carrinho', $carrinho);
        return back()
            ->with('alert-msg', $msg)
            ->with('alert-type', 'success');
    }

    public function destroy(Request $request)
    {
        $request->session()->forget('carrinho');
        return back()
            ->with('alert-msg', 'Carrinho foi limpo!')
            ->with('alert-type', 'danger');
    }

    public function destroy_bilhete(Request $request, Bilhete $bilhete) {
        $carrinho = $request->session()->get('carrinho', []);
        if (array_key_exists($bilhete->id, $carrinho)) {
            unset($carrinho[$bilhete->id]);
            $request->session()->put('carrinho', $carrinho);
            return back()
                ->with('alert-msg', 'Foram removidas todos os bilhetes do carrinho')
                ->with('alert-type', 'success');
        }
        return back()
            ->with('alert-msg', 'O carrinho já estava limpo!')
            ->with('alert-type', 'warning');
    }

    public function carrinho_show(Request $request, Bilhete $id)
    {
        $bilhete = Bilhete::find($id);
        $user    = auth()->user();
        $carrinho = $request->session()->get('carrinho', []);

        if($bilhete):
            return view('carrinho.index', compact('bilhete', 'user', 'carrinho'));
        endif;
    }
}
