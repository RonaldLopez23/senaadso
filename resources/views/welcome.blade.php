@extends('layouts.app')
@section('titulo', 'SGIM')
@section('cabecera', 'SGIM - El mejor lugar para comprar tus productos tecnologicos')
@section('contenido')

    <div class="hero min-h-screen" style="background-image: url(https://img.freepik.com/fotos-premium/hombre-hermoso-joven-probando-telefonos-mientras-que-muchacha-alegre-hermosa-joven-sosteniendo-su-mano-abrazada-mirando-lo-que-haciendo_232070-5661.jpg?w=740);">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-neutral-content">
        <div class="max-w-md">
            <h1 class="mb-5 text-5xl font-bold">Aquí encontrará los mejores productos de tecnologia a la mano!</h1>
            <p class="mb-5">Estamos comprometidos con nuestros clientes entregándoles lo mejor en tecnologia.  Nuestros envíos no tienen costo y llegan el mismo día de realizado su pedido.</p>
            <a href="{{route('productos.index')}}" class="btn btn-primary">Iniciar experiencia</a>
        </div>
        </div>
    </div>
@endsection