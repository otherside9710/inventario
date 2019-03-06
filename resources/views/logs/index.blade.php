@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => 'home', 'name' => 'Home'],
            ['route' => '', 'name' => 'Logs']
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
                    <center><h5>LOGS DEL SISTEMA</h5></center>
                    <br><br>
                    <form action="{{route('admin.logs')}}">
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
                                    <th scope="col">ID Producto</th>
                                    <th scope="col">Nombre Producto</th>
                                    <th scope="col">ID Usr</th>
                                    <th scope="col">Nombre Usr Modifico</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Descripción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($logs as $log)
                                    <tr>
                                        <td>{{$log->id}}</td>
                                        <td>{{$log->id_producto}}</td>
                                        <td>{{$log->nombre_producto}}</td>
                                        <td>{{$log->usr_updated}}</td>
                                        <td>{{$log->nombre_usr}}</td>
                                        <td>{{$log->fecha}}</td>
                                        <td>{{$log->descripcion}}</td>
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
