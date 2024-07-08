

{{-- perfil-password-edit.blade.php --}}

@extends('layouts.app')

@section('titulo', 'Cambiar Contraseña')

@section('cabecera', 'Cambiar Contraseña')

@section('contenido')
<div class="card w-1/2 shadow-2xl bg-base-100 mt-6">
    <div class="card-body">
        <h2 class="text-xl font-semibold">Cambiar Contraseña</h2>
        {{-- Formulario para cambiar contraseña --}}
        <form method="POST" action="{{ route('perfil.password.update', ['user' => $user->id]) }}">
            @csrf
            @method('PUT')

            {{-- Campos del formulario --}}
            <div class="form-group">
                <label for="password_old">Contraseña Actual</label>
                <input id="password_old" type="password" class="form-control @error('password_old') is-invalid @enderror" name="password_old" required>

                @error('password_old')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Nueva Contraseña</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            {{-- Botón de enviar --}}
            <button type="submit" class="btn btn-primary">
                Cambiar Contraseña
            </button>
        </form>
    </div>
</div>
@endsection
