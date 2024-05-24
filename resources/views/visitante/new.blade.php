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

    <title>Agregar nueva sala</title>

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
                {{ __('Visitante') }}
            </h2>
        </x-slot>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-user-plus"></i>
                            Agregar nuevo visitante
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('visitantes.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="id" class="form-label">Id visitante</label>
                                    <input type="hidden" class="form-control" id="id" aria-describedby="idHelp"
                                        name="id" disabled="disabled">
                                    <div id="idHelp" class="form-text">Id visitante</div>
                                </div>
                                <div class="mb-3">
                                    <label for="cliente_id" class="form-label">Funeraria</label>
                                    <select class="form-select" id="cliente_id" name="cliente_id" required>
                                        <option selected disabled value="">Elegir uno...</option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->id }}">{{ $cliente->nombre_cliente }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nombre_visitante" class="form-label">Nombre visitante</label>
                                    <input type="text"  class="form-control" id="nombre_visitante"
                                        aria-describedby="nameHelp" name="nombre_visitante" required placeholder="Nombre del visitante">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">eMail visitante</label>
                                    <input type="email"  class="form-control" id="email"
                                        aria-describedby="nameHelp" name="email" required placeholder="eMail del visitante">
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Telefono del visitante</label>
                                    <input type="number"  class="form-control" id="telefono"
                                        aria-describedby="nameHelp" name="telefono" required placeholder="Telefonno del visitante">
                                </div>
                                <div class="mb-3">
                                    <label for="tel_confirma" class="form-label">Telefono confirmado</label>
                                    <input type="checkbox"  class="form-control" id="tel_confirma"
                                        aria-describedby="nameHelp" name="tel_confirma"  placeholder="Fecha de fallecimiento">
                                </div>
                                <div class="mb-3">
                                    <label for="estado" class="form-label">Estado</label>
                                    <input type="checkbox"  class="form-control" id="estado"
                                        aria-describedby="nameHelp" name="estado"  placeholder="Esatdo del visiatnte">
                                </div>
                                <div class="mt-3 text-center">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="{{ route('visitantes.index') }}" class="btn btn-warning">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script> -->
</body>

</html>
