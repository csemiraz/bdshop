<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function manageCategory() {
        $categories = Category::all();
        return view('back-end.admin.category.manage-category', [
            'categories' => $categories,
        ]);
    }

    public function addCategory() {
        return view('back-end.admin.category.add-category');
    }

    public function validCategory($request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

    }
    public function image ($request) {
        $image = $request->file('image');
        $slug = Str::slug($request->name);

        if(isset($image)) {
            $imageExtension = $image->getClientOriginalExtension();
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'_'.$currentDate.'_'.time().'.'.$imageExtension;

            $imagePath = 'assets/images/category/';
            if(!file_exists($imagePath)) {
                mkdir($imagePath, 666, true);
            }
            Image::make($image)->save($imagePath.$imageName);
        }
        else {
            $imageName = 'default.png';
        }
        return $imageName;
    }
    public function storeCategory (Request $request)
    {
        $this->validCategory($request);
        $imageName = $this->image($request);
        
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $imageName;
        $category->status = $request->status;
        $category->save();

        return redirect()->back()->with('message', 'Category info saved succesfully');
    }

    public function publishCategory ($id)
    {
        $category = Category::find($id);

        $category->status = 1;
        $category->save();

        return redirect()->back()->with('message', 'Category info published succesfully');
    }

    public function unpublishCategory ($id)
    {
        $category = Category::find($id);

        $category->status = 0;
        $category->save();

        return redirect()->back()->with('message', 'Category info unpublished succesfully');
    }

    public function editCategory ($id)
    {
        $category = Category::find($id);
        return view('back-end.admin.category.edit-category', compact('category'));
    }

    public function editImage ($request) {
        $category = Category::find($request->category_id);
        $image = $request->file('image');
        $slug = Str::slug($request->name);

        if(isset($image)) {
            $imageExtension = $image->getClientOriginalExtension();
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'_'.$currentDate.'_'.time().'.'.$imageExtension;

            $imagePath = 'assets/images/category/';
            if(!file_exists($imagePath)) {
                mkdir($imagePath, 666, true);
            }
            Image::make($image)->save($imagePath.$imageName);
        }
        else {
            $imageName = $category->image;
        }
        return $imageName;
    }

    public function updateCategory (Request $request)
    {
        $category = Category::find($request->category_id);
    
        $this->validCategory($request);
        $imageName = $this->editImage($request);

        $category->name = $request->name;
        $category->description = $request->description;
        /* if($category->image!=$imageName && \file_exists('assets/images/category/'.$category->image)) {
            \unlink('assets/images/category/'.$category->image);
        } */
        if(isset($request->image) && \file_exists('assets/images/category/'.$category->image)) {
            unlink('assets/images/category/'.$category->image);
        }
        $category->image = $imageName;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('manage-category')->with('message', 'Category info updated successfully');
    }

    public function deleteCategory ($id)
    {
        $category = Category::find($id);
        if(file_exists('assets/images/category/'.$category->image)) {
            unlink('assets/images/category/'.$category->image);
        }
        $category->delete();

        return redirect()->back()->with('message', 'Category info deleted successfully');
    }
}
