<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Sala;
use App\Models\User;
use App\Models\Filme;
use App\Models\Lugar;
use App\Models\Recibo;
use App\Models\Sessao;
use App\Models\Bilhete;
use App\Models\Cliente;
use App\Models\Configuracao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ConfiguracaoPost;

class BilheteController extends Controller
{
    public function admin_index(Request $request)
    {
        $recibo = $request->recibo ?? '';
        $cliente = $request->cliente ?? '';
        $sessao = $request->sessao ?? '';
        $lugar = $request->lugar ?? '';

        $qry = Bilhete::query();
        if ($recibo) {
            $qry->where('recibo_id', $recibo);
        }
        if ($cliente) {
            $qry->where('cliente_id', $cliente);
        }
        if ($sessao) {
            $qry->where('sessao_id', $sessao);
        }
        if ($lugar) {
            $qry->where('lugar_id', $lugar);
        }

        $bilhetes = $qry->paginate(10);
        $recibos = Recibo::pluck('nome', 'code');
        $clientes = Cliente::pluck('nome', 'code');
        $sessoes = Sessao::pluck('nome', 'code');
        $lugares = Lugar::pluck('nome', 'code');

        return view('bilhetes.admin', compact('bilhetes', 'recibos', 'clientes', 'sessoes', 'lugares', 'recibo', 'cliente', 'sessao', 'lugar'));

    }


    public function invalidar_invalidardex(Request $request)
    {
        $bilhete = Bilhete::find($request->id);
        if($bilhete->estado == 'não usado') {
            $bilhete->estado = 'usado';
            $bilhete->save();
            return back()->with('alert-msg', 'Bilhete válido!')->with('alert-type', 'success');
        }

        $bilhete->save();
        return back()->with('alert-msg', 'Bilhete invalidado!')->with('alert-type', 'success');

    }

    public function downloadBilhetePDF(Bilhete $bilhete)
    {
        $sessao=Sessao::find($bilhete->sessao_id);
        $filme=Filme::find($sessao->filme_id);
        $recibo=Recibo::find($bilhete->recibo_id);
        $sala=Sala::find($sessao->sala_id);
        $lugar=Lugar::find($bilhete->lugar_id);
        $cliente=Cliente::find($bilhete->cliente_id);
        $user=User::find($cliente->id);
        $pdf = PDF::loadView('bilhetes\pdf',compact('bilhete','filme','recibo','sala','sessao','lugar','cliente','user'));
        return $pdf->download('invoice.pdf');

    }


    public function edit(Bilhete $bilhete)
    {
        $recibos = Recibo::all();
        $clientes = Cliente::all();
        $sessoes = Sessao::all();
        $lugares = Lugar::all();
        return view('bilhetes.edit', compact('bilhete', 'recibos', 'clientes', 'sessoes', 'lugares'));
    }

    public function update(ConfiguracaoPost $request, Bilhete $bilhete)
    {
        $bilhete->fill($request->validated());

        $bilhete->save();

        return redirect()->route('admin.bilhetes')
            ->with('alert-msg', 'Bilhete foi alterada com sucesso!')
            ->with('alert-type', 'success');
    }


    public function show(Request $request, Bilhete $bilhete)
    {
        $recibos = Recibo::pluck('nome', 'code');
        $recibo = $request->query('recibo');

        $bilhete = Bilhete::find($bilhete->id);
        $sessoes = $bilhete->estado()->paginate(6);


        return view('bilhetes.show', compact('recibos', 'recibo', 'bilhete','sessoes'));
    }

    public function create(Request $request) {

        $configuracao = Configuracao::first();
        $carrinho = $request->session()->get('carrinho', []);
        $cliente = Cliente::find(Auth::user()->id);

        //dd($cliente);

        $recibo = Recibo::create([
            'cliente_id' => $cliente->id,
            'data' => date('Y-m-d'),
            'preco_total_sem_iva' => $configuracao->preco_bilhete_sem_iva * count($carrinho),
            'iva' => $configuracao->percentagem_iva,
            'preco_total_com_iva' => round($configuracao->preco_bilhete_sem_iva * count($carrinho) * (1 + ($configuracao->percentagem_iva / 100))),
            'nif' => $cliente->nif,
            'tipo_pagamento' => $cliente->tipo_pagamento,
            'ref_pagamento' => $cliente->ref_pagamento,
            'sessao_id' => $request->sessao_id,
            'lugar_id' => $request->lugar_id,
            'nome_cliente' => Auth::user()->name
        ]);

        $recibo->save();


        foreach($carrinho as $row) {
            $bilhete = Bilhete::create([
                'cliente_id' => $cliente->id,
                'sessao_id' => $row['sessao'],
                'lugar_id' => $row['lugar_id'],
                'preco_sem_iva' => $configuracao->preco_bilhete_sem_iva,
                'recibo_id' => $recibo->id,
                'status' => 'não usado'
            ]);

            $bilhete->save();
        }

        $request->session()->forget('carrinho');
        return back()
            ->with('alert-msg', 'Bilhetes comprados com sucesso!')
            ->with('alert-type', 'danger');
    }

}
