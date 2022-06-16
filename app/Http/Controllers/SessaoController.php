<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Filme;
use App\Models\Sessao;
use Illuminate\Http\Request;

class SessaoController extends Controller
{
    public function admin_index(Request $request) {
        $sala = $request->sala ?? '';
        $filme = $request->filme ?? '';

        $qry = Sessao::query();
        if ($sala) {
            $qry->where('sala_id', $sala);
        }
        if ($filme) {
            $qry->where('filme_id', $filme);
        }

        $sessoes = $qry->paginate(10);
        $salas = Sala::pluck('nome', 'code');
        $filmes = Filme::pluck('nome', 'code');

        return view('sessoes.admin', compact('filmes', 'salas', 'filme', 'sala'));
    }

    public function edit(Request $request, Sessao $sessao) {
        $filmes = Filme::all();
        $salas = Sala::all();
        return view('sessoes.edit', compact('sessao', 'filmes', 'salas'));
    }

    public function create(Request $request) {
        $sessao = new Sessao();
        $salas = Sala::all();
        $filmes = Filme::all();
        return view('sessoes.create', compact('filme', 'salas', 'filmes'));
    }

    public function store(Request $request) {
        $sessao = new Sessao();
        $sessao->fill($request->validated());

        $sessao->save();
        return redirect()->route('admin.sessoes')
            ->with('alert-msg', 'Sessao "' . $sessao->titulo . '" foi criada com sucesso!')
            ->with('alert-type', 'success');
    }

    public function update(Request $request, Sessao $sessao) {
        $sessao->fill($request->validated());
        $sessao->save();

        return redirect()->route('admin.sessoes')
            ->with('alert-msg', 'Sessão "' . $sessao->titulo . '" foi alterada com sucesso!')
            ->with('alert-type', 'success');
    }

    public function destroy(Request $request, Sessao $sessao) {
        if (count($sessao->sessao_id)) {
            return redirect()->route('admin.sessoes')
                ->with('alert-msg', 'Não foi possível apagar esta sessao "' . $sessao->nome . '", porque este sessao está associado a uma bilhete!')
                ->with('alert-type', 'danger');
        }
        $sessao->delete();
        return redirect()->route('admin.sessoes')
            ->with('alert-msg', 'Sessao "' . $sessao->nome . '" foi apagada com sucesso!')
            ->with('alert-type', 'success');
    }

}
