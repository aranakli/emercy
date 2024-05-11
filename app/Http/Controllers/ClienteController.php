<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = DB::table('clientes')
        ->select('clientes.*')
        ->get();
    return view('cliente.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        // $cliente->comu_codi = $request->id;
        // El código de cliente es auto incremental
        // nombre	apellido	telefono	email	contrasena
        $cliente->nombre_cliente = $request->nombre;
        $cliente->nit_cliente = $request->nit;
        $cliente->direccion_cliente = $request->direccion;
        $cliente->telefono_cliente = $request->telefono;
        $cliente->email_cliente = $request->email;
        if ($request->estado == 'on') {
            $cliente->estado_cliente = 1;
        } else {
            $cliente->estado_cliente = 0;
        }
        $cliente->save();

        $clientes = DB::table('clientes')
            ->select('clientes.*')
            ->get();
        return view('cliente.index', ['clientes' => $clientes]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::find($id);
        return view('cliente.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Cliente::find($id);
        $cliente->nombre_cliente = $request->nombre;
        $cliente->nit_cliente = $request->nit;
        $cliente->direccion_cliente = $request->direccion;
        $cliente->telefono_cliente = $request->telefono;
        $cliente->email_cliente = $request->email;
        if ($request->estado == 'on') {
            $cliente->estado_cliente = 1;
        } else {
            $cliente->estado_cliente = 0;
        }
        $cliente->save();
        $clientes = DB::table('clientes')
            ->select('clientes.*')
            ->get();
        return view('cliente.index', ['clientes' => $clientes]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $cliente = Cliente::find($id);
            $cliente->delete();

            $clientes = DB::table('clientes')
                ->select('clientes.*')
                ->get();
            return view('cliente.index', ['clientes' => $clientes]);
        } catch (\Exception $e) {
            if ($e->getCode() === '23000') {
                // Este código de error específico indica una violación de integridad referencial
                $clientes = DB::table('clientes')
                    ->select('clientes.*')
                    ->get();
                return view('cliente.index', ['clientes' => $clientes, 'error' => 'No se puede eliminar el cliente ya que se está usando en otra tabla.']);
            } else {
                // Otros errores de la base de datos
                $clientes = DB::table('clientes')
                    ->select('clientes.*')
                    ->get();
                return view('cliente.index', ['clientes' => $clientes, 'error' => 'Error en la base de datos: ' . $e->getMessage()]);
            }
        }
    }
}
