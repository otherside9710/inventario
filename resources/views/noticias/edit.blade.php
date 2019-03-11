@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => 'home', 'name' => 'Home'],
            ['route' => 'notices', 'name' => 'Noticias'],
            ['route' => '', 'name' => 'Editar Noticia']
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
                    <center><h5>EDITAR NOTICIA</h5></center>
                    <br><br>
                    <form action="{{route('notice.update')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$noticia->id}}">

                        <div class="row">
                            <label>Titulo</label>
                            <textarea class="form-control" id="text" name="titulo" cols="30"
                                      rows="2">{{$noticia->titulo}}</textarea>
                        </div>
                        <br>
                        <div class="row">
                            <label>Descripción</label>
                            <textarea class="form-control" id="text" name="desc" cols="30"
                                      rows="10">{{$noticia->descripcion}}</textarea>
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
