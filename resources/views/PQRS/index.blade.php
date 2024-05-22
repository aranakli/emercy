<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PQRS</title>
    <style>
        body {
            background-color: #f2f2f2;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .card-header {
            background-color: #4B15BF;
            color: #fff;
            font-weight: bold;
            border-radius: 10px 10px 0 0;
        }

        .table {
            background-color: #fff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('PQRS') }}
            </h2>
        </x-slot>
        <div class="container my-5">
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-xl text-white leading-tight">PQRS</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('pqrss.create') }}" class="btn btn-primary mb-3">Agregar pqrs</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Funeraria</th>
                                <th scope="col">Clase PQRS</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Respuesta</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Radicado</th>
                                <th scope="col">Actualizado</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pqrss as $pqrs)
                            <tr>
                                <th scope="row">{{ $pqrs->id }}</th>
                                <td>{{ $pqrs->nombre_cliente }}</td>
                                <td>{{ $pqrs->tipo_pqrs }}</td>
                                <td>{{ $pqrs->descripcion_pqrs }}</td>
                                <td>{{ $pqrs->respuesta_pqrs }}</td>
                                <td>{{ $pqrs->estado_pqrs }}</td>
                                <td>{{ $pqrs->created_at }}</td>
                                <td>{{ $pqrs->updated_at }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('pqrss.edit', ['pqrs' => $pqrs->id]) }}"
                                            class="btn btn-primary">Editar</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
