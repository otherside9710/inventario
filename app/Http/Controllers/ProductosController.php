<?php

namespace App\Http\Controllers;

use App\Logs;
use App\Productos;
use App\Ventas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = [];
        $flag = true;
        if (Input::get('search')) {
            $search = trim(Input::get('search'));
            if ($search != "") {
                $productos = Productos::Where('id', $search)
                    ->orWhere('nombre', 'LIKE', '%' . $search . '%')->get();
            }
            $flag = false;
        } else {
            $productos = Productos::all();
        }
        return view('productos.index', [
            'productos' => $productos,
            'flag' => $flag
        ]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $producto = new Productos();
            $producto->nombre = $request->name;
            $producto->cantidad = $request->cantidad;
            $producto->precio_real = $request->precio;
            $producto->precio_venta = $request->precio_venta;
            $producto->usr_created = Auth::user()->id;
            $producto->fecha = Carbon::now();
            try {
                $producto->save();
                $log = new Logs();
                $log->usr_updated = Auth::user()->id;
                $log->nombre_usr = Auth::user()->name;
                $log->id_producto = $producto->id;
                $log->nombre_producto = $producto->nombre;
                $log->fecha = Carbon::now();
                $log->descripcion ="Se agrego un nuevo producto";
                $log->save();
                Session::put('success', 'Producto Creado Correctamente.');
                return view('productos.agregar');
            } catch (\Exception $exception) {
                Session::put('error', 'Error al crear Producto.');
                return view('productos.agregar');
            }
        }
        return view('productos.agregar');
    }

    public function edit(Request $request)
    {
        $productos = [];
        $flag = true;

        if (Input::get('search')) {
            $search = trim(Input::get('search'));
            if ($search != "") {
                $productos = Productos::where('id', $search)
                    ->orWhere('nombre', 'LIKE', '%' . $search . '%')->get();
            }
            $flag = false;
        } else {
            $productos = Productos::all();
        }
        return view('productos.editar', [
            'productos' => $productos,
            'flag' => $flag
        ]);
    }


    public function editView($id)
    {
        $producto = Productos::where('id', $id)->first();
        return view('productos.editarView', [
            'producto' => $producto,
        ]);
    }

    public function update(Request $request)
    {
        $producto = Productos::where('id', $request->id)->first();

        $producto->nombre = $request->name;
        $producto->cantidad = $request->cantidad;
        $producto->precio_venta = $request->precio;
        $producto->usr_updated = Auth::user()->id;
        try {
            $producto->update();

            $log = new Logs();
            $log->usr_updated = Auth::user()->id;
            $log->nombre_usr = Auth::user()->name;
            $log->id_producto = $producto->id;
            $log->nombre_producto = $producto->nombre;
            $log->fecha = Carbon::now();
            $log->descripcion = "se actualizo un producto";
            $log->save();

            $productosAll = Productos::all();
            Session::put('success', 'Producto Actualizado Correctamente.');
            return view('productos.editar', ['flag' => true, 'productos' => $productosAll]);
        } catch (\Exception $exception) {
            Session::put('error', 'Error al actualizar Producto.');
            $productosAll = Productos::all();
            return view('productos.editar', ['flag' => true, 'productos' => $productosAll]);
        }
    }

    public function delete($id)
    {
        $producto = Productos::where('id', $id)->first();
        Productos::where('id', $id)->delete();
        $log = new Logs();
        $log->usr_updated = Auth::user()->id;
        $log->nombre_usr = Auth::user()->name;
        $log->id_producto = $producto->id;
        $log->nombre_producto = $producto->nombre;
        $log->fecha = Carbon::now();
        $log->descripcion = "se elimino un producto";
        $log->save();
        $productosAll = Productos::all();
        Session::put('success', 'Producto Eliminado Correctamente.');
        return view('productos.editar', ['flag' => true, 'productos' => $productosAll]);
    }

    public function exit(Request $request)
    {
        $productos = [];
        $flag = true;
        if (Input::get('search')) {
            $search = trim(Input::get('search'));
            if ($search != "") {
                $productos = Productos::Where('id', $search)
                    ->where('cantidad', '>', 0)
                    ->orWhere('nombre', 'LIKE', '%' . $search . '%')->get();
            }
            $flag = false;
        } else {
            $productos = Productos::where('cantidad', '>', 0)->get();
        }
        return view('productos.salida', [
            'productos' => $productos,
            'flag' => $flag
        ]);
    }

    public function buy($id)
    {
        $producto = Productos::where('id', $id)->first();
        $cantidad = $producto->cantidad - 1;

        $producto->cantidad = $cantidad;
        $producto->update();

        $venta = new Ventas();
        $venta->producto = $producto->id;
        $venta->usr_comprador = Auth::user()->id;
        $venta->save();

        $log = new Logs();
        $log->usr_updated = Auth::user()->id;
        $log->nombre_usr = Auth::user()->name;
        $log->id_producto = $producto->id;
        $log->nombre_producto = $producto->nombre;
        $log->fecha = Carbon::now();
        $log->descripcion = "se vendio un producto";
        $log->save();

        $productosAll = Productos::where('cantidad', '>', 0)->get();
        Session::put('success', 'Producto Vendido Correctamente.');
        return view('productos.salida', ['flag' => true, 'productos' => $productosAll]);
    }

}
