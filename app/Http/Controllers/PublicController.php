<?php

namespace App\Http\Controllers;

use Cart;
use App\Brand;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index() {
        $homeCategories = Category::where('status', 1)->take(4)->get();
        $products = Product::where('status', 1)->paginate(8);

        return view('front-end.home.home', [
            'homeCategories' => $homeCategories,
            'products' => $products,
        ]);
    }

    public function productSingle($name, $id)
    {
        $productSingle = Product::find($id);
        $productRelated = Product::where('category_id', $productSingle->category_id)->whereNotIn('id', [$productSingle->id])->paginate(4);
        return view('front-end.product.product-single', compact('productSingle', 'productRelated'));
    }


    public function allCategory()
    {
        $allCategories = Category::where('status', 1)->paginate(8);
        return view('front-end.category.allCategory', compact('allCategories'));
    }

    public function productCategory ($name)
    {
        $categoryName = Category::where('name', $name)->first();
        $productCategories = Product::where('category_id', $categoryName->id)->paginate(6);
        return view('front-end.product.product-category', compact('productCategories', 'categoryName'));
    }

    public function productBrand ($name)
    {
        $brandName = Brand::where('name', $name)->first();
        $productBrands = Product::where('brand_id', $brandName->id)->paginate(6);
        return view('front-end.product.product-brand', compact('productBrands', 'brandName'));
    }


}
