@extends('layouts.app')

@section('titulo', 'Ingresar al sistema')
@section('cabecera', 'Ingresar al sistema')

@section('contenido')
<div class="flex justify-center">
    <div class="card w-96 shadow-2xl bg-base-100">
        <div class="card-body">
            {{-- Mostrar mensajes de error --}}
            <div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="badge badge-warning">{{ $error }}</div>
                    @endforeach
                @endif
            </div>

            <form action="{{ route('login.store') }}" method="POST">
                @csrf

                {{-- Email --}}
                <div class="form-control">
                    <label class="label" for="email">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" placeholder="Ingrese su correo electrónico">
                </div>

                {{-- Contraseña --}}
                <div class="form-control">
                    <label class="label" for="password">
                        <span class="label-text">Contraseña</span>
                    </label>
                    <input type="password" name="password" placeholder="Ingrese su contraseña">
                </div>

                {{-- Botón Ingresar --}}
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-sm btn-primary">Ingresar</button>
                    <a href="{{ route('inicio') }}" class="btn btn-sm btn-secondary ml-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
