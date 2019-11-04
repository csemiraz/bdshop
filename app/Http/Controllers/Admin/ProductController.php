<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Product;
use App\Category;
use App\Supplier;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->join('brands', 'products.brand_id', '=', 'brands.id')
                    ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
                    ->select('products.*', 'categories.name as categoryName', 'suppliers.name as supplierName', 'brands.name as brandName')
                    ->orderBy('id', 'desc')
                    ->get();
        return view('back-end.admin.products.index', compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->latest()->get();
        $brands = Brand::where('status', 1)->latest()->get();
        $suppliers = Supplier::where('status', 1)->latest()->get();
        return view('back-end.admin.products.create', compact('categories', 'brands', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productValidate($request)
    {
        $request->validate([
            'category_id' => 'required',
            'brand_id' => 'required',
            'supplier_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'image',
            'status' => 'required',
        ]);
    }
    public function image ($request)
    {
        $image = $request->file('image');
        $slug = Str::slug($request->name);
        if(isset($image)) {
           $imageExtension = $image->getClientOriginalExtension();
           $currentDate = Carbon::now()->toDateString();
           $imageName = $slug.'_'.$currentDate.'_'.time().'.'.$imageExtension;
           $imagePath = "assets/images/product/";
           $imageUrl = $imagePath.$imageName;
           if(!file_exists($imagePath)) {
               mkdir($imagePath, 660, true);
           }
           Image::make($image)->resize(500, 300)->save($imagePath.$imageName);
           return $imageUrl;
        }
        else {
            return 'assets/images/default/default.jpg';
        }
    }
    public function store(Request $request)
    {
        $product = new Product();
        $this->productValidate($request);
        $imageUrl = $this->image($request);

        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->supplier_id = $request->supplier_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->discount = $request->discount;
        $product->image = $imageUrl;
        $product->status = $request->status;
        $product->save();

        Toastr::success('Product info saved successfully', ':) Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $category = Category::find($product->category_id);
        $brand = Brand::find($product->brand_id);
        $supplier = Supplier::find($product->supplier_id);
       
        return view('back-end.admin.products.show', [
            'product' => $product,
            'category' => $category,
            'brand' => $brand,
            'supplier' => $supplier,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::where('status', 1)->latest()->get();
        $brands = Brand::where('status', 1)->latest()->get();
        $suppliers = Supplier::where('status', 1)->latest()->get();
        return view('back-end.admin.products.edit', compact('product', 'categories', 'brands', 'suppliers'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editImage ($request, $id) {
        $product = Product::find($id);
        $image = $request->file('image');
        $slug = Str::slug($request->name);

        if(isset($image)) {
            $imageExtension = $image->getClientOriginalExtension();
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'_'.$currentDate.'_'.time().'.'.$imageExtension;

            $imagePath = 'assets/images/product/';
            $imageUrl = $imagePath.$imageName;
            if(!file_exists($imagePath)) {
                mkdir($imagePath, 666, true);
            }
            Image::make($image)->save($imagePath.$imageName);
        }
        else {
            $imageUrl = $product->image;
        }
        return $imageUrl;
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $this->productValidate($request);
        $imageUrl = $this->editImage($request, $id);

        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->supplier_id = $request->supplier_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->discount = $request->discount;
        
        if(isset($request->image) && file_exists($product->image) && $product->image!='assets/images/defult/default.jpg') {
            unlink($product->image);
        }
        $product->image = $imageUrl;
        $product->status = $request->status;
        $product->save();

        Toastr::success('Product info updated successfully', ':) Success');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(file_exists($product->image) && $product->image!='assets/images/default/default.jpg') {
            unlink($product->image);
        }
        $product->delete();

        Toastr::success('Product info deleted successfully', ':) Success');
        return redirect()->back();
    }
}
