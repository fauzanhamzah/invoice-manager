<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use Spatie\Permission\Models\Role;

class ProductController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('products.index', compact('products'));
    }

    public function indexuser()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('products.indexuser', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
        ]);

        if (Product::create($request->all())) {
            $request->session()->flash('success', ' Product has been Added!');
        } else {
            $request->session()->flash('error', 'There was an error adding the product!');
        }

        // Product::create($request->all());
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
        ]);

        if (Product::where('id', $product->id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'stock' => $request->stock,
                'price' => $request->price

            ])
        ) {
            $request->session()->flash('success', $product->name . ' has been Updated!');
        } else {
            $request->session()->flash('error', ' There was an error updating the product!!');
        }

        // Product::where('id', $product->id)
        //     ->update([
        //         'name' => $request->name,
        //         'description' => $request->description,
        //         'price' => $request->price

        //     ]);
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Request $request)
    {
        if (Product::destroy($product->id)) {
            $request->session()->flash('success', $product->name . ' has been Deleted!');
        } else {
            $request->session()->flash('error', 'There was an error deleting the product!');
        }

        // Product::destroy($product->id);
        return redirect('/products');
    }
}
