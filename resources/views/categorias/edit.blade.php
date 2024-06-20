@extends('layouts.app')

@section('titulo', 'Editar Categoría')
@section('cabecera', 'Editar Categoría ' . $categoria->nombre)
@section('contenido')
<div class="flex justify-center">
    <div class="card w-96 shadow-2xl bg-base-100">
        <div class="card-body">
            <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-control">
                    <label class="label" for="nombre">
                        <span class="label-text">Nombre</span>
                    </label>
                    <input type="text" name="nombre" value="{{ $categoria->nombre }}" placeholder="Nombre de la categoría" class="input input-bordered" required>
                </div>
                <div class="form-control">
                    <label class="label" for="descripcion">
                        <span class="label-text">Descripción</span>
                    </label>
                    <input type="text" name="descripcion" value="{{ $categoria->descripcion }}" placeholder="Descripción de la categoría" class="input input-bordered">
                </div>
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
                    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
