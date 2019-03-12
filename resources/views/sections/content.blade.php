@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => 'home', 'name' => 'Home'],
            ['route' => 'sections', 'name' => 'Secciones'],
            ['route' => '', 'name' => 'Contenido']
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
                    <center><h5>CONTENIDO</h5></center>
                    <br><br>
                    <div class="row">
                        <label>Nombre Sección: <b> {{$content->nombre}}</b></label>
                    </div>
                    <br>
                    <form action="{{route('section.update')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$content->id}}">
                        <div class="row">
                            <label>Titulo</label>
                            <input type="text" class="form-control" name="title" value="{{$content->titulo}}">
                            <br>
                            <br>
                            <label>Descripción</label>
                            <textarea class="form-control" id="text" name="desc" cols="30"
                                      rows="10">{{$content->descripcion}}</textarea>
                        </div>
                        <br>
                        <center>
                            <button class="btn btn-outline-success">Actualizar</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
