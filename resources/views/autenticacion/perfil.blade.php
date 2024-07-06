{{-- Actualizar contraseña --}}

@extends('layouts.app')

@section('titulo', 'Cambiar Contraseña')

@section('cabecera', 'Cambiar Contraseña')

@section('contenido')

<div class="card w-1/2 shadow-2xl bg-base-100 mt-6">
    <div class="card-body">
        <h2 class="text-xl font-semibold">Cambiar contraseña</h2>
        <form action="{{ route('perfil.password.update', ['user' => auth()->user()->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-control">
                <label class="label" for="password_old">
                    <span class="label-text">Contraseña actual</span>
                </label>
                <input type="password" name="password_old" placeholder="Ingrese la contraseña actual" class="input input-bordered" maxlength="45" required />
            </div>
            <div class="form-control">
                <label class="label" for="password">
                    <span class="label-text">Nueva contraseña</span>
                </label>
                <input type="password" name="password" placeholder="Ingrese la nueva contraseña" class="input input-bordered" maxlength="45" required />
            </div>
            <div class="form-control">
                <label class="label" for="password_confirmation">
                    <span class="label-text">Confirmar nueva contraseña</span>
                </label>
                <input type="password" name="password_confirmation" placeholder="Confirme la nueva contraseña" class="input input-bordered" maxlength="45" required />
            </div>
            <div class="form-control mt-6 w-1/2">
                <button class="btn btn-sm btn-neutral normal-case">Cambiar contraseña</button>
            </div>
        </form>
    </div>
</div>
