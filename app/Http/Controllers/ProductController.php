<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $product_types;

    /**
     * Create a new controller instance.
     */
    public function __construct(Product $product, ProductType $product_types)
    {
        $this->product = $product;
        $this->product_types = $product_types->get();
    }

    //handle Query Products 
    public function index()
    {
        $products = $this->product->get();
        return view('index', compact('products'));
    }

    public function create()
    {
        $product_types = $this->product_types;
        return view('pages.products.add_product', compact('product_types'));
    }
    //handle post data as RestAPI
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|string',
            'product_type_id' => 'required|string'
        ]);
        $product = $this->product->insert($data);
        if (!$product) {
            return redirect()->route('index')->with(['message' => 'Product added failed']);
        }
        return redirect()->route('index')->with(['message' => 'Product added successfully']);
    }

    public function edit($id)
    {
        $product = $this->product->findorFail($id);
        $product_types = $this->product_types;

        return view('pages.products.edit_product', compact('product'), compact('product_types'));
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
        $this->product->where('id', $id)->update([
            'name' => $req->name,
            'price' => $req->price,
            'product_type_id' => $req->product_type_id,
        ]);
        return redirect()->route('index')->with('message', 'Update product successfully');
    }
}
