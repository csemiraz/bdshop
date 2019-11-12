<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Mail\CustomerRegistrationMail;
use App\Order;
use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function registerForm()
    {
    	return view('front-end.customer.register');
    }

    public function register(Request $request)
    {
    	$request->validate([
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'email' => 'required|email|unique:customers',
    		'password' => 'required|min:6',
    		'phone' => 'required',
    		'address' => 'required',
    	]);
    	$customer = new Customer();
    	$customer->first_name = $request->first_name;
    	$customer->last_name = $request->last_name;
    	$customer->email = $request->email;
    	$customer->password = Hash::make($request->password);
    	$customer->phone = $request->phone;
    	$customer->address = $request->address;
    	$customer->save();

    	Session::put('customerId', $customer->id);
		Session::put('customerFirstName', $customer->first_name);
		Session::put('customerLastName', $customer->last_name);

		Mail::to($customer->email)->send(new CustomerRegistrationMail($customer));
    	Toastr::success(':) Registration has completed successfully', 'Success');
    	return redirect()->route('customer.profile');
    }

    public function loginForm()
    {
    	return view('front-end.customer.login');
    }

    public function login(Request $request)
    {
    	$request->validate([
    		'email' => 'required|email',
    		'password' => 'required',
    	]);

    	$customer = Customer::where('email', $request->email)->first();
    	if(isset($customer)){
    		if(password_verifY($request->password, $customer->password)) {
    			Session::put('customerId', $customer->id);
    			Session::put('customerFirstName', $customer->first_name);
    			Session::put('customerLastName', $customer->last_name);

    			Toastr::success(':) Login successfully', 'Success');
    			return redirect()->route('customer.profile');
    		}
    		else {
    			Toastr::warning('Invalid password!', 'Warning');
    			return redirect()->back();
    		}
    	}
    	else {
    		Toastr::warning('Invalid username or password!', 'Warning');
    		return redirect()->back();
    	}
    }

    public function logout()
    {
    	Session::forget('customerId');
    	Toastr::success('Logout successfully', 'Success');
    	return redirect()->route('/');
    }

    public function profile()
    {
    	if(Session::has('customerId')) {
    		$customer = Customer::where('id', Session::get('customerId'))->first();
    		return view('front-end.customer.profile', compact('customer'));
    	}
    	else {
    		Toastr::warning('Login or Registered first', 'Warning');
    		return redirect()->route('customer.login');

    	}
    	
    }

    public function profileUpdate(Request $request)
    {
    	$request->validate([
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|min:6|confirmed',
    		'phone' => 'required',
    		'address' => 'required',
    	]);
    	$customer = Customer::find(Session::get('customerId'));
    	$customer->first_name = $request->first_name;
    	$customer->last_name = $request->last_name;
    	$customer->email = $request->email;
    	$customer->phone = $request->phone;
    	$customer->password = Hash::make($request->password);
    	$customer->address = $request->address;
    	$customer->save();

    	Session::put('customerId', $customer->id);
		Session::put('customerFirstName', $customer->first_name);
		Session::put('customerLastName', $customer->last_name);

    	Toastr::success(':) Profile updated successfully', 'Success');
    	return redirect()->back();
    }

    public function order()
    {
        if(Session::has('customerId')){
            $customer = Customer::find(Session::get('customerId'));
            $orders = $customer->orders;
            return view('front-end.customer.order', compact('customer', 'orders'));
        }
        else {
            Toastr::warning('Login or Registered first', 'Warning');
            return redirect()->route('customer.login');

        }
        
    }

    public function wishlist()
    {
        if(Session::has('customerId')){
            $customer = Customer::find(Session::get('customerId'));
            $wishLists = $customer->wishListProducts;
            return view('front-end.customer.wishlist', compact('customer', 'wishLists'));
        }
        else {
            Toastr::warning('Login or Registered first', 'Warning');
            return redirect()->route('customer.login');

        }
        
    }

    public function wishlistStore($id)
    {
        if(Session::has('customerId')) {
            $customer = Customer::find(Session::get('customerId'));
            $product = Product::where('id', $id)->first();
            $wishList = $customer->wishListProducts()->where('product_id', $product->id)->count();

            if($wishList==0){
                $customer->wishListProducts()->attach($id);
                Toastr::success(':) Added to your wishlish', 'Success');
                return redirect()->back();
            }
            else {
                $customer->wishListProducts()->detach($id);
                Toastr::success(':) Removed from your wishlish', 'Success');
                return redirect()->back();
            }
        }
        else {
            Toastr::info('Login or registered first to add wishlist', 'Info');
                return redirect()->route('customer.login');
        }
    }

    public function wishlistRemove($id)
    {
        $customer = Customer::find(Session::get('customerId'));
        $customer->wishListProducts()->detach($id);
        Toastr::success(':) Removed from your wishlish', 'Success');
        return redirect()->back();   
    }


}
