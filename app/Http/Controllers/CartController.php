<?php

namespace App\Http\Controllers;

use Cart;
use App\Product;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function store(Request $request) 
    {
        $product = Product::find($request->product_id);

        if($product->stock!=0){
            $cart = Cart::add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => round((1-($product->discount/100))*$product->price, 2),  
                'quantity' => isset($request->quantity) ? $request->quantity : 1,
                'attributes' => array(
                    'size' => $request->size,
                    'color' => $request->color,
                    'image' => $product->image,
                    'stock' => $product->stock,
            ),
        ));

        //session(['carts' => Cart::getContent()]);//Special purpose showing in header area(cart)

        Toastr::success(':) Successfully added to cart', 'Success');
        return redirect()->back();
        }
        else {
            Toastr::info('The product is out of stock', 'Info');
            return redirect()->back();
        }
    }

    public function index() 
    {
        $cartInfoes = Cart::getContent();
        return view('front-end.cart.index', compact('cartInfoes'));
    }

    public function update($id)
    {
        Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            )
        ));
        return redirect()->back();
    }

    public function destroy($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }


}
