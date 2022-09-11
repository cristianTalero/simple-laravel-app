<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductController extends Controller
{
    public function index() {
        $products = ProductModel::all();
        return view('product.index')
            ->with('products', $products);
    }

    public function published(Request $request) {
        $product = ProductModel::findOrFail($request->id);
        $product->published = $request->input('status');
        $product->save();

        return response()->noContent();
    }

    public function show() {
        return view('product.index');
    }

    public function create() {
        return view('product.create');
    }

    public function store(Request $request) {
        $product = new ProductModel();

        $product->title = $request->input('title');
        $product->description = $request->input('description');

        $product->saveOrFail();

        return view('product.show', compact('product'));
    }
}
