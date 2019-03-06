<?php

namespace App\Http\Controllers;


use App\Productos;
use App\User;
use App\Ventas;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $hoy = explode(' ', Carbon::now('America/Jamaica'))[0];
        $productsDaily = Productos::where('fecha', $hoy)->get();
        $productsDailyCount = Productos::where('fecha', $hoy)->get()->count();

        $productos = Productos::all()->count();
        $usuarios = User::all()->count();
        $vendidos = Ventas::all()->count();
        return view('home', [
            'total' => $productos,
            'usuarios' => $usuarios,
            'vendidos' => $vendidos,
            'productsDaily' => $productsDaily,
            'productsDailyCount' => $productsDailyCount,
        ]);
    }
}
