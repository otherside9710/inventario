<?php

namespace App\Http\Controllers;

use App\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SeccionesController extends Controller
{
    public function index()
    {
        $sections = Sections::all();
        return view('sections.index', ['sections' => $sections]);
    }

    public function getContentById($id)
    {
        $content = Sections::where('id', $id)->first();
        return view('sections.content', ['content' => $content]);
    }

    public function update(Request $request)
    {
        $content = Sections::where('id', $request->id)->first();
        $content->titulo = trim($request->title);
        $content->descripcion = trim($request->desc);
        $content->update();
        Session::put('success', 'Sección Actualizada Correctamente.');
        return redirect()->route('sections');
    }
}
