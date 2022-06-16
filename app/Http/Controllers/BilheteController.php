<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Models\Recibo;
use App\Models\Sessao;
use App\Models\Bilhete;
use App\Models\Cliente;
use Illuminate\Http\Request;
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

    }

    public function downloadBilhetePDF(Bilhete $bilhete)
    {

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

}
