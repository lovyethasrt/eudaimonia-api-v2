<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index()
    {
        $types = ProductType::all();
        return response()->successWithData($types);
    }

    public function destroy(ProductType $id)
    {
        $id->delete();
        return response()->success('Product Type deleted.');
    }
}
