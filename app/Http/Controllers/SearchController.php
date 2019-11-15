<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$query = $request->input('query');

    	$products = Product::where('name', 'LIKE', "%$query%")
    						->where('status', 1)
    						->take(44)//optional
    						//->paginate(4);
    						->get();
    						
    	return view('front-end.search.search', compact('products', 'query'));
    }
}
