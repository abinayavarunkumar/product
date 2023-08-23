<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\UnitType;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products= Product::all();
        return view('products.index', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $unittypes = UnitType::pluck('name', 'id');
        return view('products.create', compact('unittypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        $product = new Product;
		$product->product_name = $request->input('product_name');
		$product->unit_type_id = $request->input('unit_type_id');
		$product->product_category = $request->input('product_category');
         // Handle image uploads
        if ($request->hasFile('product_images')) {
            $images = [];

            foreach ($request->file('product_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('product_images', $imageName, 'public');
                $images[] = $imageName;
            }

            $product->product_images = json_encode($images);
        }
		$product->product_price = $request->input('product_price');
		$product->discount_percentage = $request->input('discount_percentage');
		$product->discount_amount = $request->input('discount_amount');
		$product->discount_start_date = $request->input('discount_start_date');
        $product->discount_end_date = $request->input('discount_end_date');
		$product->tax_percentage = $request->input('tax_percentage');
		$product->tax_amount = $request->input('tax_amount');
		$product->stock_entry = $request->input('stock_entry');
        $product->save();

        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
		$product->product_name = $request->input('product_name');
		$product->unit_type_id = $request->input('unit_type_id');
		$product->product_category = $request->input('product_category');
		$product->product_images = $request->input('product_images');
		$product->product_price = $request->input('product_price');
		$product->discount_percentage = $request->input('discount_percentage');
		$product->discount_amount = $request->input('discount_amount');
		$product->discount_range = $request->input('discount_range');
		$product->tax_percentage = $request->input('tax_percentage');
		$product->tax_amount = $request->input('tax_amount');
		$product->stock_entry = $request->input('stock_entry');
        $product->save();

        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return to_route('products.index');
    }
}
