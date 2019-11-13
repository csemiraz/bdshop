<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
    	$request->validate([
    		'email' => 'required|unique:subscribers|email',
    	]);

    	$subscriber = new Subscriber();
    	$subscriber->email = $request->email;
    	$subscriber->save();

    	Toastr::success(':) You have added to our subscriber list.', 'Success');
    	return redirect()->back();
    }
}
