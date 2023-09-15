<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index')
            ->with('products', Product::get());
    }

    public function show($id)
    {
        return view('products.show')
            ->with('product', Product::find($id));
    }
}
