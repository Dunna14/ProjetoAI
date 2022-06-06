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

Auth::routes(['verify' => true]); //Verificar

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('  ');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    // dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //Alterar password
    Route::get('users/password', [UserController::class, 'edit_password']) -> name('password.edit');
    Route::patch('users/password', [UserController::class, 'update_password']) -> name('password.update');


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

});

