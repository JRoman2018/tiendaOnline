@extends('plantilla.admin')

@section('titulo', 'Crear Producto')

@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="{{route('admin.product.index')}}">Productos</a></li>
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')
<!-- /#app -->
@endsection()
