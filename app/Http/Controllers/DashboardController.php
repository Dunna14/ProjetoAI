<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->tipo != 'A'){
        return view('welcome');
    }
        
        return view('dashboard.index');
    }
}
