<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //handle Query Products 
    public function index()
    {
        $products = Product::get();
        return view('index', ['products' => $products]);
    }

    public function create()
    {
        $product_types = ProductType::get();
        return view('pages.products.add_product', ['product_types' => $product_types]);
    }
    //handle post data as RestAPI
    public function store(Request $req)
    {
        $product = DB::table('products')->insert([
            'name' => $req->name_product,
            'price' => $req->price,
            'product_type_id' => $req->product_type_id
        ]);
        if (!$product) {
            return redirect()->route('index')->with(['message' => 'Product added failed']);
        }
        return redirect()->route('index')->with(['message' => 'Product added successfully']);
    }

    public function edit($id)
    {
        $product = Product::findorFail($id);
        $product_types = ProductType::get();

        return view('pages.products.edit_product',  [
            'product' => $product,
            'product_types' => $product_types
        ]);
    }


    //handle delete product
    public function destroy($id)
    {
        $product = Product::findorFail($id);
        try {
            $product->delete();
            return redirect()->route('index')->with("message", "Delete Product Successfully");
        } catch (Exception $e) {
            return redirect()->route('index')->with("message", $e->getMessage());
        }
    }

    //handle update product
    public function update(Request $req, $id)
    {
        DB::table('products')->where('id', $id)->update([
            'name' => $req->name,
            'price' => $req->price,
            'product_type_id' => $req->product_type_id,
        ]);

        return redirect()->route('index')->with('message', 'Update product successfully');
    }
}
