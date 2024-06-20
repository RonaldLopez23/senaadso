@extends('layouts.app')

@section('titulo', 'Minimercado')
@section('cabecera', 'Minimercado - El mejor lugar para comprar')

@section('contenido')
<div class="hero min-h-screen" style="background-image: url('ruta/a/tu/imagen.jpg');">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="hero-content text-center text-neutral-content">
        <div class="max-w-md">
            <h1 class="mb-5 text-5xl font-bold">Aquí encontrará lo mejor</h1>
            <p class="mb-5">Estamos comprometidos con nuestros clientes para ofrecer productos de calidad.</p>
            <a href="{{ route('productos.index') }}" class="btn btn-primary">Ver productos</a>
        </div>
    </div>
</div>
@endsection
