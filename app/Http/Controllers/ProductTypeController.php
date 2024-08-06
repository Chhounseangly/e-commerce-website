<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductTypeController extends Controller
{

    //hanlde return view with product type data
    public function create()
    {
        $product_type = ProductType::get();

        return view('add_product_type', ['data' => $product_type]);
    }

    //hanlde add product type
    public function store(Request $req)
    {
        $productType = DB::table('product_types')->insert([
            'name' => $req->name_property_type
        ]);
        //if failed
        if (!$productType) {
            return redirect()->route('create')->with('message', 'Upload failed!, please try again.');
        }
        //if success
        return redirect()->route('create')->with('message', 'Upload product type successfully.');
    }

    //query proprety types
    public function index()
    {
        $propertyTypes = ProductType::get();
        return response()->json([
            'data' => $propertyTypes,
            'message' => "Query Success"
        ], 200);
    }
    //edit product type
    public function edit($id)
    {
        $product_type = ProductType::find($id);
        return view('edit_product_type',  [
            'product_type' => $product_type
        ]);
    }

    public function update(Request $req, $id)
    {
        $product_type = ProductType::find($id);
        $product_type->name = $req->name;
        $product_type->save();

        return redirect()->route('create')->with('message', 'update property type successfully');
    }

    //handle delete property type by id
    public function destroy($id)
    {
        $product_type = ProductType::findorFail($id);
        //if not found product type
        if (!$product_type) {
            return redirect()->route('create')->with([
                'meseage' => 'Delete Failed.',
                'success' => false,
            ]);
        }
        //if found delete it
        $product_type->delete();
        return redirect()->route('create')->with([
            'meseage' => 'Delete Successfully.',
            'success' => true,
        ]);
    }
}
