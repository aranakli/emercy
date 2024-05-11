<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PQRS</title>
  </head>
  <body>
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PQRS') }}
        </h2>
    </x-slot>
    <div class="container">
    <form method="POST" action="{{ route('PQRSs.update', ['pqrs'=>$pqrs->id]) }}">
        @method('put')
        @csrf
        <div class="mb-3">
        <label for="id" class="form-label">Código</label>
        <input type="text" require class="form-control" maxlength="3" style="text-transform:uppercase" id="id" name="id"
        disabled="disabled" value="{{ $pqrs->id }}">
        <div id="idHelp" class="form-text">Código pqrs</div>
        </div>

        <label for="nombre">Nombre</label>
        <select class="form-select" id="nombre" name="nombre" required>
            <option selected disabled value="">Elegir uno...</option>
            @foreach ($clientes as $cliente)
                @if ($cliente->id == $pqrs->id_cliente)
                    <option selected value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @else
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endif
            @endforeach
        </select>
        <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" required class="form-control" id="estado"  name="estado"
        value="Atendido" >
        </div>
        <div class="mb-3">
        <label for="fecha" class="form-label">Fecha pqrs</label>
        <input type="date" required class="form-control" id="fecha"  name="fecha"
        value="{{ $pqrs->fecha }}">
        </div>
        <div class="mb-3">
        <label for="observacion" class="form-label">Observación</label>
        <input type="text" required class="form-control" id="observacion"  name="observacion"
        value="{{ $pqrs->observacion }}" >
        </div>
        <div class="mb-3">
        <label for="solucion" class="form-label">Solución</label>
        <input type="text" class="form-control" id="solucion"  name="solucion"
        value="{{ $pqrs->solucion }}">
        </div>

        <div class="mt-3">
        <button type="submit" class="btn btn-primary">Solucionar</button>
        <a href="{{ route('PQRSs.index') }}" class="btn btn-warning">Cancelar</a>
        </div>
</form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
</x-app-layout>
