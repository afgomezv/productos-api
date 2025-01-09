<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {
        $productos = Product::all(); 
        //$productos = Producto::orderBy("id", "desc")->paginate();
        return response()->json($productos);
    }

    public function create(Request $request)
    {
        $request -> validate([
            'nombre' => 'required',
            'precio' => 'required',
            'stock' => 'required',
        ]);

        $producto = Product::create($request->all());
        return response()->json($producto);
    }

    public function show($id)
    {
        $producto = Product::find($id);
        return response()->json($producto);
    }

    public function update(Request $request, $id)
    {
        $request -> validate([
            'nombre' => 'required|string',
            'precio' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $producto = Product::find($id);
        $producto->update($request->all());
        return response()->json($producto);
    }

    public function destroy($id)
    {
        $producto = Product::find($id);
        $producto->delete();
        return response()->json(null, 204);
    }
}
