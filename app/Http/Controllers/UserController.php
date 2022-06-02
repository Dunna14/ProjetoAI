<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PasswordPost;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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
}
