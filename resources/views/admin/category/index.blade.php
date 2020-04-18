@extends('plantilla.admin')

@section('titulo', 'Administración de Categorias')

@section('contenido')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sección de Categorias</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 400px;">
                <a class="float-right btn btn-outline-primary m-2" href="{{route('admin.category.create')}}" title="Crear Categoria">Crear</a>

                <table class="table table-head-fixed">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Slug</th>
                        <th>Descripción</th>
                        <th>Fecha Creación</th>
                        <th>Fecha Modificación</th>
                        <th class="text-center" colspan="3">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categorias as $categoria)
                    <tr>
                        <td> {{$categoria->id}} </td>
                        <td> {{$categoria->nombre}} </td>
                        <td> {{$categoria->slug}} </td>
                        <td> {{$categoria->descripcion}} </td>
                        <td class="text-primary"> {{$categoria->created_at}} </td>
                        <td class="text-success"> {{$categoria->updated_at}} </td>

                        <td><a class="text-info" href="{{route('admin.category.show', $categoria->slug)}}" title="Ver Categoria"><i class="fas fa-eye"></i></a></td>
                        <td><a href="{{route('admin.category.edit', $categoria->slug)}}" title="Editar Categoria"><i class="fas fa-edit"></i></a></td>
                        <td><a class="text-danger" href="{{route('admin.category.destroy', $categoria->slug)}}" title="Eliminar Categoria"><i class="fas fa-trash-alt"></i></a></td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr >
                <div class="d-flex align-content-center justify-content-center pt-1">{{$categorias->links()}}</div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

@endsection()
