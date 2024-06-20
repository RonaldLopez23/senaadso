@extends('layouts.app')
@section('titulo', 'Listar Pedidos')
@section('cabecera', 'Listar Pedidos')
@section('contenido')
<div class="flex justify-center">
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th># Pedido</th>
                    <th>Fecha y hora</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unit.</th>
                    <th>Valor total</th>
                    <th>Estado</th>
                    @if(auth()->user()->rol == 'admin')
                        <th>Cliente</th>
                        <th>Dirección</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id }}</td>
                        <td>{{ $pedido->fecha }}</td>
                        <td>{{ $pedido->productos[0]->nombre }}</td>
                        <td>{{ $pedido->productos[0]->pivot->cantidad }}</td>
                        <td>{{ '$' . number_format($pedido->productos[0]->pivot->precio, 2) }}</td>
                        <td>{{ '$' . number_format($pedido->productos[0]->pivot->cantidad * $pedido->productos[0]->pivot->precio, 2) }}</td>
                        <td>
                            @if ($pedido->estado == 'pendiente')
                                <span class="badge badge-warning">Pendiente</span>
                            @elseif ($pedido->estado == 'enviado')
                                <span class="badge badge-primary">Enviado</span>
                            @else
                                <span class="badge badge-success">Entregado</span>
                            @endif
                        </td>
                        @if(auth()->user()->rol == 'admin')
                            <td>{{ $pedido->user->name }}</td>
                            <td>{{ $pedido->user->address }}</td>
                            <td>{{ $pedido->user->email }}</td>
                            <td class="flex space-x-2">
                                <a href="{{ route('pedidos.edit', $pedido) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('pedidos.destroy', $pedido) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este pedido?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Paginación --}}
        <div class="flex justify-center mt-4">
            {{ $pedidos->links() }}
        </div>
    </div>
</div>
@endsection
