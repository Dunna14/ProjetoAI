<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    public function index(){
        $lugares = Lugar::all();
        return view('lugares.index',compact('lugares'));
    }
    public function admin()
    {
        $lugares = Lugar::all();
        return view('lugares.admin',compact('lugares'));
    }

    public function edit(Lugar $lugar)
    {
        return view('lugares.edit', compact('lugar'));
    }
    public function create()
    {
        $lugar = new Lugar;
        return view('lugares.create', compact('lugar'));
    }

    public function store(Request $request)
    {
        $validated_data = $request->validated();
        $lugar = new Lugar();
        $lugar->fill($validated_data);
        $lugar->save();
        return redirect()->route('admin.lugares')
            ->with('alert-msg', 'Lugar foi criado com sucesso!')
            ->with('alert-type', 'success');
    }
    public function update(Request $request, Lugar $lugar)
    {
        $validated_data = $request->validated();
        $lugar->fill($validated_data);
        $lugar->save();
        return redirect()->route('admin.lugares')
            ->with('alert-msg', 'Lugar foi alterado com sucesso!')
            ->with('alert-type', 'success');
    }
    public function destroy(Lugar $lugar)
    {
        //$oldName=$lugar->nome;
        $lugar->delete();
        return redirect()->route('admin.lugares')
                ->with('alert-msg', 'Lugar foi apagado com sucesso!')
                ->with('alert-type', 'success');
    }
}
