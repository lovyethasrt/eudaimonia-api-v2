<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

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
            'image' => url('images/products/'.$product->image),
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
            'price' => (double) $product->price,
            'image' => url('images/products/'.$product->image),
            'created_at' => $product->created_at->toDateTimeString(),
            'updated_at' => $product->created_at->toDateTimeString(),
            'type' => $product->type,
        ];

        return response()->successWithData($data);
    }

    public function create(Request $request)
    {
        try {
            $validated =  $request->validate([
                'type' => ['required', 'exists:product_types,id'],
                'title' => ['required', 'string', 'max:255', 'min:4',  'unique:products,title'],
                'description' => ['required'],
                'price' => ['required', 'numeric'],
                'image' => ['required', File::image()->max('2mb')]
            ]);
        } catch (ValidationException $e) {
            return response()->invalidEntity($e->errors());
        }

        // Store image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName =   now()->timestamp . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $directory = public_path('images/products/');
            $image->move($directory, $fileName);
        }

        $product =  Product::create([
            'title' => $validated['title'],
            'product_type_id' => $validated['type'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'image' => $fileName
        ]);
        $data = [
            'id' => $product->id,
            'type' => $product->type->title,
            'description' => $product->description,
            'price' => $product->price,
            'image' => url('images/products/'.$product->image),
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at
        ];
        return response()->createdWithData($data, 'Product created.');
    }

    public function update(Request $request, Product $product)
    {
        try {
            $validated =  $request->validate([
                'type' => ['required', 'exists:product_types,id'],
                'title' => ['required', 'string', 'max:255', 'min:4',  'unique:products,title,' . $product->id],
                'description' => ['required'],
                'price' => ['required', 'numeric'],
                'image' => ['nullable', File::image()->max('2mb')]
            ]);
        } catch (ValidationException $e) {
            return response()->invalidEntity($e->errors());
        }

        // Update image
        if ($request->hasFile('image')) {
            if (file_exists(public_path('images/products/'.$product->image))) {
                unlink(public_path('images/products/'.$product->image));
            }
            
            $image = $request->file('image');
            $fileName = now()->timestamp . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images/products');
            $image->move($destinationPath, $fileName);
            $product->image =  $fileName;
        }                                           


        $product->product_type_id = $validated['type'];
        $product->title =  $validated['title'];
        $product->description =  $validated['description'];
        $product->price =  $validated['price'];
        $product->save();
        $data = [
            'id' => $product->id,
            'type' => $product->type->title,
            'description' => $product->description,
            'price' => $product->price,
            'image' => url('images/prouducts/'.$product->image),
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at
        ];
        return response()->successWithData($data, 'Success update product.');
    }

    public function destroy(Product $product)
    {
        
        // Update image
        if ($product->image) {
            if (file_exists(public_path('images/products/'.$product->image))) {
                unlink(public_path('images/products/'.$product->image));
            }
            
        }

        $product->delete();
        return response()->success('Success delete product.');
    }
}
