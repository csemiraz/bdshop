<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('back-end.admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function image($request)
    {
        $image = $request->file('image');

        if(isset($image)) {
            $imageExtension = $image->getClientOriginalExtension();
            $currentDate = Carbon::now()->toDateString();
            $imageName = 'slider'.'_'.$currentDate.'_'.time().'.'.$imageExtension;
            
            $imagePath = 'assets/images/slider/';
            $imageUrl = $imagePath.$imageName;

            if(!file_exists($imagePath)) {
                mkdir($imagePath, 666, true);
            }

            Image::make($image)->resize(1280, 855)->save($imagePath.$imageName);
            return $imageUrl;
        }
    }


    public function store(SliderRequest $request)
    {
        $imageUrl = $this->image($request);

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->link = $request->link;
        $slider->image = $imageUrl;
        $slider->status = $request->status;
        $slider->save();

        Toastr::success(':) Slider info saved successfully', 'Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('back-end.admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    
    public function updateImage($request, $slider)
    {
        $image = $request->file('image');
        if(isset($image)){
            $imageExtension = $image->getClientOriginalExtension();
            $currentDate = Carbon::now()->toDateString();
            $imageName = 'slider'.'_'.$currentDate.'_'.time().'.'.$imageExtension;
            $imagePath='assets/images/slider/';
            $imageUrl = $imagePath.$imageName;

            if(!file_exists($imagePath)){
                mkdir($imagePath, 666, true);
            }
            Image::make($image)->resize(1280, 855)->save($imageUrl);
        }
        else {
            $imageUrl = $slider->image;
        }
        return $imageUrl;
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            //'link' => 'required',
            'image' => 'nullable',
            'status' => 'required',
        ]);
        $imageUrl = $this->updateImage($request, $slider);
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->link = $request->link;
        if(isset($request->image) && file_exists($slider->image)){
            unlink($slider->image);
        }
        $slider->image = $imageUrl;
        $slider->status = $request->status;
        $slider->save();

        Toastr::success(':) Slider info udpated successfully', 'Success');
        return redirect()->route('sliders.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if(isset($slider) && file_exists($slider->image)) {
            unlink($slider->image);
        }
        $slider->delete();

        Toastr::success(':) Slider info deleted successfully', 'Success');
        return redirect()->route('sliders.index');
    }
}
