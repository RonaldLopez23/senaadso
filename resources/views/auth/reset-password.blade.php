@extends('layouts.app')

@section('titulo', 'Nueva contraseña')

@section('cabecera', 'Ingresar al sistema')

<!-- resources/views/auth/reset-password.blade.php -->
<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="email" value="{{ $email }}">

    <div>
        <label for="password">Nueva Contraseña</label>
        <input id="password" type="password" name="password" required>
        @error('password')
            <span role="alert">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>

    <div>
        <button type="submit">Restablecer Contraseña</button>
    </div>
</form>
