<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Product;
use App\Provider;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $providers = Provider::get();
        $categories = Category::get();
        return view('admin.products.create', compact('providers', 'categories'));
    }

    public function store(StoreRequest $request)
    {
        Product::create($request->all());
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product', 'providers', 'categories'));
    }

    public function edit(Product $product)
    {
        $providers = Provider::get();
        $categories = Category::get();
        return view('admin.products.edit', compact('product', 'providers', 'categories'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
