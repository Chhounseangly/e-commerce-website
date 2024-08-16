<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Exception;
use Illuminate\Http\Request;
use Cloudder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $product;
    /**
     * Create a new controller instance.
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    //handle Query Products 
    public function index()
    {
        $products = $this->product->where('user_id', auth()->user()->id)->get();
        return view('pages.admin.home', compact('products'));
    }

    public function create()
    {
        return view('pages.admin.products.add_product');
    }
    //handle post data as RestAPI
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => '',
            'name' => 'required|string',
            'price' => 'required|string',
            'product_type_id' => 'required|string'
        ]);
        // Check if the image file is present and encode it to base64
        $imageData = null;
        if ($request->hasFile('image')) {
            $imageData = base64_encode(file_get_contents($request->file('image')->path()));
        }
        $validatedData['image'] = $imageData;

        $product = $this->product->insert($validatedData);
        if (!$product) {
            return redirect()->route('admin.page')->with(['message' => 'Product added failed']);
        }
        return redirect()->route('admin.page')->with(['message' => 'Product added successfully']);
    }

    public function getProductByApi($id)
    {
        $product = $this->product->findorFail($id);
        return response()->json($product);
    }

    //handle delete product
    public function destroy(Product $product)
    {
        //if own product can delete
        $this->authorize('product-delete', $product);

        try {
            $product->delete();
            return redirect()->route('admin.page')->with("message", "Delete Product Successfully");
        } catch (Exception $e) {
            return redirect()->route('admin.page')->with("message", $e->getMessage());
        }
    }

    public function edit(Product $product)
    {
        return view('pages.admin.products.edit_product', compact('product'));
    }

    //handle update product
    public function update(Request $req, Product $product)
    {
        $product->name = $req->name;
        $product->price = $req->price;
        $product->product_type_id = $req->product_type_id;
        return redirect()->route('admin.page')->with('message', 'Update product successfully');
    }

    //section Api
    public function getAllProducts()
    {
        return response()->json([
            'data' => $this->product->where('user_id', 2)->with('productType:id,name')->get(),
            'message' => 'Get products success.'
        ], 200);
    }
    public function getDetailProduct(Product $product)
    {
        return response()->json([
            'data' => $product,
            'message' => 'Get product success.'
        ], 200);
    }
    public function createProduct(Request $req)
    {
        $this->product->insert([
            'name' => $req->name,
            'user_id' => 2,
            'price' => $req->price,
            'product_type_id' => $req->product_type_id,
            'image' => $req->has('image') ? base64_encode(file_get_contents($req->file('image')->path())) : '',
        ]);
        return response()->json([
            'data' => null,
            'message' => 'The Product added success.'
        ], 200);
    }
    public function editProduct(Request $req, Product $product)
    {
        // Update the product's properties
        if ($product->name) {
            $product->name = $req->name;
        }
        if ($product->price) {
            $product->price = $req->price;
        }
        if ($req->has('image')) {
            $product->image = base64_encode(file_get_contents($req->file('image')->path()));
        }
        // Save the updated product to the database
        $product->save();


        return response()->json(['data' => null, 'message' => 'The Product edited success'], 200);
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        return response()->json(['data' => null, 'message' => 'The Product delete success'], 200);
    }

    public function getProductByCategory(ProductType $productType)
    {
        $products = $productType->with('products')->find($productType->id);
        return response()->json([
            'data' => $products,
            'message' => "Get product success",
        ], 200);
    }
    //end section api
}
