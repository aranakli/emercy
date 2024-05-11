<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salas = DB::table('salas')
            ->join('clientes', 'salas.cliente_id', '=', 'clientes.id')
            ->select('salas.*' , 'clientes.nombre_cliente')
            ->get();
        return view('sala.index', ['salas' => $salas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = DB::table('clientes')
            ->orderBy('nombre_cliente')
            ->get();
        return view('sala.new', ['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sala = new Sala();
        $sala->cliente_id = $request->cliente_id;
        $sala->nombre_sala = $request->nombre;
        if ($request->streaming == 'on') {
            $sala->streaming_sala = 1;
        } else {
            $sala->streaming_sala = 0;
        }
        $sala->save();
        $salas = DB::table('salas')
            ->join('clientes', 'salas.cliente_id', '=', 'clientes.id')
            ->select('salas.*', 'salas.cliente_id')
            ->get();
        return view('sala.index', ['salas' => $salas]);
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
        $sala = Sala::find($id);
        $clientes = DB::table('clientes')
            ->orderBy('nombre_cliente')
            ->get();
        return view('sala.edit', ['sala' => $sala, 'clientes' => $clientes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sala = Sala::find($id);
        $sala->comu_nomb = $request->name;
        $sala->muni_codi = $request->code;
        $sala->save();

        $salas = DB::table('salas')
            ->join('clientes', 'salas.cliente_id', '=', 'clientes.id')
            ->select('salas.*', 'clientes.nombre_cliente')
            ->get();
        return view('sala.index', ['salas' => $salas]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sala = Sala::find($id);
        $sala->delete();
        $salas = DB::table('salas')
            ->join('clientes', 'salas.cliente_id', '=', 'clientes.id')
            ->select('salas.*', 'clientes.nombre_cliente')
            ->get();

            return view('sala.index', ['salas' => $salas]);
    }
}
