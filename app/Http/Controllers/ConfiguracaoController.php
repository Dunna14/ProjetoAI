<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracaoController extends Controller
{
    public function edit()
    {
        $configuracao=Configuracao::first();

        return view('filmes.edit', compact('configuracao'));
    }

    public function update(ConfiguracaoPost $request)
    {

        $configuracao=Configuracao::first();
        $configuracao->fill($request->validated());
        $configuracao->save();


        return redirect()->route('admin.configuracao')
            ->with('alert-msg', 'configuracao  foi alterada com sucesso!')
            ->with('alert-type', 'success');
    }
}
