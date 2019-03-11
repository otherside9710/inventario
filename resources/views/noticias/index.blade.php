@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => 'home', 'name' => 'Home'],
            ['route' => '', 'name' => 'Noticias']
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
                    <center><h5>NOTICIAS</h5></center>
                    <br><br>
                    <div class="row">
                        <form action="{{route('notice.add')}}">
                            <button class="btn btn-outline-success">Nueva Noticia <i class="fa fa-plus-circle"></i></button>
                        </form>
                    </div>
                    <br>
                    <div class="row">
                        @foreach($noticias as $notice)
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">#{{$notice->id}} - {{$notice->titulo}}</h5>
                                    <p align="justify" class="card-text">{{$notice->descripcion}}</p>
                                    <form action="{{route('notice.edit', $notice->id)}}">
                                        <center>
                                            <button style="width: 110px" class="btn btn-outline-success">Editar <i class="fa fa-pencil-alt"></i></button>
                                        </center>
                                    </form>
                                    <form action="{{route('notice.delete', $notice->id)}}" id="formDelete">
                                        <center>
                                            <button style="width: 110px" class="btn btn-outline-danger">Eliminar <i class="fa fa-trash"></i>
                                            </button>
                                        </center>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('__partials.scripts')
    <script>
        $('#formDelete').on('submit', function (event) {
            event.stopPropagation();
            if(confirm("¿Está seguro de eliminar la noticia?")){
                return true;
            }else{
                return false;
            }
        });
    </script>
@endsection
