<?php

namespace App\Http\Controllers;

use App\Models\Recibo;
use App\Models\Sessao;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->tipo != 'A')
        {
            return view('welcome');
        }
        $sessao = Sessao::select(
            Sessao::raw("YEAR(data) as data"),
            Sessao::raw("COUNT(*) as sessoes"))
        ->orderBy(Sessao::raw("YEAR(data)"))
        ->groupBy(Sessao::raw("YEAR(data)"))
        ->get();

        $result[] = ['Ano','Sessoes'];
        foreach ($sessao as $key => $value) {
        $result[++$key] = [$value->ano, (int)$value->sessoes];
        }

        $recibo = Recibo::select(
            Recibo::raw("YEAR(data) as data"),
            Recibo::raw("COUNT(*) as recibos"))
        ->orderBy(Recibo::raw("YEAR(data)"))
        ->groupBy(Recibo::raw("YEAR(data)"))
        ->get();

        $result2[] = ['Ano','Recibos'];
        foreach ($recibo as $key => $value) {
            $result2[++$key] = [$value->ano, (int)$value->recibos];
            }


        return view('dashboard.index')
        ->with('sessao',json_encode($result))
        ->with('recibo',json_encode($result2));
    }
}
