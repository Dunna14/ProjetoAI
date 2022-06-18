<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Models\Sessao;
use App\Models\Bilhete;
use App\Models\Filme;
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

        $sessaoLugar = $sessao->id + $lugar->id;
        $carrinho[$sessaoLugar] = [
            'id' => $sessaoLugar,
            'filme' => $sessao->filme->titulo,
            'cartaz' => $sessao->filme->cartaz_url,
            'filme_id' => $sessao->filme->id,
            'sala' => $sessao->sala_id,
            'fila' => $lugar->fila,
            'data' => $sessao->data,
            'sessao' => $sessao->id,
            'hora' => $sessao->horario_inicio,
            'posicao' => $lugar->posicao
        ];

        $tamanhoCarrinho = count($carrinho);
        $request->session()->put('tamanhoCarrinho', $tamanhoCarrinho);

        $request->session()->put('carrinho', $carrinho);
        return back()
            ->with('alert-msg', 'Foi adicionado a sessao "' . $sessao->id . '" ao carrinho!')
            ->with('alert-type', 'success');
    }

    public function update_carrinho(Request $request, Sessao $sessao, Lugar $lugar) {

        $carrinho = $request->session()->get('carrinho', []);

        $sessaoLugar = $sessao->id + $lugar->id;

        $carrinho[$sessaoLugar] = [
            'id' => $sessaoLugar,
            'filme' => $sessao->filme->titulo,
            'filme_id' => $sessao->filme->id,
            'cartaz' => $sessao->filme->cartaz_url,
            'sala' => $sessao->sala_id,
            'fila' => $lugar->fila,
            'data' => $sessao->data,
            'hora' => $sessao->horario_inicio,
            'sessao' => $sessao->id,
            'posicao' => $lugar->posicao
        ];

        $request->session()->put('carrinho', $carrinho);
        return back()
            ->with('alert-msg', "Atualizado com sucesso")
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

    public function carrinho_show(Request $request, $id)
    {
        $sessao = Sessao::find($id);
        $user    = auth()->user();
        $carrinho = $request->session()->get('carrinho', []);

        if($sessao):
            return view('carrinho.index', compact('sessao', 'user', 'carrinho','filme'));
        endif;
    }
}
