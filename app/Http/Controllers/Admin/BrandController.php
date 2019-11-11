<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('back-end.admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.admin.brand.create');
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
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->save();

        Toastr::success('Brand info saved successfully', 'Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //$brand = Brand::find($brand);
        return view('back-end.admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //$brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->save();

        return redirect()->route('brands.index')->with('message', 'Brand info updated successfully :)');
    }

        public function publish ($id)
    {
        $brand = Brand::find($id);
        $brand->status = 1;
        $brand->save();

        return redirect()->back()->with('message', 'Brand info published successfully');
    }

    public function unpublish ($id)
    {
        $brand = Brand::find($id);
        $brand->status = 0;
        $brand->save();

        return redirect()->back()->with('message', 'Brand info unpublished successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //$brand = Brand::find($id);
        $brand->delete();

        Toastr::success('Brand info deleted successfully', 'Success');
        return redirect()->back();

    }
}
