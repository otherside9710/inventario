<?php

namespace App\Http\Controllers;

use App\Images;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{
    public function index()
    {
        $images = Images::all();
        return view('team.index', ['images' => $images]);
    }

    public function edit($id)
    {
        $equipo = Images::where('id', $id)->first();
        return view('team.edit', ['equipo' => $equipo]);
    }

    public function delete($id)
    {
        Images::where('id', $id)->delete();
        Session::put('success', 'Participante Eliminado Correctamente.');
        return redirect()->route('team');
    }

    public function update(Request $request)
    {
        $flag = true;
        $image = Images::where('id', $request->id)->first();
        $image->title = trim($request->title);
        $image->content = trim($request->puesto);
        if ($request->image) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();

                if ($ext == 'jpg' || $ext == 'jpge' || $ext == 'png' || $ext == 'csv') {
                    $str = Carbon::now() . $file->getClientOriginalName();
                    $name = str_replace(' ', '', $str);
                    $ruta = $file->move(public_path() . '/images/team/', $name);
                    $base = 'http://localhost/MestreYFontalvoAdmin/public/images/team/';

                    $image->real_name = $file->getClientOriginalName();
                    $image->name_actually = $name;
                    $image->ruta_server = $ruta;
                    $image->url = $base . $name;
                    $image->update();
                    $flag = false;
                } else {
                    Session::put('error', 'El Archivo subido no tiene un formato valido, debe ser .PNG O .JPG');
                    return redirect()->route('team');
                }
            }
        }
        if ($flag) {
            $image->update();
        }
        Session::put('success', 'Participante Actualizado Correctamente.');
        return redirect()->route('team');
    }

    public function add()
    {
        return view('team.add');
    }

    public function save(Request $request)
    {
        if ($request->image) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();

                if ($ext == 'jpg' || $ext == 'jpge' || $ext == 'png' || $ext == 'csv') {
                    $str = Carbon::now() . $file->getClientOriginalName();
                    $name = str_replace(' ', '', $str);
                   try{
                       $ruta = $file->move(public_path() . '/images/team/', $name);
                       $base = 'http://localhost/MestreYFontalvoAdmin/public/images/team/';

                       $image = new Images();
                       $image->title = $request->title;
                       $image->content = $request->puesto;
                       $image->real_name = $file->getClientOriginalName();
                       $image->name_actually = $name;
                       $image->ruta_server = $ruta;
                       $image->url = $base . $name;
                       $image->save();
                       Session::put('success', 'Participante Creado Correctamente.');
                       return redirect()->route('team');
                    }catch (\Exception $e){
                       Session::put('error', 'Error al crear miembro del equipo.');
                   }
                } else {
                    Session::put('error', 'El Archivo subido no tiene un formato valido, debe ser .PNG O .JPG');
                    return redirect()->route('team');
                }
            }
        }
        Session::put('error', 'Error al crear miembro del equipo.');
        return redirect()->route('team');
    }
}
