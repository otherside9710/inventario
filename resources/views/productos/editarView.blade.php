@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => 'home', 'name' => 'Home'],
            ['route' => '', 'name' => 'Editar Producto']
        ],
        'show_add_button' => false,
        'add_button_route' => route('home')
    ])
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <center><h5>EDITAR PRODUCTO</h5></center>
                    <br><br>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <form action="{{route('update')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <input type="hidden" value="{{$producto->id}}" name="id">
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    <label>Nombre</label>
                                    <input type="text" value="{{$producto->nombre}}" class="form-control" name="name" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Cantidad</label>
                                    <input type="number" value="{{$producto->cantidad}}" class="form-control" name="cantidad" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Precio Venta</label>
                                    <input type="number" value="{{$producto->precio_venta}}" id="precio" class="form-control" name="precio" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-5"></div>
                                <div class="col-md-4">
                                    <button class="btn btn-outline-success">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
