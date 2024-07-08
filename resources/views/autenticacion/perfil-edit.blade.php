{{-- perfil-edit.blade.php --}}

@extends('layouts.app')

@section('titulo', 'Editar Perfil')

@section('cabecera', 'Editar Perfil')

@section('contenido')
<div class="card w-1/2 shadow-2xl bg-base-100 mt-6">
    <div class="card-body">
        <h2 class="text-xl font-semibold">Editar Perfil</h2>
        {{-- Formulario para editar perfil --}}
        <form method="POST" action="{{ route('perfil.update', ['user' => $user->id]) }}">
            @csrf
            @method('PUT')

            {{-- Campos del formulario --}}
            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Dirección</label>
                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $user->address) }}" required autocomplete="address">

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Botón de enviar --}}
            <button type="submit" class="btn btn-primary">
                Guardar Cambios
            </button>
        </form>
    </div>
</div>
@endsection
