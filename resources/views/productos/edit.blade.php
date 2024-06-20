@extends('layouts.app')
@section('titulo', 'Editar Producto')
@section('cabecera', 'Editar Producto - ' . $producto->nombre)
@section('contenido')
<div class="flex justify-center">
    <div class="card w-96 shadow-2xl bg-base-100">
        <div class="card-body">
            {{-- Imagen --}}
            <div>
                @if(file_exists(public_path('images/productos/producto_'.$producto->id.'.jpg')))
                    <img src="{{ asset('images/productos/producto_'.$producto->id.'.jpg') }}" alt="{{ $producto->nombre }}">
                @else
                    <img src="{{ asset('images/productos/default.jpg') }}" alt="Imagen por defecto">
                @endif
            </div>
            <form action="{{route('productos.update', $producto->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- Categoria --}}
                <div class="form-control">
                    <label class="label" for="categoria_id">
                        <span class="label-text">Categoría</span>
                    </label>
                    <select name="categoria_id" class="select select-bordered">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" @if ($categoria->id == $producto->categoria_id) selected @endif>{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- Nombre --}}
                <div class="form-control">
                    <label class="label" for="nombre">
                        <span class="label-text">Nombre</span>
                    </label>
                    <input type="text" name="nombre" placeholder="Nombre del producto" value="{{ $producto->nombre }}" class="input input-bordered">
                </div>
                {{-- Imagen --}}
                <div class="form-control">
                    <label class="label" for="imagen">
                        <span class="label-text">Cambiar imagen</span>
                    </label>
                    <input type="file" name="imagen" class="input input-bordered">
                </div>
                {{-- Descripcion --}}
                <div class="form-control">
                    <label class="label" for="descripcion">
                        <span class="label-text">Descripción</span>
                    </label>
                    <input type="text" name="descripcion" placeholder="Descripción del producto" value="{{ $producto->descripcion }}" class="input input-bordered">
                </div>
                {{-- Precio --}}
                <div class="form-control">
                    <label class="label" for="precio">
                        <span class="label-text">Precio</span>
                    </label>
                    <input type="number" name="precio" placeholder="Precio del producto" value="{{ $producto->precio }}" class="input input-bordered">
                </div>
                {{-- Stock --}}
                <div class="form-control">
                    <label class="label" for="stock">
                        <span class="label-text">Stock</span>
                    </label>
                    <input type="number" name="stock" placeholder="Stock del producto" value="{{ $producto->stock }}" class="input input-bordered">
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary">Actualizar Producto</button>
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
