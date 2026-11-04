@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de pedidos - Bochito</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">
        Agregar pedido
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido['id'] }}</td>
                    <td>{{ $pedido['cliente'] }}</td>
                    <td>{{ $pedido['producto'] }}</td>
                    <td>{{ $pedido['cantidad'] }}</td>
                    <td>${{ number_format((float) ($pedido['precio'] ?? 0), 2) }}</td>

                    <td>
                        <a href="{{ route('productos.edit', $pedido['id']) }}"
                           class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{ route('productos.destroy', $pedido['id']) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('¿Estás segura de eliminar este pedido?');">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        No hay pedidos registrados.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection