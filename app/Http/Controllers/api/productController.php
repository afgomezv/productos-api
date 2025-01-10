<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    public function index()
    {
        $products=Product::all();

        // if($products->isEmpty()){
        //     $data = [
        //         "message" => "There are no products",
        //         "error" => true,
        //     ];

        //     return response()->json($data, 200);
        // }

        $data = [
            "status" => 200,
            "products" => $products,
        ];

        
        return response()->json($data, 200);

    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' =>'required|string',
        //     'price' =>'required|numeric',
        //     'stock' =>'required|numeric',
        // ]);

        // $product = Product::create($request->all());

        // $data = [
        //     "status" => 201,
        //     "product" => $product,
        // ];

        // return response()->json($data, 201);

        $validator = Validator::make($request->all(), [
            'name' =>'required|string',
            'price' =>'required|numeric',
            'stock' =>'required|numeric',
        ]);

        if ($validator->fails()) {
            $data = [
                "message" => "Error",
                "errors" => $validator->errors(),
                "status" => 400
            ];
        };

        $product = Product::create($request->all([
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock,
        ]));

        if(!$product){

            $data = [
                "message" => "Error creating product",
                "status" => 500
            ];
            return response()->json($data, 500);
        };

        $data = [
            "status" => 201,
            "product" => $product,
        ];
        return response()->json($data, 201);
    }
}
