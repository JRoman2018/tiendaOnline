@extends('plantilla.admin')

@section('titulo', 'Administración de Productos')

@section('breadcrumb')
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')

<div id="confirmarEliminar" class="row">

    <span style="display: none;" id="urlbase">{{route('admin.product.index')}}</span>
    @include('custom.modal_eliminar')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sección de Productos</h3>

                <div class="card-tools">
                    <form>

                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="nombre" class="form-control float-right"
                                   placeholder="Buscar"
                            value="{{request()->get('nombre')}}">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 500px;">
                <a class="float-right btn btn-outline-primary m-2" href="{{route('admin.product.create')}}" title="Crear Producto">Crear</a>

                <table class="table table-head-fixed">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Activo</th>
                        <th>Slider Principal</th>
                        <th class="text-center" colspan="3">Acciones</th>
                    </tr>
                    </thead>
                    <tbody >
                    @foreach($productos as $producto)
                    <tr>
                        <td class="align-middle"> {{$producto->id}} </td>
                        <td>
                            @if($producto->images->count() <= 0)
                                <img style="height: 80px; width: 80px;" src="/imagenes/avatar.png" class="rounded-circle">
                                @else
                                <img style="height: 80px; width: 80px;" src="{{$producto->images->random()->url}}" class="rounded-circle">
                            @endif
                        </td>
                        <td class="align-middle"> {{$producto->nombre}} </td>
                        <td class="align-middle"> {{$producto->estado}} </td>
                        <td class="align-middle text-primary"> {{$producto->activo}} </td>
                        <td class="align-middle text-danger"> {{$producto->sliderprincipal}} </td>

                        <td class="align-middle"><a class="text-info" href="{{route('admin.product.show', $producto->slug)}}" title="Ver Categoria"><i class="fas fa-eye"></i></a></td>
                        <td class="align-middle"><a href="{{route('admin.product.edit', $producto->slug)}}" title="Editar Categoria"><i class="fas fa-edit"></i></a></td>
                        <td class="align-middle"><a class="text-danger" href="{{route('admin.product.index')}}"
                               title="Eliminar Categoria" v-on:click.prevent="deseas_eliminar({{$producto->id}})"><i class="fas fa-trash-alt"></i></a></td>
{{--                        data-toggle="modal" data-target="#modal_eliminar"--}}

                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr >
                <div class="d-flex align-content-center justify-content-center pt-1">{{$productos->appends($_GET)->links()}}</div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

@endsection()
