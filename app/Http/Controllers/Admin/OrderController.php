<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Product;
use App\Shipping;
use PDF;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
    	$orders = Order::all();
    	$payments = Payment::all();
    	return view('back-end.admin.orders.index',[
    		'orders' => $orders,
    		'payments' => $payments,
    	]);
    }

    public function show($id)
    {
    	$order = Order::find($id);
    	$products = OrderDetail::where('order_id', $order->id)->get();
    	$customer = Customer::find($order->customer_id);
    	$shipping = Shipping::find($order->shipping_id);

    	return view('back-end.admin.orders.show',[
    		'order' => $order,
    		'products' => $products,
    		'customer' => $customer,
    		'shipping' => $shipping,
    	]);
    }

    public function invoice($id)
    {
    	$order = Order::find($id);
    	$products = OrderDetail::where('order_id', $order->id)->get();
    	$customer = Customer::find($order->customer_id);
    	$shipping = Shipping::find($order->shipping_id);

    	return view('back-end.admin.orders.invoice',[
    		'order' => $order,
    		'products' => $products,
    		'customer' => $customer,
    		'shipping' => $shipping,
    	]);
    }

    public function downloadInvoice($id)
    {
    	$order = Order::find($id);
    	$products = OrderDetail::where('order_id', $order->id)->get();
    	$customer = Customer::find($order->customer_id);
    	$shipping = Shipping::find($order->shipping_id);

    	$pdf = PDF::loadView('back-end.admin.orders.download-invoice', [
    		'order' => $order,
    		'products' => $products,
    		'customer' => $customer,
    		'shipping' => $shipping,
    	]);
    	$file = 'invoice'.'_'.$order->id.'.'.'pdf';
    	return $pdf->stream($file);
    }

}
