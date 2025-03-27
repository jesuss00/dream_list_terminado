<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamList - Lista de Deseos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset("img/fondo.jpg") }}') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: white;
        }
        .container {
            max-width: 800px;
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }
        h1, h2 {
            color: #ffcc00;
            font-weight: bold;
        }
        .card-header {
            background-color:rgb(14, 106, 134);
            color: white;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #28a745;
            border: none;
        }
        .btn-primary:hover {
            background-color: #218838;
        }
        .btn-warning {
            background-color: #ffc107;
            border: none;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">DreamList - Tu Lista de Deseos</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Añadir un nuevo deseo</div>
                    <div class="card-body">
                        <form action="{{ route('deseo.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="usuario_id" value="1">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del deseo</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoría</label>
                                <input type="text" name="categoria" id="categoria" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="estado_id" class="form-label">Estado</label>
                                <select name="estado_id" id="estado_id" class="form-control" required>
                                    <option value="1">Pendiente</option>
                                    <option value="2">Realizado</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Guardar</button>
                        </form>
                    </div>
                </div>
                <div class="mt-4">
                    <h2 class="text-center">Lista de deseos</h2>
                    <ul class="list-group">
                    @if(isset($deseos) && $deseos->count() > 0)
                @foreach ($deseos as $deseo)
                <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white">
                <span>{{ $deseo->nombre }}</span>
                <div>
                {{-- <a href="{{ route('deseo.edit', $deseo->id) }}" class="btn btn-warning btn-sm">Editar</a> --}}
                <form action="{{ route('deseo.destroy', $deseo->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
                </div>
                </li>
                 @endforeach
@else
    <p class="text-center">No hay deseos disponibles.</p>
@endif

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
