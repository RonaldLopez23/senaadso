@extends('layouts.app')
@section('titulo', 'Minimercado')
@section('cabecera', 'Minimercado - El mejor lugar para comprar')


<div class="hero bg-base-200 min-h-screen">
    <div class="hero-content text-center">
      <div class="max-w-md">
        <h1 class="text-5xl font-bold">Hola, {{auth()->user()->name}}</h1>
        <p class="py-6">
          Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
          quasi. In deleniti eaque aut repudiandae et a id nisi.
        </p>
        <a href="{{route('productos.index')}}" class="btn btn-primary">"Ver Productos</a>
      </div>
    </div>
  </div>
@endsection

