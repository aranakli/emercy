<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Clientes</title>
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
                {{ __('Obituarios') }}
            </h2>
        </x-slot>
        <div class="container my-5">
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-xl text-white leading-tight">Obituarios</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('obituarios.create') }}" class="btn btn-primary mb-3">Agregar obituario</a>
                    @if ($error ?? '')
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Funeraria</th>
                                <th scope="col">Nombre difunto</th>
                                <th scope="col">Apellido difunto</th>
                                <th scope="col">Fecha y Hora    Exequias</th>
                                <th scope="col">Lugar Exequias</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obituarios as $obituario)
                            <tr>
                                <th scope="row">{{ $obituario->id }}</th>
                                <td>{{ $obituario->nombre_cliente }}</td>
                                <td>{{ $obituario->nombre_obituario }}</td>
                                <td>{{ $obituario->apellido_obituario }}</td>
                                <td>{{ $obituario->fecha_exequias_obituario }}</td>
                                <td>{{ $obituario->lugar_exequias_obituario }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('obituarios.edit', ['obituario' => $obituario->id]) }}"
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
