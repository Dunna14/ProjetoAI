<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Genero;
use App\Models\Sessao;
use App\Models\Lugar;
use App\Models\Sala;
use App\Models\Bilhete;
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

        

        $data = date('Y-m-d',strtotime('-5 minutes'));
        $hora = date('H:i:s',strtotime('-5 minutes'));
        
        $filmes_id = Sessao::where('data', '>', $data)
                            ->orwhere([['data', '=', $data],
                              ['horario_inicio', '>=', $hora]])
                              ->distinct()->pluck('filme_id');

                
        $filmes = Filme::whereIn('id', $filmes_id);        
                            
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

        
        $data = date('Y-m-d',strtotime('-5 minutes'));
        $hora = date('H:i:s',strtotime('-5 minutes'));


        $sessoes_id= Sessao::where('filme_id', $filme->id)->where('data', '>=', $data) ->pluck('id');

        $sessoes = Sessao::whereIn('id', $sessoes_id);        
                      
        $sessoes = $sessoes->paginate(6);

        return view('filmes.show', compact('filme', 'generos', 'genero','sessoes'));
    }


    public function show_validar(Request $request,Filme $filme, Sessao $sessao, Lugar $lugar)
    {

        $bilhete = Bilhete::where('sessao_id',$sessao->id)->where('lugar_id', $lugar->id)->get()->first();

        if($bilhete->estado == 'não usado') {
            $bilhete->estado = 'usado';
            $bilhete->save();
        }
        return redirect()->route('filmes.show_sessao', compact('filme', 'sessao'));
    }


    public function show_sessao(Request $request,Filme $filme, Sessao $sessao)
    {
        $generos = Genero::pluck('nome', 'code');
        $genero = $request->query('genero');
        $filme = Filme::find($filme->id);
        $sessao = Sessao::find($sessao->id);
        $sala = Sala::find($sessao->sala_id);
        $lugares = Lugar::where('sala_id',$sessao->sala_id)->get();
        $bilhetes = Bilhete::where('sessao_id',$sessao->id)->get();
        $filas = Lugar::select('fila')->where('sala_id',$sessao->sala_id)->groupBy('fila')->get();
        $colunas = Lugar::select('fila')->where('sala_id',$sessao->sala_id)->distinct()->count('posicao');
        $bilhetesinvalidos = Bilhete::where('sessao_id',$sessao->id)->where('estado',"usado")->get();

        return view('filmes.show_sessao', compact('filme', 'generos', 'genero','sessao','lugares','sala','bilhetes','filas','colunas','bilhetesinvalidos'));
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
