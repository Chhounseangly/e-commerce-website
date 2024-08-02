<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductTypeController extends Controller
{
    public function store(Request $req)
    {
        $propertyType = DB::table('product_types')->insert([
            'name' => $req->name
        ]);
        if (!$propertyType) {
            return response()->json([
                'message' => "Add Product Types Failed"
            ], 200);
        }

        return response()->json([
            'message' => "Add Product Types Successfully"
        ], 200);
    }

    public function index() {
        $propertyTypes = ProductType::get();
        return response()->json([
            'data' => $propertyTypes,
            'message' => "Query Success"
        ], 200);
    }
}
