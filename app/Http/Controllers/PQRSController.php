<?php

namespace App\Http\Controllers;

use App\Models\PQRS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PQRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pqrss = DB::table('pqrss')
            ->join('clientes', 'pqrss.cliente_id', '=', 'clientes.id')
            ->select('pqrss.*', 'clientes.nombre_cliente')
            ->get();
        return view('pqrs.index', ['pqrss'=>$pqrss]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = DB::table('clientes')
        ->orderBy('nombre_cliente')
        ->get();

        $clientes = DB::table('visitantes')
        ->orderBy('nombre_visitante')
        ->get();
        return view('pqrs.new', ['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pqrs = new Pqrs();
        //$pqrs->id = strtoupper($request->id);
        $pqrs->cliente_id = $request->nombre;
        $pqrs->tipo_pqrs = $request->tipo;
        $pqrs->visitante_id = $request->visitante;
        $pqrs->descripcion_pqrs = $request->descripcion;
        $pqrs->respuesta_pqrs = $request->respuesta;
        $pqrs->estado_pqrs = $request->estado;

        $pqrs->save();

        $pqrss = DB::table('pqrss')
            ->join('clientes', 'pqrss.cliente_id', '=', 'clientes.id')
            ->join('visitantes', 'pqrss.visitante_id', '=', 'visitantes.id')
            ->select('pqrss.*', 'clientes.nombre_cliente', 'visitantes.nombre_visitante')
            ->get();
        return view('pqrs.index', ['pqrss'=>$pqrss]);
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
        $pqrs= Pqrs::find($id);
        $clientes = DB::table('clientes')
        ->orderBy('nombre_cliente')
        ->get();

        $visitantes = DB::table('visitantes')
        ->orderBy('nombre_visitante')
        ->get();

        return view('pqrs.edit', ['pqrs' => $pqrs, 'clientes' => $clientes, 'visitantes' => $visitantes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pqrs= Pqrs::find($id);
        $pqrs->cliente_id = $request->nombre;
        $pqrs->tipo_pqrs = $request->tipo;
        $pqrs->visitante_id = $request->visitante;
        $pqrs->descripcion_pqrs = $request->descripcion;
        $pqrs->respuesta_pqrs = $request->respuesta;
        $pqrs->estado_pqrs = $request->estado;
        $pqrs->save();
        $pqrss = DB::table('pqrss')
            ->join('clientes', 'pqrss.id_cliente', '=', 'clientes.id')
            ->join('visitantes', 'pqrss.visitante_id', '=', 'visitantes.id')
            ->select('pqrss.*', 'clientes.nombre_cliente', 'visitantes.nombre_visitante')
            ->get();
        return view('pqrs.index', ['pqrss' => $pqrss]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pqrs= Pqrs::find($id);
        $pqrs->delete();

        $pqrss = DB::table('pqrss')
            ->join('clientes', 'pqrss.id_cliente', '=', 'clientes.id')
            ->join('visitantes', 'pqrss.visitante_id', '=', 'visitantes.id')
            ->select('pqrss.*', 'clientes.nombre_cliente', 'visitantes.nombre_visitante')
            ->get();
        return view('pqrs.index', ['pqrss' => $pqrss]);
    }
}
