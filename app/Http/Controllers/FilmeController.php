<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Genero;
use Illuminate\Http\Request;
use App\Http\Requests\FilmePost;
use Illuminate\Support\Facades\Storage;

class FilmeController extends Controller
{
    public function admin_index(Request $request)
    {
        $genero = $request->genero ?? '';

        $qry = Filme::query();
        if ($genero) {
            $qry->where('genero', $genero);
        }
        $filmes = $qry->paginate(10);
        $generos = Genero::pluck('nome', 'code');

        return view('filmes.admin', compact('filmes', 'generos', 'genero'));

    }
    public function index(Request $request)
    {
        $generos = Genero::pluck('nome', 'code');
        $genero = $request->query('genero', 'ACTION');
        $ano = $request->ano ?? 1;
        $discSem1 = Filme::where('genero', $genero)
            ->where('ano', $ano)
            //->where('semestre', 1)
            ->get();
        $discSem2 = Filme::where('genero', $genero)
            ->where('ano', $ano)
            //->where('semestre', 2)
            ->get();
        return view(
            'filmes.index',
            compact('discSem1', 'discSem2', 'ano', 'genero', 'generos')
        );
    }

    public function create()
    {
        $filme = new Filme();
        $generos = Genero::all();
        return view('filmes.create', compact('filme', 'generos'));
    }
    public function edit(Filme $filme)
    {
        $generos = Genero::all();
        return view('filmes.edit', compact('filme', 'generos'));
    }

    public function store(FilmePost $request)
    {

        $filme = new Filme();
        $filme->fill($request->validated());
        $filme->save();

        if ($request->hasFile('cartaz_url')) {
            $path = $request->foto->store('public/cartazes');
            $filme->cartaz_url = basename($path);
        }

        return redirect()->route('admin.filmes')
            ->with('alert-msg', 'Filme "' . $filme->nome . '" foi criada com sucesso!')
            ->with('alert-type', 'success');
    }

    public function update(FilmePost $request, Filme $filme)
    {
        $filme->fill($request->validated());
        $filme->save();

        if ($request->hasFile('cartaz_url')) {
            Storage::delete('public/fotos/' . $filme->cartaz_url);
            $path = $request->foto->store('public/cartazes');
            $filme->cartaz_url = basename($path);
        }

        return redirect()->route('admin.filmes')
            ->with('alert-msg', 'Filme "' . $filme->nome . '" foi alterada com sucesso!')
            ->with('alert-type', 'success');
    }

    public function destroy(Filme $filme)
    {
        if (count($filme->filme_id)) {
            return redirect()->route('admin.filmes')
                ->with('alert-msg', 'Não foi possível apagar o Filme "' . $filme->nome . '", porque este filme está associado a uma sessão!')
                ->with('alert-type', 'danger');
        }
        $filme->delete();
        return redirect()->route('admin.filmes')
            ->with('alert-msg', 'Filme "' . $filme->nome . '" foi apagada com sucesso!')
            ->with('alert-type', 'success');
    }
}
