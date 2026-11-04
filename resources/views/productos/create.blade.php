<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar pedido | Bochito</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-success text-white">
                <h3>Registrar nuevo pedido</h3>
            </div>

            <div class="card-body">

                <form action="{{ route('productos.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nombre del cliente</label>
                        <input type="text"
                               name="cliente"
                               class="form-control"
                               value="{{ old('cliente') }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Producto solicitado</label>
                        <input type="text"
                               name="producto"
                               class="form-control"
                               value="{{ old('producto') }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cantidad</label>
                        <input type="number"
                               name="cantidad"
                               class="form-control"
                               min="1"
                               value="{{ old('cantidad') }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha de entrega estimada</label>
                        <input type="date"
                               name="entrega"
                               class="form-control"
                               value="{{ old('entrega') }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Estatus del pedido</label>

                        <select name="estatus" class="form-select" required>
                            <option value="Orden recibida">Orden recibida</option>
                            <option value="En fabricación">En fabricación</option>
                            <option value="Control de calidad">Control de calidad</option>
                            <option value="Empaquetado">Empaquetado</option>
                            <option value="En tránsito">En tránsito</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">
                        Registrar pedido
                    </button>

                    <a href="{{ route('productos.index') }}"
                       class="btn btn-secondary">
                        Cancelar
                    </a>

                </form>

            </div>
        </div>

    </div>

</body>
</html>
