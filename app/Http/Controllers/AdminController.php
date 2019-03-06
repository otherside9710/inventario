<?php

namespace App\Http\Controllers;

use App\Logs;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function index()
    {
        $logs = [];
        $flag = true;
        if (Input::get('search')) {
            $search = trim(Input::get('search'));
            if ($search != "") {
                $logs = Logs::where('id_producto', $search)
                    ->orWhere('nombre_producto', 'LIKE', '%' . $search . '%')->get();
            }
            $flag = false;
        } else {
            $logs = Logs::all();
        }
        return view('logs.index', [
            'logs' => $logs,
            'flag' => $flag
        ]);
    }

    public function users(){
        return view('auth.registro');
    }
}
