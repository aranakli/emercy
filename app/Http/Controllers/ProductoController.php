<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = DB::table('productos')
            ->join('clientes', 'productos.cliente_id', '=', 'clientes.id')
            ->select('productos.*' , 'clientes.nombre_cliente')
            ->get();
        return view('producto.index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = DB::table('clientes')
            ->orderBy('nombre_cliente')
            ->get();
        return view('producto.new', ['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->cliente_id = $request->cliente_id;
        $producto->nombre_producto = $request->nombre;
        $producto->descripcion_producto = $request->descripcion;
        $producto->precio_producto = $request->precio;
        $producto->stock_producto = $request->stock;
        if ($request->estado == 'on') {
            $producto->estado_producto = 1;
        } else {
            $producto->estado_producto = 0;
        }
        $producto->save();
        $productos = DB::table('productos')
            ->join('clientes', 'productos.cliente_id', '=', 'clientes.id')
            ->select('productos.*', 'clientes.nombre_cliente')
            ->get();
        return view('producto.index', ['productos' => $productos]);
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
        $producto = Producto::find($id);
        $clientes = DB::table('clientes')
            ->orderBy('nombre_cliente')
            ->get();
        return view('producto.edit', ['producto' => $producto, 'clientes' => $clientes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = Producto::find($id);
        $producto->cliente_id = $request->cliente_id;
        $producto->nombre_producto = $request->nombre;
        $producto->descripcion_producto = $request->descripcion;
        $producto->precio_producto = $request->precio;
        $producto->stock_producto = $request->stock;
        if ($request->estado == 'on') {
            $producto->estado_producto = 1;
        } else {
            $producto->estado_producto = 0;
        }
        $producto->save();
        $productos = DB::table('productos')
            ->join('clientes', 'productos.cliente_id', '=', 'clientes.id')
            ->select('productos.*', 'clientes.nombre_cliente')
            ->get();
        return view('producto.index', ['productos' => $productos]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
