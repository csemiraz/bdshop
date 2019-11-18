<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Review;
use App\Subscriber;
use App\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
    	$categories = Category::all();
    	$brands = Brand::all();
    	$suppliers = Supplier::all();
    	$products = Product::all();
    	$customers = Customer::all();
    	$subscribers = Subscriber::all();
    	$orders = Order::all();
    	$reviews = Review::all();

    	$todayCustomers = Customer::whereDate('created_at', Carbon::today())->get();
    	$todaySubscribers = Subscriber::whereDate('created_at', Carbon::today())->get();
    	$todayOrders = Order::whereDate('created_at', Carbon::today())->get();
    	$todayReviews = Review::whereDate('created_at', Carbon::today())->get();

    	$topRatedProducts = Product::withCount('reviews')
    								->orderBy('reviews_count', 'desc')
    								->take(10)
    								->get();

    	$activeCustomers = Customer::withCount('reviews')
    								->withCount('orders')
    								->orderBy('reviews_count', 'desc')
    								->orderBy('orders_count', 'desc')
    								->take(10)
    								->get();						

        return view('back-end.admin.home.home', [
        	'categories' => $categories,
        	'brands' => $brands,
        	'suppliers' => $suppliers,
        	'products' => $products,
        	'customers' => $customers,
        	'subscribers' => $subscribers,
        	'orders' => $orders,
        	'reviews' => $reviews,
        	'todayCustomers' => $todayCustomers,
        	'todaySubscribers' => $todaySubscribers,
        	'todayOrders' => $todayOrders,
        	'todayReviews' => $todayReviews,
        	'topRatedProducts' => $topRatedProducts,
        	'activeCustomers' => $activeCustomers,
        ]);
    }
}
