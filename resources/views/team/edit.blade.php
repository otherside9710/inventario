@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => 'home', 'name' => 'Home'],
            ['route' => 'team', 'name' => 'Equipo'],
            ['route' => '', 'name' => 'Editar EQUIPO']
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
                    <center><h5>EDITAR EQUIPO</h5></center>
                    <br><br>
                    <form action="{{route('team.update')}}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$equipo->id}}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <img src="{{$equipo->url}}" height="280px" width="290px" alt="...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <label>Nombre</label>
                                    <input type="text" required name="title" class="form-control"
                                           value="{{$equipo->title}}">
                                </div>
                                <br>
                                <div class="row">
                                    <label>Puesto</label>
                                    <input type="text" required name="puesto" class="form-control"
                                           value="{{$equipo->content}}">
                                </div>
                                <br>
                                <div class="row">
                                    <button class="btn btn-outline-success">Actualizar</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
