@extends('layouts.app')
@section('titulo', 'Nuestros Productos')
@section('cabecera', 'Nuestros Productos')

@section('contenido')
    {{-- Mostrar botón de crear producto si el usuario es administrador --}}
    @if (auth()->user()->rol == 'admin')
        <div class="flex justify-end m-4">
            <a href="{{ route('productos.create') }}" class="btn btn-outline btn-sm">Crear Producto</a>
        </div>
    @endif
    
    <div class="flex justify-center mx-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10">
            @foreach ($productos as $producto)
                {{-- Mostrar solo productos con stock > 0 o todos si el usuario es administrador --}}
                @if (auth()->user()->rol == 'admin' || $producto->stock > 0)
                    <div class="card w-72 bg-base-100 shadow-xl">
                        <figure>
                            {{-- Mostrar imagen del producto --}}
                            @if ($producto->imagen)
                                <img src="{{ asset('images/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="rounded-t-lg h-40 w-full object-cover">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" alt="{{ $producto->nombre }}" class="rounded-t-lg h-40 w-full object-cover">
                            @endif
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">{{ $producto->nombre }}</h2>
                            <div class="badge badge-success badge-outline">Categoría: {{ $producto->categoria->nombre }}</div>
                            <p>{{ Str::limit($producto->descripcion, 80) }}</p>

                            {{-- Mostrar precio y stock --}}
                            <div class="flex space-x-4">
                                <div class="badge badge-neutral">${{ number_format($producto->precio, 0, ',', '.') }}</div>
                                <div class="badge badge-ghost">{{ $producto->stock }} en stock</div>
                            </div>
                        
                            <div class="card-actions justify-end mt-5">
                                {{-- Mostrar acciones según el rol del usuario --}}
                                @if (auth()->user()->rol == 'admin')
                                    {{-- Mostrar enlaces de edición y eliminación --}}
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-xs">Editar</a>
                                    {{-- Mostrar formulario de eliminación si no hay pedidos asociados --}}
                                    @if ($producto->pedidos->count() == 0)
                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('¿Desea eliminar el producto {{ $producto->nombre }}?')" class="btn btn-error btn-xs">Eliminar</button>
                                        </form>
                                    @endif
                                @else
                                    {{-- Mostrar enlace para ordenar si el usuario es cliente --}}
                                    <a href="{{ route('pedidos.createWithProduct', $producto->id) }}" class="btn btn-primary btn-xs">Ordenar</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
