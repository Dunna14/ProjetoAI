<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\ClientePost;

class ClienteController extends Controller
{
    public function edit_cliente(ClientePost $request) {
        $user = auth()->user();

        $cliente = Cliente::find($user->id);

        if($cliente == null) {
            $cliente = new Cliente();
            $cliente->user_id = $user->id;
        }

        $cliente->fill($request->validated());
        $cliente->save();

        return view('clientes.edit_cliente', compact('cliente', 'user'));
    }

    public function update_cliente(ClientePost $request) {
        $user = auth()->user();
        $cliente = Cliente::find($user->id);

        $cliente->fill($request->validated());
        $cliente->save();

        return redirect()->route('clientes.edit_cliente')
            ->with('alert-msg', 'Cliente foi alterado com sucesso!')
            ->with('alert-type', 'success');
    }
}
