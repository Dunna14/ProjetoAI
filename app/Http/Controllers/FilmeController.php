<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Genero;
use App\Models\Sessao;
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
            $qry->where('genero_code', $genero);
        }
        $filmes = $qry->paginate(10);
        $generos = Genero::pluck('nome', 'code');

        return view('filmes.admin', compact('filmes', 'generos', 'genero'));

    }
    public function index(Request $request)
    {
        $generos = Genero::pluck('nome', 'code');
        $genero = $request->query('genero');
        $titulo = $request->titulo ?? '';
        $filmes = Filme::query();


        if ($genero){
          $filmes = $filmes->where('genero_code', $genero);
        }
        if ($titulo){
            $filmes = $filmes->where('titulo','like',"%$titulo%");
          }
        $filmes = $filmes->paginate(25);
        return view(
            'filmes.index',
            compact('filmes', 'titulo', 'genero', 'generos')
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

        if ($request->hasFile('cartaz_url')) {
            $path = $request->cartaz_url->store('public/cartazes');
            $filme->cartaz_url = basename($path);
        }
        $filme->save();
        return redirect()->route('admin.filmes')
            ->with('alert-msg', 'Filme "' . $filme->titulo . '" foi criada com sucesso!')
            ->with('alert-type', 'success');
    }

    public function update(FilmePost $request, Filme $filme)
    {
        $filme->fill($request->validated());


        if ($request->hasFile('cartaz_url')) {
            Storage::delete('public/cartazes/' . $filme->cartaz_url);
            $path = $request->cartaz_url->store('public/cartazes');
            $filme->cartaz_url = basename($path);
        }
        $filme->save();

        return redirect()->route('admin.filmes')
            ->with('alert-msg', 'Filme "' . $filme->titulo . '" foi alterada com sucesso!')
            ->with('alert-type', 'success');
    }


    public function show(Request $request,Filme $filme)
    {
        $generos = Genero::pluck('nome', 'code');
        $genero = $request->query('genero');
        $filme = Filme::find($filme->id);
        $sessoes = $filme->sessoes()->paginate(6);


        return view('filmes.show', compact('filme', 'generos', 'genero','sessoes'));
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
