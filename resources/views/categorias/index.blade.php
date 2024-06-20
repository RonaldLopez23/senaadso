@extends('layouts.app')

@section('titulo', 'Listar Categorías')
@section('cabecera', 'Listar Categorías')

@section('contenido')
<div class="flex justify-end m-4">
    <a href="{{ route('categorias.create') }}" class="btn btn-primary">Crear Categoría</a>
</div>
<div class="flex justify-center">
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td class="flex space-x-2">
                        <a href="{{ route('categorias.edit', ['categoria' => $categoria->id]) }}" class="btn btn-sm btn-primary">Editar</a>

                        @if($categoria->productos->count() == 0)
                        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
