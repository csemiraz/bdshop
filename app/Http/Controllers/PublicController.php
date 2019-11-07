<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class PublicController extends Controller
{
    public function index() {
        $categories = Category::where('status', 1)->take(4)->get();
        $products = Product::where('status', 1)->paginate(8);
        return view('front-end.home.home', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function productSingle($name, $id)
    {
        $productSingle = Product::find($id);
        return view('front-end.product.product-single', compact('productSingle'));
    }
}
