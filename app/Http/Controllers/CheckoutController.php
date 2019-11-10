<?php

namespace App\Http\Controllers;

use Cart;
use App\Order;
use App\Payment;
use App\Customer;
use App\Shipping;
use App\OrderDetail;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerRegistrationMail;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        if(Session::get('customerId')) {
            return redirect()->route('checkout.shipping');
        }
        elseif (Cart::getContent()->count()!=0) {
            return view('front-end.checkout.index');
        } else {
            Toastr::warning('Please add item to cart first', 'Error');
            return redirect()->route('/');
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email|required',
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

        Toastr::success(':) Registration completed successfully', 'Success');
        return redirect()->route('checkout.shipping');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $customer = Customer::where('email', $request->email)->first();
        if (isset($customer)) {
            if (password_verify($request->password, $customer->password)) {
                Session::put('customerId', $customer->id);
                Session::put('customerFirstName', $customer->first_name);
                Session::put('customerLastName', $customer->last_name);

                return redirect()->route('checkout.shipping');
            } else {
                return redirect()->back()->with('message', 'Invalid Password!');
            }
        } else {
            return redirect()->back()->with('message', 'Invalid Email or Password!');
        }
    }

    public function shipping()
    {
        if (Cart::getContent()->count()!=0 && Session::get('customerId')) {
            $customer = Customer::find(Session::get('customerId'));
            return view('front-end.checkout.shipping', compact('customer'));
        } else {
            Toastr::warning('Please add item to cart and complete registration', 'Error');
            return redirect()->route('/');
        }
    }

    public function shippingStore(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $shipping = new Shipping();
        $shipping->first_name = $request->first_name;
        $shipping->last_name = $request->last_name;
        $shipping->email = $request->email;
        $shipping->phone = $request->phone;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingId', $shipping->id);

        Toastr::success(':) Shipping info saved successfully', 'Success');
        return redirect()->route('checkout.payment');
    }

    public function payment()
    {
        if (Cart::getContent()->count()!=0 && Session::get('shippingId')) {
            return view('front-end.checkout.payment');
        } 
        else {
            Toastr::warning('Please add item to cart and provide shipping info', 'Error');
            return redirect()->route('/');
        }
    }

    public function order(Request $request)
    {
        $paymentType = $request->type;
        if($paymentType == 'Cash') {
            //Order info
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('orderTotal');//from cart.index
            $order->save();

            Session::put('orderId', $order->id);
            Session::put('totalOrder', $order->order_total);//for checkout.confirm

            //Payment info
            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->type = $request->type;
            $payment->save();

            $cartProducts = Cart::getContent();
            //OrderDetail info
            foreach($cartProducts as $cartProduct) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $cartProduct->id;
                $orderDetail->product_name = $cartProduct->name;
                $orderDetail->product_price = $cartProduct->price;
                $orderDetail->product_quantity = $cartProduct->quantity;
                $orderDetail->size = $cartProduct->attributes->size;
                $orderDetail->color = $cartProduct->attributes->color;
                $orderDetail->save();
            }
            Cart::clear();
            return redirect()->route('checkout.confirm');

        }
        elseif($paymentType == 'bKash') {
            Toastr::info('bKash payment method is not currently available please choose Cash');
            return redirect()->back();
        }
        elseif($paymentType == 'Paypal') {
            Toastr::info('Paypal payment method is not currently available please choose Cash');
            return redirect()->back();
        }
    }

    public function confirm()
    {
        if(Session::get('orderId')) {
            return view('front-end.checkout.confirm');
        }
        else {
            Toastr::warning('Please complete your order processes', 'Error');
            return redirect()->route('/');
        }
    }

    public function logout()
    {
        Session::flush();
        Toastr::success(':) Logout successfully', 'Success');
        return redirect()->route('/');
    }


}
