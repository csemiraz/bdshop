<?php

namespace App\Http\Controllers;

use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactUs()
    {
    	return view('front-end.pages.contact-us');
    }

  	public function store(Request $request) 
  	{
  		$request->validate([
  			'name' => 'required',
  			'email' => 'required|email',
  			'message' => 'required',
  		]);

  		$contact = new Contact();
  		$contact->name = $request->name;
  		$contact->email = $request->email;
  		$contact->message = $request->message;
  		$contact->save();

  		Toastr::success(':) Thank you for contact us. We will response asap!', 'Success');
  		return redirect()->back();
  	}
}
