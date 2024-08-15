<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{

    protected $product_type;

    public function __construct(ProductType $product_type)
    {
        $this->product_type = $product_type;
    }

    public function index()
    {
        $this->authorize('product_type');

        return view('pages.admin.product_types.home');
    }

    //hanlde return view with product type data
    public function create()
    {
        return view('pages.admin.product_types.add_product_type');
    }

    //hanlde add product type
    public function store(Request $req)
    {
        $productType = $this->product_type->insert([
            'name' => $req->input('name')
        ]);
        //if failed
        if (!$productType) {
            return redirect()->route('admin.product-type.home')->with('message', 'Upload failed!, please try again.');
        }
        //if success
        return redirect()->route('admin.product-type.home')->with('message', 'Upload product type successfully.');
    }

    //edit product type
    public function edit(ProductType $product_type)
    {
        return view('pages.admin.product_types.edit_product_type', compact('product_type'));
    }

    public function update(Request $req, ProductType $product_type)
    {
        $product_type->name = $req->name;
        $product_type->save();

        return redirect()->route('admin.product-type.home')->with('message', 'update property type successfully');
    }

    //handle delete property type by id
    public function destroy(ProductType $product_type)
    {
        //if not found product type
        if (!$product_type) {
            return redirect()->route('admin.product-type.home')->with([
                'meseage' => 'Delete Failed.',
                'success' => false,
            ]);
        }
        //if found delete it
        $product_type->delete();
        return redirect()->route('admin.product-type.home')->with([
            'meseage' => 'Delete Successfully.',
            'success' => true,
        ]);
    }

    //section api
    public function getAllProductTypes()
    {
        return response()->json([
            'data' => $this->product_type->get(),
            'message' => 'Get Product Types success',
        ], 200);
    }

    public function createProductType(Request $req)
    {
        $productType = $this->product_type->insert(
            ['name' => $req->name]
        );
        if (!$productType) {
            return response()->json(['data' => null, 'message' => 'Create product type failed'], 200);
        }
        return response()->json([
            'data' => null,
            'message' => 'Create product type success'
        ], 200);
    }

    public function getOneProductType(ProductType $product_type)
    {
        return response()->json([
            'data' => $product_type,
            'message' => 'Get one product type success'
        ], 200);
    }
    public function editProductType(Request $req, ProductType $product_type)
    {
        $product_type->name = $req->product_type;
        return response()->json([
            'data' => null,
            'message' => 'Edit product type success',
        ], 200);
    }

    public function deleteProductType(ProductType $product_type)
    {
        $product_type->delete();
        return response()->json([
            'data' => null,
            'message' => 'Delete product type success'
        ], 200);
    }
    //end section api
}
