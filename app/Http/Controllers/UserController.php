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
        auth()->user()->password = Hash::make($request->password);
        auth()->user()->save();
        return redirect()->route('admin.dashboard')
        ->with('alert-msg', 'Password changed with success')
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
