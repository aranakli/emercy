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
                {{ __('Ventas') }}
            </h2>
        </x-slot>
        <div class="container my-5">
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-xl text-white leading-tight">Ventas</h2>
                </div>
                <div class="card-body">
                    {{-- <a href="{{ route('ventas.create') }}" class="btn btn-primary mb-3">Agregar venta</a> --}}
                    @if ($error ?? '')
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Funeraria</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Medio de pago</th>
                                <th scope="col">Autorizacion electronica</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">IVA</th>
                                <th scope="col">Total Venta</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ventas as $venta)
                            <tr>
                                <th scope="row">{{ $venta->id }}</th>
                                <td>{{ $venta->nombre_cliente }}</td>
                                <td>{{ $venta->nombre_producto }}</td>
                                <td>{{ $venta->medio_pago_venta }}</td>
                                <td>{{ $venta->autorizacion_venta }}</td>
                                <td>{{ $venta->cantidad_venta }}</td>
                                <td>{{ $venta->precio_venta }}</td>
                                <td>{{ $venta->iva_venta }}</td>
                                <td>{{ $venta->total_venta }}</td>
                                <?php
                                $txt_estado = $venta->estado_venta == '1' ? 'Activo' : 'Anulada';
                                ?>
                                <td>{{ $txt_estado }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('ventas.edit', ['venta' => $venta->id]) }}"
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
