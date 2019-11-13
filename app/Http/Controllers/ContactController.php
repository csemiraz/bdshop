<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactUs()
    {
    	return view('front-end.pages.contact-us');
    }
}
