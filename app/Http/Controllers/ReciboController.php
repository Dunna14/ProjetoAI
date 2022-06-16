<?php

namespace App\Http\Controllers;

use App\Models\Recibo;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\ReciboPost;

class ReciboController extends Controller
{
    public function admin_index(Request $request)
    {
        $cliente = $request->cliente ?? '';

        $qry = Recibo::query();
        if ($cliente) {
            $qry->where('cliente_id', $cliente);
        }
        $recibos = $qry->paginate(10);

        $clientes = Cliente::pluck('nome', 'code');

        return view('recibos.admin', compact('recibos', 'cliente', 'clientes'));

    }

    public function store(ReciboPost $request)
    {

        $recibo = new Recibo();
        $recibo->fill($request->validated());

        $recibo->save();
        return redirect()->route('admin.recibos')
            ->with('alert-msg', 'Recibo foi criado com sucesso!')
            ->with('alert-type', 'success');
    }

    public function retrievePDF(Recibo $recibo)
    {

    }


    public function show(Request $request, Recibo $recibo)
    {
        $clientes = Cliente::pluck('nome', 'code');
        $cliente = $request->query('cliente');

        $recibo = Recibo::find($recibo->id);
        $clientes = $recibo->recibos()->paginate(6);


        return view('filmes.show', compact('clientes', 'cliente', 'recibo'));
    }
}
