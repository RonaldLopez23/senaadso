@extends('layouts.app')

@section('titulo', 'Restablecer contraseña')
@section('cabecera', 'Restablecer contraseña')

@section('contenido')
    <div class="flex justify-center">
        <div class="card w-96 shadow-2xl bg-base-100">
            <div class="card-body">
                <h2 class="text-xl font-semibold">Restablecer contraseña</h2>
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->route('token') }}">
                    <div class="form-control">
                        <label class="label" for="email">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" name="email" placeholder="Escriba su email" maxlength="255" class="input input-sm input-bordered" required />
                    </div>
                    <div class="form-control">
                        <label class="label" for="password">
                            <span class="label-text">Nueva contraseña</span>
                        </label>
                        <input type="password" name="password" placeholder="Mínimo 5 caracteres" maxlength="45" class="input input-sm input-bordered" required />
                    </div>
                    <div class="form-control">
                        <label class="label" for="password_confirmation">
                            <span class="label-text">Confirmar nueva contraseña</span>
                        </label>
                        <input type="password" name="password_confirmation" placeholder="Confirme la nueva contraseña" maxlength="45" class="input input-sm input-bordered" required />
                    </div>
                    <div class="form-control mt-6">
                        <button class="btn btn-sm btn-primary">Restablecer contraseña</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
