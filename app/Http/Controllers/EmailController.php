<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\InvoicePaid;

class EmailController extends Controller
{
    public function index()
    {
        return view('email_index')->with('pageTitle', 'E-Mail');
    }

    public function send_email_with_notification()
    {
        //SEND EMAIL WITH USER MODEL
        $invoice = null;

        //SEND TO USER
        //neste caso é user 2
        $user = User::findOrFail(2);
        $user->notify(new InvoicePaid($invoice));

        return redirect()->route('email.home')
            ->with('alert-type', 'success')
            ->with('alert-msg', 'E-Mail sent with success (using Notifications)');
    }

}
