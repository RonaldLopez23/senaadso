{{-- perfil.blade.php --}}

@extends('layouts.app')

@section('titulo', 'Mi Perfil')

@section('cabecera', 'Mi Perfil')

@section('contenido')

<div class="card w-1/2 shadow-2xl bg-base-100 mt-6">
    <div class="card-body">
        <h2 class="text-xl font-semibold">Perfil de Usuario</h2>
        <p>Nombre: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Dirección: {{ $user->address }}</p>
        <a href="{{ route('perfil.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-neutral normal-case">Editar Perfil</a>
        <a href="{{ route('perfil.password.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-primary normal-case">Cambiar Contraseña</a>
    </div>
</div>

@endsection
