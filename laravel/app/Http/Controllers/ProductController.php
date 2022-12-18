<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductValidation;
use App\Http\Requests\UpdateProductValidation;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::simplePaginate(15);
        return view('users.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.createOrUpdate', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateProductValidation $createProductValidation)
    {
        $request = $createProductValidation->validated();
        unset($request['photo']);
        $photo = $createProductValidation->file('photo')->store('public');
        $request['photo'] = explode('/', $photo)[1];
        Product::create($request);
        return redirect()->route('index')->with(['create' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('users.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Request $request)
    {
        $request->session()->flashInput($product->toArray());
        $categories = Category::all();
        return view('admin.product.createOrUpdate', compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductValidation $productValidation, Product $product)
    {
        $request = $productValidation->validated();
        if (isset($request['photo'])){
            unset($request['photo']);
            $photo = $productValidation->file('photo')->store('public');
            $request['photo'] = explode('/', $photo)[1];
        }
        $product->update($request);
        return redirect()->route('index')->with(['update' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('index')->with(['delete' => true]);
    }
}
