<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Agregar nuevo cliente</title>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #4B15BF;
            color: #fff;
            font-weight: bold;
            border-radius: 10px 10px 0 0;
            padding: 1rem;
            display: flex;
            align-items: center;
        }

        .card-header i {
            font-size: 1.5rem;
            margin-right: 0.5rem;
        }

        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-warning {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #218838;
            border-color: #1e7e34;
            color: #fff;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Familiares') }}
            </h2>
        </x-slot>
        <div class="container  my-5">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-user-plus"></i>
                            Agregar nuevo familiar
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('familiares.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="id" class="form-label">Codigo</label>
                                    <input type="hidden" class="form-control" id="id" aria-describedby="idHelp"
                                        name="id" disabled="disabled">
                                    <div id="idHelp" class="form-text">Código Id</div>
                                </div>
                                <label for="cliente_id" class="p-1 text-gray-900 dark:text-gray-100">Funeraria:</label>
                                <select class="form-select" id="cliente_id" name="cliente_id" require>
                                    <option selected disabled value="">Seleccione una funeraria</option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nombre_cliente }}</option>
                                    @endforeach
                                </select>
                                <label for="obituario_id" class="p-1 text-gray-900 dark:text-gray-100">Obituario:</label>
                                <select class="form-select" id="obituario_id" name="obituario_id" require>
                                    <option selected disabled value="">Seleccione un obituario</option>
                                    @foreach ($obituarios as $obituario)
                                        <option value="{{ $obituario->id }}">{{ $obituario->nombre_obituario }}</option>
                                    @endforeach
                                </select>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre familiar</label>
                                    <input type="text" required class="form-control" id="nombre"
                                        aria-describedby="nameHelp" name="nombre" placeholder="Nombre  del cliente">
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <input type="number" required class="form-control" id="telefono"
                                        aria-describedby="nameHelp" name="telefono" placeholder="Numero telefónico"
                                        min="1" max="2147483647">
                                </div>
                                <div class="mb-3">
                                    <label for="parentesco" class="form-label">Parentesco</label>
                                    <input type="text" required class="form-control" id="parentesco"
                                        aria-describedby="nameHelp" name="parentesco"
                                        placeholder="parentesco del familiar">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">eMail</label>
                                    <input type="email" required class="form-control" id="email"
                                        aria-describedby="nameHelp" name="email"
                                        placeholder="Correo electronico del familiar">
                                </div>
                                <div class="mb-3">
                                    <label for="autoriza" class="form-label">Autorizador</label>
                                    <input type="checkbox" required class="form-control" id="autoriza"
                                        aria-describedby="nameHelp" name="autoriza" placeholder="Autoriza">
                                </div>
                                <div class="mb-3">
                                    <label for="estado" class="form-label">Activo </label>
                                    <input type="checkbox" class="form-control" id="estado"
                                        aria-describedby="nameHelp" name="estado">
                                </div>
                                <div class="mt-3 text-center">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="{{ route('familiares.index') }}" class="btn btn-warning">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
