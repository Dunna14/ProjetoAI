<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    // dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //Alterar password
    Route::get('users/password', [UserController::class, 'edit_password']) -> name('password.edit');
    Route::patch('users/password', [UserController::class, 'update_password']) -> name('password.update');
});


//Rotas dos Generos
Route::get('generos', [DisciplinaController::class, 'admin_index'])->name('genero')
    ->middleware('can:viewAny,App\Models\Genero');
Route::get('generos/{genero}/edit', [DisciplinaController::class, 'edit'])->name('genero.edit')
    ->middleware('can:view,genero');
Route::get('generos/create', [DisciplinaController::class, 'create'])->name('genero.create')
    ->middleware('can:create,App\Models\Genero');
Route::post('generos', [DisciplinaController::class, 'store'])->name('genero.store')
    ->middleware('can:create,App\Models\Genero');
Route::put('generos/{genero}', [DisciplinaController::class, 'update'])->name('genero.update')
    ->middleware('can:update,genero');
Route::delete('generos/{genero}', [DisciplinaController::class, 'destroy'])->name('genero.destroy')
    ->middleware('can:delete,genero');



