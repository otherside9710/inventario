@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => 'home', 'name' => 'Home'],
            ['route' => '', 'name' => 'Nuestro Equipo']
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
                    <center><h5>NUESTRO EQUIPO</h5></center>
                    <br><br>
                    <div class="row">
                        <form action="{{route('team.add')}}">
                            <button class="btn btn-outline-success">Nuevo Miembro <i class="fa fa-plus-circle"></i></button>
                        </form>
                    </div>
                    <br>
                    <div class="row">
                        @foreach($images as $image)
                            <div class="card" style="width: 18rem;">
                                <img src="{{$image->url}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">#{{$image->id}} - {{$image->title}}</h5>
                                    <p align="justify" class="card-text">{{$image->content}}</p>
                                    <form action="{{route('team.edit', $image->id)}}">
                                        <center>
                                            <button style="width: 110px" class="btn btn-outline-success">Editar <i
                                                    class="fa fa-pencil-alt"></i></button>
                                        </center>
                                    </form>
                                    <form action="{{route('team.delete', $image->id)}}" id="formTeamDelete">
                                        <center>
                                            <button style="width: 110px" class="btn btn-outline-danger">Eliminar <i
                                                    class="fa fa-trash"></i>
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
        $('#formTeamDelete').on('submit', function (event) {
            event.stopPropagation();
            if (confirm("¿Está seguro de eliminar el participante del equipo?")) {
                return true;
            } else {
                return false;
            }
        });
    </script>
@endsection
