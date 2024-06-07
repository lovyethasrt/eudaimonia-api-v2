<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $selectedColumn =  [
            'products.id',
            'products.title',
            'products.description',
            'products.image',
            'products.price',
            'products.created_at',
            'products.updated_at',
            'type.title as type'
        ];
        $products =  Product::query()->select($selectedColumn)
            ->join('product_types as type', 'products.product_type_id', '=', 'type.id')
            ->get();

        $data =  $products->map(fn ($product) => [
            'id' => $product->id,
            'type' => $product->type,
            'title' => $product->title,
            'description' => $product->description,
            'price' => $product->price,
            'image' => $product->image,
            'created_at' => $product->created_at->toDateTimeString(),
            'updated_at' => $product->created_at->toDateTimeString()
        ]);

        return response()->successWithData($data);
    }

    public function show(Product $product)
    {
        $data = [
            'id' => $product->id,
            'title' => $product->title,
            'description' => $product->description,
            'price' => $product->price,
            'image' => $product->image,
            'created_at' => $product->created_at->toDateTimeString(),
            'updated_at' => $product->created_at->toDateTimeString(),
            'type' => $product->type,
        ];

        return response()->successWithData($data);
    }

    public function update(Request $request)
    {
        
    }
}
