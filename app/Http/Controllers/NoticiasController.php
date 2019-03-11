<?php

namespace App\Http\Controllers;


use App\Noticias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NoticiasController extends Controller
{
    public function index(){
        $noticias = Noticias::all();
        return view('noticias.index', ['noticias' => $noticias]);
    }

    public function add(){
        return view('noticias.add');
    }

    public function save(Request $request){
        $noticia = new Noticias();
        $noticia->titulo = $request->titulo;
        $noticia->descripcion = $request->desc;
        $noticia->save();
        Session::put('success', 'Noticia Guardada Correctamente.');
        return redirect()->route('notices');
    }

    public function edit($id){
        $notice = Noticias::where('id', $id)->first();
        return view('noticias.edit', ['noticia' => $notice]);
    }

    public function update(Request $request)
    {
        $noticia = Noticias::where('id', $request->id)->first();
        $noticia->titulo = trim($request->titulo);
        $noticia->descripcion = trim($request->desc);
        $noticia->update();
        Session::put('success', 'Noticia Actualizada Correctamente.');
        return redirect()->route('notices');
    }

    public function delete($id){
        Noticias::where('id', $id)->delete();
        Session::put('success', 'Noticia Eliminada Correctamente.');
        return redirect()->route('notices');
    }

}
