@extends('layouts.app')
@section('titulo', 'Nuestros Productos')
@section('cabecera', 'Nuestros Productos')
@section('contenido')
{{-- Si el usuario es admin, muestra botón para crear producto --}}
@if (auth()->user()->rol == 'admin')
    <div class="flex justify-end m-4">
        <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Producto</a>
    </div>
@endif
<div class="flex justify-center mx-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($productos as $producto)
            {{-- No muestra a los clientes productos que tienen stock cero --}}
            @if (auth()->user()->rol == 'admin' || $producto->stock > 0)
                <div class="card w-72 bg-base-100 shadow-xl">
                    <figure>
                        @if(file_exists('images/productos/producto_'. $producto->id . '.jpg'))
                            <img src="{{ asset('images/productos/producto_' . $producto->id . '.jpg') }}" alt="{{ $producto->nombre }}">
                        @else
                            <img src="{{ asset('images/productos/default.jpg') }}" alt="Imagen por defecto">
                        @endif
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">{{ $producto->nombre }}</h2>
                        <div class="badge badge-success badge-outline">{{ $producto->categoria->nombre }}</div>
                        <p>{{ Str::limit($producto->descripcion, 50) }}</p>
                        {{-- Precio y stock --}}
                        <div class="flex space-x-4">
                            <div class="badge badge-neutral">${{ number_format($producto->precio, 2) }}</div>
                            <div class="badge badge-ghost">{{ $producto->stock }} en stock</div>
                        </div>
                        <div class="card-actions justify-end mt-2">
                            {{-- Si el usuario es admin muestra botones de editar y eliminar --}}
                            @if (auth()->user()->rol == 'admin')
                                {{-- Editar --}}
                                <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning btn-sm">Editar</a>
                                {{-- Eliminar --}}
                                @if ($producto->pedidos->isEmpty())
                                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                @endif
                            @else
                                {{-- Si el usuario es cliente, muestra botón para ordenar --}}
                                <a href="{{ route('pedidos.create', $producto) }}" class="btn btn-primary btn-sm">Ordenar</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection

