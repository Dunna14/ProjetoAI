<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recibo;
use App\Models\Bilhete;
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


    public function show(Request $request,User $user)
    {
        $qry=Recibo::query();
        if($user){
            $qry->where('cliente_id',$user->id)->orderBy('data', 'desc');
        }
        $recibos=$qry->paginate(50);

        return view('recibos.show', compact('recibos', 'user'));
    }



    public function show_bilhete(Request $request,Recibo $recibo)
    {
        $bilhetes=Bilhete::where('recibo_id',$recibo->id);

        $bilhetes=$bilhetes->paginate(50);

        return view('recibos.show_bilhete', compact('recibo', 'bilhetes'));
    }



}
