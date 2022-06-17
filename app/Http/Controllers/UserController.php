<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PasswordPost;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function admin(Request $request)
    {
       $tipo = $request->tipo ?? '';

        $qry = User::query();
        if ($tipo) {
            $qry->where('tipo', $tipo);
        }
        $users = $qry->paginate(10);
        $tipos = User::pluck('name', 'tipo');

        return view('users.admin', compact('users', 'tipo', 'tipos'));

    }

    public function show(Request $request) {
        $user = auth()->user();

        return view('users.show', compact('user'));
    }

    public function edit_password() {
        return view('auth.password_change');
    }

    public function update_password(PasswordPost $request) {
        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.users')
            ->with('alert-msg', 'Senha alterada com sucesso!')
            ->with('alert-type', 'success');
    }

    public function edit(Request $request, User $user) {
        return view('users.edit', compact('user'));
    }

    public function edit_user(Request $request) {
        $user = auth()->user();
        $user->fill($request->validated());
        $user->save();

        return redirect()->route('user.edit')
            ->with('alert-msg', 'Perfil alterado com sucesso!')
            ->with('alert-type', 'success');
    }

    public function update_user(Request $request) {
        $user = auth()->user();
        $user->fill($request->validated());
        $user->save();

        return redirect()->route('admin.users')
            ->with('alert-msg', 'Usuário alterado com sucesso!')
            ->with('alert-type', 'success');
    }

    //Depois de criar um novo user -> Método store
    //$user -> sendEmailVerificationNotification();

    public function store(Request $request) {
        $user = new User();
        $user->fill($request->validated());

        $user->save();
        return redirect()->route('admin.users')
            ->with('alert-msg', 'user "' . $user->name . '" foi criada com sucesso!')
            ->with('alert-type', 'success');
    }

    public function create(Request $request) {
        $user = new User();
        //$user -> sendEmailVerificationNotification();

        return view('users.create', compact('user'));
    }
}
