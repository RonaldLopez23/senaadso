@extends('layouts.app')
@section('titulo', 'Crear Producto')
@section('cabecera', 'Crear Producto')
@section('contenido')
<div class="flex justify-center">
    <div class="card w-96 shadow-2xl bg-base-100">
        <div class="card-body">
            {{-- Formulario para crear producto --}}
            <form action="{{route('productos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Categoria --}}
                <div class="form-control">
                    <label class="label" for="categoria_id">
                        <span class="label-text">Categoría</span>
                    </label>
                    <select name="categoria_id" class="select select-bordered">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- Nombre --}}
                <div class="form-control">
                    <label class="label" for="nombre">
                        <span class="label-text">Nombre</span>
                    </label>
                    <input type="text" name="nombre" placeholder="Nombre del producto" class="input input-bordered">
                </div>
                {{-- Imagen --}}
                <div class="form-control">
                    <label class="label" for="imagen">
                        <span class="label-text">Imagen</span>
                    </label>
                    <input type="file" name="imagen" class="input input-bordered">
                </div>
                {{-- Descripcion --}}
                <div class="form-control">
                    <label class="label" for="descripcion">
                        <span class="label-text">Descripción</span>
                    </label>
                    <input type="text" name="descripcion" placeholder="Descripción del producto" class="input input-bordered">
                </div>
                {{-- Precio --}}
                <div class="form-control">
                    <label class="label" for="precio">
                        <span class="label-text">Precio</span>
                    </label>
                    <input type="number" name="precio" placeholder="Precio del producto" class="input input-bordered">
                </div>
                {{-- Stock --}}
                <div class="form-control">
                    <label class="label" for="stock">
                        <span class="label-text">Stock</span>
                    </label>
                    <input type="number" name="stock" placeholder="Cantidad en stock" class="input input-bordered">
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary">Crear Producto</button>
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary ml-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
