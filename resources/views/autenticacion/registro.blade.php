@extends('layouts.app')

@section('titulo', 'Registro de nuevo usuario')
@section('cabecera', 'Registro de nuevo usuario')

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

            <form action="{{ route('registro.store') }}" method="POST">
                @csrf

                {{-- Nombre --}}
                <div class="form-control">
                    <label class="label" for="name">
                        <span class="label-text">Nombre</span>
                    </label>
                    <input type="text" name="name" placeholder="Ingrese su nombre" value="{{ old('name') }}">
                </div>

                {{-- Email --}}
                <div class="form-control">
                    <label class="label" for="email">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" placeholder="Ingrese su correo electrónico" value="{{ old('email') }}">
                </div>

                {{-- Contraseña --}}
                <div class="form-control">
                    <label class="label" for="password">
                        <span class="label-text">Contraseña</span>
                    </label>
                    <input type="password" name="password" placeholder="Ingrese su contraseña">
                </div>

                {{-- Confirmar Contraseña --}}
                <div class="form-control">
                    <label class="label" for="password_confirmation">
                        <span class="label-text">Confirmar contraseña</span>
                    </label>
                    <input type="password" name="password_confirmation" placeholder="Confirme su contraseña">
                </div>

                {{-- Dirección --}}
                <div class="form-control">
                    <label class="label" for="address">
                        <span class="label-text">Dirección</span>
                    </label>
                    <input type="text" name="address" placeholder="Ingrese su dirección" value="{{ old('address') }}">
                </div>

                {{-- Botones --}}
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-sm btn-primary">Registrar</button>
                    <a href="{{ route('inicio') }}" class="btn btn-sm btn-secondary ml-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
