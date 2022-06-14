<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['register'=>false,'verify' => true]); //Verificar

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('  ');



Route::middleware(['auth', 'verified','bloqueado'])->prefix('admin')->name('admin.')->group(function () {

    // dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //Rotas dos utilizadores
    //Alterar password
    Route::get('users/password', [UserController::class, 'edit_password']) -> name('password.edit');
    Route::patch('users/password', [UserController::class, 'update_password']) -> name('password.update');
    Route::patch('users/{user}/bloqueado', [UserController::class, 'bloquear_desbloquear']) -> name('bloqueado.change')
            ->middleware('can:patch,user');
    Route::delete('users/{user}/foto', [UserController::class, 'destroy_foto'])->name('users.foto.destroy')
           ->middleware('can:update,user');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create')
           ->middleware('can:create,App\Models\User');
    Route::post('users', [UserController::class, 'store'])->name('users.store')
           ->middleware('can:create,App\Models\User');
    Route::get('users', [UserController::class, 'admin'])->name('users')
           ->middleware('can:viewAny,App\Models\User');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')
           ->middleware('can:view,user');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update')
           ->middleware('can:update,user');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy')
           ->middleware('can:delete,user');


    //Rotas dos Generos
    Route::get('generos', [GeneroController::class, 'admin'])->name('generos')
           ->middleware('can:viewAny,App\Models\Genero');
       Route::get('generos/{genero}/edit', [GeneroController::class, 'edit'])->name('generos.edit')
           ->middleware('can:view,genero');
       Route::get('generos/create', [GeneroController::class, 'create'])->name('generos.create')
           ->middleware('can:create,App\Models\Genero');
       Route::post('generos', [GeneroController::class, 'store'])->name('generos.store')
           ->middleware('can:create,App\Models\Genero');
       Route::put('generos/{genero}', [GeneroController::class, 'update'])->name('generos.update')
           ->middleware('can:update,genero');
       Route::delete('generos/{genero}', [GeneroController::class, 'destroy'])->name('generos.destroy')
           ->middleware('can:delete,genero');

    // admininstração de Salas
    Route::get('salas', [SalaController::class, 'admin'])->name('salas')
        ->middleware('can:viewAny,App\Models\Sala');
    Route::get('salas/{sala}/edit', [SalaController::class, 'edit'])->name('salas.edit')
        ->middleware('can:view,sala');
    Route::get('salas/create', [SalaController::class, 'create'])->name('salas.create')
        ->middleware('can:create,App\Models\Sala');
    Route::post('salas', [SalaController::class, 'store'])->name('salas.store')
        ->middleware('can:create,App\Models\Sala');
    Route::put('salas/{sala}', [SalaController::class, 'update'])->name('salas.update')
        ->middleware('can:update,sala');
    Route::delete('salas/{sala}', [SalaController::class, 'destroy'])->name('salas.destroy')
        ->middleware('can:delete,sala');

    // administração Filmes
    Route::get('filmes', [FilmeController::class, 'admin_index'])->name('filmes')
        ->middleware('can:viewAny,App\Models\Filme');
    Route::get('filmes/{filme}/edit', [FilmeController::class, 'edit'])->name('filmes.edit')
        ->middleware('can:view,filme');
    Route::get('filmes/create', [FilmeController::class, 'create'])->name('filmes.create')
        ->middleware('can:create,App\Models\Filme');
    Route::post('filmes', [FilmeController::class, 'store'])->name('filmes.store')
        ->middleware('can:create,App\Models\Filme');
    Route::put('filmes/{filme}', [FilmeController::class, 'update'])->name('filmes.update')
        ->middleware('can:update,filme');
    Route::delete('filmes/{filme}', [FilmeController::class, 'destroy'])->name('filmes.destroy')
        ->middleware('can:delete,filme');

    //Rotas de clientes
    Route::get('clientes', [ClienteController::class, 'admin_index'])->name('clientes')
        ->middleware('can:viewAny,App\Models\Cliente');
    Route::get('clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit')
        ->middleware('can:view,cliente');
    Route::get('clientes/create', [ClienteController::class, 'create'])->name('clientes.create')
        ->middleware('can:create,App\Models\Cliente');
    Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store')
        ->middleware('can:create,App\Models\Cliente');
    Route::put('clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update')
        ->middleware('can:update,cliente');
    Route::delete('clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy')
        ->middleware('can:delete,cliente');

    //Rotas de lugares
    Route::get('lugares', [LugarController::class, 'admin_index'])->name('lugares')
        ->middleware('can:viewAny,App\Models\Lugar');
    Route::get('lugares/{lugar}/edit', [LugarController::class, 'edit'])->name('lugares.edit')
        ->middleware('can:view,lugar');
    Route::get('lugares/create', [LugarController::class, 'create'])->name('lugares.create')
        ->middleware('can:create,App\Models\Lugar');
    Route::post('lugares', [LugarController::class, 'store'])->name('lugares.store')
        ->middleware('can:create,App\Models\Lugar');
    Route::put('lugares/{lugar}', [LugarController::class, 'update'])->name('lugares.update')
        ->middleware('can:update,lugar');
    Route::delete('lugares/{lugar}', [LugarController::class, 'destroy'])->name('lugares.destroy')
        ->middleware('can:delete,lugar');

    //Rotas de sessoes
    Route::get('sessoes', [SessaoController::class, 'admin_index'])->name('sessoes')
        ->middleware('can:viewAny,App\Models\Sessao');
    Route::get('sessoes/{sessao}/edit', [SessaoController::class, 'edit'])->name('sessoes.edit')
        ->middleware('can:view,sessao');
    Route::get('sessoes/create', [SessaoController::class, 'create'])->name('sessoes.create')
        ->middleware('can:create,App\Models\Sessao');
    Route::post('sessoes', [SessaoController::class, 'store'])->name('sessoes.store')
        ->middleware('can:create,App\Models\Sessao');
    Route::put('sessoes/{sessao}', [SessaoController::class, 'update'])->name('sessoes.update')
        ->middleware('can:update,sessao');
    Route::delete('sessoes/{sessao}', [SessaoController::class, 'destroy'])->name('sessoes.destroy')
        ->middleware('can:delete,sessao');

    //Rotas de Configuracao
    Route::get('configuracoes/edit', [ConfiguracaoController::class, 'edit'])->name('configuracoes.edit')
        ->middleware('can:view,configuracao');
    Route::put('configuracoes', [ConfiguracaoController::class, 'update'])->name('configuracoes.update')
        ->middleware('can:update,configuracao');


    //Rotas de recibos
        Route::post('recibos', [ReciboController::class, 'store'])->name('recibos.store')
        ->middleware('can:create,App\Models\Recibo');
    Route::get('recibos', [ReciboController::class, 'admin_index'])->name('recibos')
        ->middleware('can:viewAny,App\Models\Recibo');
    Route::get('recibos/{recibo}', [ReciboController::class, 'show'])->name('recibos.show')
        ->middleware('can:viewAny,App\Models\Recibo');
    Route::get('recibos/{recibo}/pdf', [ReciboController::class, 'retrievePDF'])->name('recibos.retrievepdf')
        ->middleware('can:viewAny,App\Models\Recibo');

    //Rotas de bilhetes
    Route::get('bilhetes', [BilheteController::class, 'admin_index'])->name('bilhetes')
        ->middleware('can:viewAny,App\Models\Bilhete');
    Route::get('bilhetes', [BilheteController::class, 'validar_invalidar'])->name('bilhetes.validar')
        ->middleware('can:viewAny,App\Models\Bilhete');
    Route::get('bilhetes/{bilhete}', [BilheteController::class, 'show'])->name('bilhetes.show')
        ->middleware('can:viewAny,App\Models\Bilhete');
    Route::get('bilhetes/{bilhete}/pdf', [BilheteController::class, 'downloadBilhetePDF'])->name('bilhetes.downloadbilhetepdf')
        ->middleware('can:viewAny,App\Models\Bilhete');
    Route::get('bilhetes/{bilhete}/edit', [BilheteController::class, 'edit'])->name('bilhetes.edit')
        ->middleware('can:view,bilhete');
    Route::put('bilhetes/{bilhete}/update', [BilheteController::class, 'update'])->name('bilhetes.update')
        ->middleware('can:update,bilhete');

    //Rotas de Gestão de estatisticas
    Route::get('estatisticas'   )->middleware('IsAdmin');

    //Rotas do carrinho

    Route::get('checkout   ')->middleware('IsCliente');

});

Route::get('filmes', [FilmeController::class, 'index'])->name('filmes.index');
Route::get('filmes/{filme}', [FilmeController::class, 'show'])->name('filmes.show');

Route::put('carrinho/{sessao}/{lugar}/addbilhete', [CarrinhoController::class, 'add_bilhete'])->name('carrinho.bilhete.add');
Route::delete('carrinho/{bilhete}/destroyBilhete', [CarrinhoController::class, 'destroy_bilhete'])->name('carrinho.bilhete.destroy');
Route::delete('carrinho/destroy', [CarrinhoController::class, 'destroy'])->name('carrinho.destroy');
