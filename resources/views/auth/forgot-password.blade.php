{{-- resources/views/auth/forgot-password.blade.php --}}

@extends('layouts.app')

@section('titulo', 'Recuperar contraseña')
@section('cabecera', 'Recuperar contraseña')

@section('contenido')
    <div class="flex justify-center">
        <div class="card w-96 shadow-2xl bg-base-100">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('password.email') }}" method="POST">
                    @csrf

                    <div class="form-control">
                        <label class="label" for="email">
                            <span class="label-text">Correo electrónico</span>
                        </label>
                        <input type="email" name="email" placeholder="Ingrese su correo electrónico" class="input input-sm input-bordered" required autofocus />
                    </div>

                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-sm btn-primary">Enviar enlace de restablecimiento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
