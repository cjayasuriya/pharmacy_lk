<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show product create
     */
    public function showCreate(Request $request) {

        $pageData = array(
            'title' => "Add product",
            'titlePage' => "Add product",
        );

        return view('products.create', compact('pageData'));

    }


    /**
     * Create
     */
    public function create(Request $request) {

        $this->validate($request, [
            'sku' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'brand' => ['required', 'string', 'max:255'],
            'uom' => ['required', 'string', 'max:255'],
            'selling_price' => ['required', 'integer',],
            'lowest_price' => ['required', 'integer',],
        ]);

        $auid = Auth::user()->id;

        $prices = array('selling' => $request->selling_price, 'lowest' => $request->lowest_price);

        $product = new Product();
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->uom = $request->uom;
        $product->prices = json_encode($prices);
        $product->cuid = $auid;
        $product->uuid = $auid;
        $product->save();

        return redirect()->intended('/home');

    }


    /**
     * Show product edit
     */
    public function showEdit(Request $request) {

        $product = Product::findOrFail((int)$request->productID);

        $pageData = array(
            'title' => "Edit product",
            'titlePage' => "Edit product",
        );

        return view('products.edit', compact('pageData', 'product'));

    }

    /**
     * Product edit
     */
    public function edit(Request $request) {

        $this->validate($request, [
            'sku' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'brand' => ['required', 'string', 'max:255'],
            'uom' => ['required', 'string', 'max:255'],
            'selling_price' => ['required', 'integer',],
            'lowest_price' => ['required', 'integer',],
        ]);

        $auid = Auth::user()->id;
        $product = Product::findOrFail((int)$request->productID);

        $prices = array('selling' => $request->selling_price, 'lowest' => $request->lowest_price);

        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->uom = $request->uom;
        $product->prices = json_encode($prices);
        $product->uuid = $auid;
        $product->update();

        return redirect()->intended('/home');

    }


    /**
     * Product delete
     */
    public function delete(Request $request) {

        $auid = Auth::user()->id;
        $product = Product::findOrFail((int)$request->productID);
        $product->statusID = 0;
        $product->status = 'Inactive';
        $product->uuid = $auid;
        $product->update();

        return redirect()->intended('/home');

    }


    /**
     * Get products for quotation
     */
    public function quotationProducts(Request $request) {

        $product = Product::findOrFail((int)$request->productID);

        return response()->json(
            ['id' => $product->id, 'sku' => $product->sku, 'name' => $product->name, 'uom' => $product->uom,
                'unitPrice' => json_decode($product->prices)->selling,], 200);

    }

}
