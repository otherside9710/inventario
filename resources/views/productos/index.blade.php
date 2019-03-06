@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => 'home', 'name' => 'Home'],
            ['route' => '', 'name' => 'Productos']
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
                    <center><h5>PRODUCTOS</h5></center>
                    <br><br>
                    <form action="{{route('productos')}}">
                        <div class="row">
                            <div class="col-md-4">
                                <label>ID/Nombre</label>
                                <input type="text" name="search" class="form-control">
                            </div>
                            <div class="col-md-2" style="margin-top: 30px">
                                @if($flag)
                                    <button class="btn btn-outline-success">Buscar</button>
                                @else
                                    <button class="btn btn-outline-info">Volver</button>
                                @endif
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($productos as $prod)
                                    <tr>
                                        <td>{{$prod->id}}</td>
                                        <td>{{$prod->nombre}}</td>
                                        <td>{{$prod->cantidad}}</td>
                                        <td>{{$prod->precio_venta}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
