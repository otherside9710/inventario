@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => 'home', 'name' => 'Home'],
            ['route' => 'team', 'name' => 'Equipo'],
            ['route' => 'team', 'name' => 'Agregar Miembro']
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
                    <center><h5>AGREGAR MIEMBRO</h5></center>
                    <br><br>
                    <center>
                        <form action="{{route('team.save')}}" enctype="multipart/form-data" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <label>Nombre</label>
                                <input type="text" required name="title" class="form-control">
                            </div>
                            <br>
                            <div class="row">
                                <label>Puesto</label>
                                <input type="text" required name="puesto" class="form-control">
                            </div>
                            <br>
                            <div class="row">
                                <label>Foto</label>
                                <input type="file" required name="image" class="form-control">
                            </div>
                            <br>
                            <center>
                                <button class="btn btn-outline-success">Guardar</button>
                            </center>
                        </form>
                    </center>
                </div>
            </div>
        </div>
    </div>
@endsection
