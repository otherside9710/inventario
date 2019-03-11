@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => 'home', 'name' => 'Home'],
            ['route' => 'notices', 'name' => 'Noticias'],
            ['route' => '', 'name' => 'Agregar Noticia']
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
                    <center><h5>AGREGAR NOTICIA</h5></center>
                    <br><br>
                    <form action="{{route('notice.save')}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <label>Titulo</label>
                            <textarea class="form-control" id="text" name="titulo" cols="30"
                                      rows="2"></textarea>
                        </div>
                        <br>
                        <div class="row">
                            <label>Descripción</label>
                            <textarea class="form-control" id="text" name="desc" cols="30"
                                      rows="10"></textarea>
                        </div>
                        <br>
                        <center>
                            <button class="btn btn-outline-success">Guardar</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
