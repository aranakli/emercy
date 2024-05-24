<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = DB::table('ventas')
        ->join('clientes', 'ventas.cliente_id', '=', 'clientes.id')
        ->join('productos', 'ventas.producto_id', '=', 'productos.id')
        ->select('ventas.*', 'clientes.nombre_cliente', 'productos.nombre_producto')
        ->get();
    return view('venta.index', ['ventas' => $ventas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $venta = Venta::find($id);
        $clientes = DB::table('clientes')
            ->orderBy('nombre_cliente')
            ->get();
        $productos = DB::table('productos')
            ->orderBy('nombre_producto')
            ->get();
        return view('venta.edit', ['venta' => $venta, 'clientes' => $clientes, 'productos' => $productos ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $venta = Venta::find($id);
        if ($request->estado == 'on') {
            $venta->estado_venta = 1;
        } else {
            $venta->estado_venta = 0;
        }
        $venta->save();

        $ventas = DB::table('ventas')
            ->join('clientes', 'ventas.cliente_id', '=', 'clientes.id')
            ->join('productos', 'ventas.producto_id', '=', 'productos.id')
            ->select('ventas.*', 'clientes.nombre_cliente', 'productos.nombre_producto')
            ->get();

        return view('venta.index', ['ventas' => $ventas]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
