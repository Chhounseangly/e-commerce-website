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

    //hanlde return view with product type data
    public function create()
    {
        $product_types = $this->product_type->get();
        return view('pages.product_types.add_product_type', compact('product_types'));
    }

    //hanlde add product type
    public function store(Request $req)
    {
        $productType = $this->product_type->insert([
            'name' => $req->input('name')
        ]);
        //if failed
        if (!$productType) {
            return redirect()->route('add_product_types')->with('message', 'Upload failed!, please try again.');
        }
        //if success
        return redirect()->route('add_product_types')->with('message', 'Upload product type successfully.');
    }

    //edit product type
    public function edit($id)
    {
        $product_type = $this->product_type->find($id);
        return view('pages.product_types.edit_product_type', compact('product_type'));
    }

    public function update(Request $req, $id)
    {
        $product_type = $this->product_type::find($id);
        $product_type->name = $req->name;
        $product_type->save();

        return redirect()->route('add_product_types')->with('message', 'update property type successfully');
    }

    //handle delete property type by id
    public function destroy($id)
    {
        $product_type = $this->product_type::findorFail($id);
        //if not found product type
        if (!$product_type) {
            return redirect()->route('add_product_types')->with([
                'meseage' => 'Delete Failed.',
                'success' => false,
            ]);
        }
        //if found delete it
        $product_type->delete();
        return redirect()->route('add_product_types')->with([
            'meseage' => 'Delete Successfully.',
            'success' => true,
        ]);
    }
}
