@extends('layouts.app')
@section('titulo', 'Estado Pedido')
@section('cabecera', 'Estado Pedido # ' . $pedido->id . ' - ' . $pedido->productos[0]->nombre)
@section('contenido')
<div class="flex justify-center">
    <div class="card w-96 shadow-2xl bg-base-100">
        <div class="card-body">
            <p>Cantidad: {{ $pedido->productos[0]->pivot->cantidad }}</p>
            <p>Precio: {{ '$' . number_format($pedido->productos[0]->pivot->precio, 2) }}</p>
            <p>Total: {{ '$' . number_format($pedido->productos[0]->pivot->cantidad * $pedido->productos[0]->pivot->precio, 2) }}</p>
            <form action="{{ route('pedidos.update', $pedido) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-control mb-2">
                    <label for="estado">Estado del pedido:</label>
                    <select name="estado" id="estado" class="select select-bordered">
                        <option value="pendiente" {{ $pedido->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="enviado" {{ $pedido->estado == 'enviado' ? 'selected' : '' }}>Enviado</option>
                        <option value="entregado" {{ $pedido->estado == 'entregado' ? 'selected' : '' }}>Entregado</option>
                    </select>
                </div>
                <div class="form-control">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
