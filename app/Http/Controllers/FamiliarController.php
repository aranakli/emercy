<?php

namespace App\Http\Controllers;

use App\Models\Familiar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FamiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $familiares = DB::table('familiares')
            ->join('clientes', 'familiares.cliente_id', '=', 'clientes.id')
            ->join('obituarios', 'obituarios.obituario_id', '=', 'obituarios.id')
            ->select('familiares.*', 'clientes.nombre_cliente', 'obituarios.nombre_obituario')
            ->get();
        return view('familiar.index', ['familiares' => $familiares]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = DB::table('clientes')
            ->orderBy('nombre_cliente')
            ->get();
        $obituarios = DB::table('obituarios')
            ->orderBy('nombre_obituario')
            ->get();
        return view('familiar.new', ['clientes' => $clientes, 'obituarios' => $obituarios]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $familiar = new Familiar();
        $familiar->cliente_id = $request->cliente_id;
        $familiar->obituario_id = $request->obituario_id;
        $familiar->nombre_familiar = $request->nombre;
        $familiar->telefono_familiar = $request->telefono;
        $familiar->parentesco_familiar = $request->parentesco;
        $familiar->email_familiar = $request->email;
        $familiar->autoriza_familiar = $request->autoriza;
        $familiar->estado_familiar = $request->estado;
        $familiar->save();
        $familiares = DB::table('familiares')
            ->join('clientes', 'familiars.cliente_id', '=', 'clientes.id')
            ->join('obituarios', 'obituarios.obituario_id', '=', 'obituarios.id')
            ->select('familiars.*', 'clientes.nombre_cliente', 'obituarios.nombre_obituario')
            ->get();

        return view('familiar.index', ['familiares' => $familiares]);
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
        $familiar = Familiar::find($id);
        $clientes = DB::table('clientes')
            ->orderBy('nombre_cliente')
            ->get();
        $obituarios = DB::table('obituarios')
            ->orderBy('nombre_obituario')
            ->get();
        return view('familiar.edit', ['familiar' => $familiar, 'clientes' => $clientes, 'obituarios' => $obituarios ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $familiar = Familiar::find($id);
        $familiar->cliente_id = $request->cliente_id;
        $familiar->obituario_id = $request->obituario_id;
        $familiar->nombre_familiar = $request->nombre;
        $familiar->telefono_familiar = $request->telefono;
        $familiar->parentesco_familiar = $request->parentesco;
        $familiar->email_familiar = $request->email;
        $familiar->autoriza_familiar = $request->autoriza;
        $familiar->estado_familiar = $request->estado;
        $familiar->save();

        $familiares = DB::table('familiares')
            ->join('clientes', 'familiars.cliente_id', '=', 'clientes.id')
            ->join('obituarios', 'obituarios.obituario_id', '=', 'obituarios.id')
            ->select('familiars.*', 'clientes.nombre_cliente', 'obituarios.nombre_obituario')
            ->get();

        return view('familiar.index', ['familiares' => $familiares]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
