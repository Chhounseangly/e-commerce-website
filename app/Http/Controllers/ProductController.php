<?php

namespace App\Http\Controllers;

use App\Product;
use Exception;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
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
        $products = $this->product->get();
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
    public function destroy($id)
    {
        $product = $this->product->findorFail($id);
        //if own product can delete
        $this->authorize('product-delete', $product);

        try {
            $product->delete();
            return redirect()->route('admin.page')->with("message", "Delete Product Successfully");
        } catch (Exception $e) {
            return redirect()->route('admin.page')->with("message", $e->getMessage());
        }
    }

    public function edit($id)
    {
        $product = $this->product->findorFail($id);

        return view('pages.admin.products.edit_product', compact('product'));
    }

    //handle update product
    public function update(Request $req, $id)
    {
        DB::table('products')->where('id', $id)->update([
            'name' => $req->name,
            'price' => $req->price,
            'product_type_id' => $req->product_type_id,
        ]);
        return redirect()->route('admin.page')->with('message', 'Update product successfully');
    }
}
