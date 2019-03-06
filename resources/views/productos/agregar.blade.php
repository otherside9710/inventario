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
                    <center><h5>AGREGAR PRODUCTOS</h5></center>
                    <br><br>
                    <form action="{{route('producto.add')}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="col-md-3">
                                <label>Cantidad</label>
                                <input type="number" class="form-control" name="cantidad" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <label>Precio Real</label>
                                <input type="number" id="precio" class="form-control" name="precio" required>
                            </div>
                            <div class="col-md-3">
                                <label>Precio Venta</label>
                                <input type="number" id="precio_venta" readonly class="form-control" name="precio_venta" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-4">
                                <button class="btn btn-outline-success">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('__partials.scripts')

    <script>
        $('#precio').on('change', function () {
            $precioReal = $(this).val();
            $precioVentaCalculo = $precioReal * 0.20;
            $('#precio_venta').val(parseInt($precioReal) + parseInt($precioVentaCalculo));
        })
    </script>
@endsection
