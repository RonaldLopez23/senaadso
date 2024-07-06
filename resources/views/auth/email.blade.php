@extends('layouts.app')

@section('titulo', 'Olvidé mi contraseña')

@section('cabecera', 'Olvidé mi contraseña')

@section('contenido')
<div class="flex justify-center">
    <div class="card w-96 shadow-2xl bg-base-100">
        <div class="card-body">
            <h2 class="text-xl font-semibold">Restablecer contraseña</h2>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="form-control">
                    <label class="label" for="email">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" placeholder="Escriba su email" maxlength="255" class="input input-sm input-bordered" required />
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-sm btn-primary">Enviar enlace</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
