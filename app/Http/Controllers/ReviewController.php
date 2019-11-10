<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    public function review(Request $request)
    {
        $request->validate([
            'rating' => 'required',
            'review' => 'required',
        ]);
        $review = new Review();
        $review->product_id = $request->product_id;
        $review->customer_id = Session::get('customerId');
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->save();

        Toastr::success(':) Thank you for your review.', 'Success');
        return redirect()->back();
    }
}
