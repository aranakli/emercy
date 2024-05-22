<?php

namespace App\Http\Controllers;

use App\Models\Obituario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObituarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obituarios = DB::table('obituarios')
            ->join('clientes', 'obituarios.cliente_id', '=', 'clientes.id')
            ->select('obituarios.*', 'clientes.nombre_cliente')
            ->get();
        return view('obituario.index', ['obituarios' => $obituarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = DB::table('clientes')
            ->orderBy('nombre_cliente')
            ->get();
        return view('obituario.new', ['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obituario = new Obituario();
        $obituario->cliente_id = $request->cliente_id;
        $obituario->nombre_obituario = $request->nombre;
        $obituario->apellido_obituario = $request->apellido;
        $obituario->fecha_nacimiento_obituario = $request->fecha_nacimiento;
        $obituario->fecha_muerte_obituario = $request->fecha_muerte;
        $obituario->fecha_exequias_obituario = $request->fecha_exequias;
        $obituario->lugar_exequias_obituario = $request->lugar_exequias;
        $obituario->sala_id = 1;
        $obituario->save();
        $obituarios = DB::table('obituarios')
            ->join('clientes', 'obituarios.cliente_id', '=', 'clientes.id')
            ->select('obituarios.*', 'clientes.nombre_cliente')
            ->get();
        return view('obituario.index', ['obituarios' => $obituarios]);
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
        $obituario = Obituario::find($id);
        $clientes = DB::table('clientes')
            ->orderBy('nombre_cliente')
            ->get();
        return view('obituario.edit', ['obituario' => $obituario, 'clientes' => $clientes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obituario = Obituario::find($id);
        $obituario->cliente_id = $request->cliente_id;
        $obituario->nombre_obituario = $request->nombre;
        $obituario->apellido_obituario = $request->apellido;
        $obituario->fecha_nacimiento_obituario = $request->fecha_nacimiento;
        $obituario->fecha_muerte_obituario = $request->fecha_muerte;
        $obituario->fecha_exequias_obituario = $request->fecha_exequias;
        $obituario->lugar_exequias_obituario = $request->lugar_exequias;
        $obituario->sala_id = 1;
        $obituario->save();

        $obituarios = DB::table('obituarios')
            ->join('clientes', 'obituarios.cliente_id', '=', 'clientes.id')
            ->select('obituarios.*', 'clientes.nombre_cliente')
            ->get();
        return view('obituario.index', ['obituarios' => $obituarios]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
