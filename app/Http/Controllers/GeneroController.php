<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;
use App\Http\Requests\GeneroPost;

class GeneroController extends Controller
{
    public function admin()
    {
        $generos = Genero::all();
        return view('generos.admin',compact('generos'));
    }

    public function edit(Genero $genero)
    {
        return view('generos.edit', compact('genero'));
    }
    public function create()
    {
        $genero = new Genero;
        return view('generos.create', compact('genero'));
    }

    public function store(GeneroPost $request)
    {
        $validated_data = $request->validated();
        $genero= new Genero();
        $genero->fill($validated_data);
        $genero->save();
        return redirect()->route('admin.generos')
            ->with('alert-msg', 'Genero "' . $genero->nome . '" foi criado com sucesso!')
            ->with('alert-type', 'success');
    }
    public function update(GeneroPost $request, Genero $genero)
    {
        $validated_data = $request->validated();
        $genero->fill($validated_data);
        $genero->save();
        return redirect()->route('admin.generos')
            ->with('alert-msg', 'Genero "' . $genero->nome . '" foi alterado com sucesso!')
            ->with('alert-type', 'success');
    }
    public function destroy(Genero $genero)
    {
        $oldName=$genero->nome;
        $genero->delete();
        return redirect()->route('admin.generos')
                ->with('alert-msg', 'Genero "' . $oldName . '" foi apagado com sucesso!')
                ->with('alert-type', 'success');
    }


}
