<?php

namespace App\Http\Controllers;

use App\Models\Visitante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visitantes = DB::table('visitantes')
        ->join('clientes', 'visitantes.cliente_id', '=', 'clientes.id')
        ->select('visitantes.*', 'clientes.nombre_cliente')
        ->get();
    return view('visitante.index', ['visitantes' => $visitantes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = DB::table('clientes')
            ->orderBy('nombre_cliente')
            ->get();
        return view('visitante.new', ['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $visitante = new Visitante();
        $visitante->cliente_id = $request->cliente_id;
        $visitante->nombre_visitante = $request->nombre_visitante;
        $visitante->email_visitante = $request->email;
        $visitante->telefono_visitante = $request->telefono;
        if ($request->tel_confirma == 'on') {
            $visitante->tel_confirma_visitante = 1;
        } else {
            $visitante->tel_confirma_visitante = 0;
        }
        if ($request->estado == 'on') {
            $visitante->estado_visitante = 1;
        } else {
            $visitante->estado_visitante = 0;
        }
        $visitante->save();
        $visitantes = DB::table('visitantes')
            ->join('clientes', 'visitantes.cliente_id', '=', 'clientes.id')
            ->select('visitantes.*', 'clientes.nombre_cliente')
            ->get();
        return view('visitante.index', ['visitantes' => $visitantes]);
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
        $visitante = Visitante::find($id);
        $clientes = DB::table('clientes')
            ->orderBy('nombre_cliente')
            ->get();
        return view('visitante.edit', ['visitante' => $visitante, 'clientes' => $clientes]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $visitante = Visitante::find($id);
        $visitante->cliente_id = $request->cliente_id;
        $visitante->nombre_visitante = $request->nombre_visitante;
        $visitante->email_visitante = $request->email;
        $visitante->telefono_visitante = $request->telefono;
        if ($request->tel_confirma == 'on') {
            $visitante->tel_confirma_visitante = 1;
        } else {
            $visitante->tel_confirma_visitante = 0;
        }
        if ($request->estado == 'on') {
            $visitante->estado_visitante = 1;
        } else {
            $visitante->estado_visitante = 0;
        }
        $visitante->save();
        $visitantes = DB::table('visitantes')
            ->join('clientes', 'visitantes.cliente_id', '=', 'clientes.id')
            ->select('visitantes.*', 'clientes.nombre_cliente')
            ->get();
        return view('visitante.index', ['visitantes' => $visitantes]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
