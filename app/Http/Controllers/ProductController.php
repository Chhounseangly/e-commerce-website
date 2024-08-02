<?php

namespace App\Http\Controllers;

use App\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //handle post data as RestAPI
    public function addProductByApi(Request $req)
    {
        //insert product data
        $product = DB::table('products')
            ->insert([
                'product_type_id' => $req->product_type_id,
                'name' => $req->name,
                'price' => $req->price
            ]);
        if (!$product) {
            return response()->json([
                'message' => 'Add Product Failed.',
                'data' => $product,
            ]);
        }
        return response()->json([
            'message' => 'Add Product Success.',
            'data' => true,
        ]);
    }

    //handle Query Products 
    public function index()
    {
        $products = Product::get();
        return view('welcome', ['products' => $products]);
    }

    //handle AddProduct
    public function addProduct(Request $req)
    {
        $product = new Product();
        $product->name = $req['name'];
        $product->price = $req['price'];
        $product->save();

        return view('welcome', [
            'message' => 'Congrate you are add product successfully.',
        ]);
    }

    //handle delete product
    public function deleteProduct($id)
    {
        $product = Product::findorFail($id);
        try {
            $product->delete();
            return view('welcome', [
                "message" => "Delete Product Successfully"
            ]);
        } catch (Exception $e) {
            return view('welcome', [
                'message' => $e->getMessage(),
            ]);
        }
    }

    //handle update product
    public function updateProduct(Request $req, $id)
    {
        $product = Product::findorFail($id);
        try {
            $product->name = $req['name'];
            $product->price = $req['price'];
            $product->save();
            return view('welcome', [
                'message' => 'Update Product Successfully.'
            ]);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
