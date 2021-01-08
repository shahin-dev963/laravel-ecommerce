<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\Shipping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index(){
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();

        $subTotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });

        if(Auth::check()){
            return view('pages.checkout', compact('carts', 'subTotal'));
        }
        else{
            return redirect()->route('login');
        }
    }

    public function orderStore(Request $request){

        $request->validate([
            'shipping_first_name'=> 'required',
            'shipping_last_name'=> 'required',
            'shipping_phone'=> 'required',
            'shipping_email'=> 'required',
            'address'=> 'required',
            'post_code'=> 'required',
            'payment_type'=> 'required',
        ]);

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'invoice_no' => mt_rand(10000000,99999999),
            'payment_type' => $request->payment_type,
            'total' => $request->total,
            'subtotal' => $request->subtotal,
            'coupon_discount' => $request->coupon_discount,
            'created_at' => Carbon::now(),

        ]);

        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->product_id,
                'product_quantity' => $cart->product_quantity,
                'created_at' => Carbon::now(),
            ]);
        }

        Shipping::insert([
            'order_id' => $order_id,
            'shipping_first_name' => $request->shipping_first_name,
            'shipping_last_name' => $request->shipping_last_name,
            'shipping_phone' => $request->shipping_phone,
            'shipping_email' => $request->shipping_email,
            'address' => $request->address,
            'state' => $request->state,
            'post_code' => $request->post_code,
            'created_at' => Carbon::now(),
        ]);

        if(Session::has('coupon')){
            session()->forget('coupon');
        }

        Cart::where('user_ip', request()->ip())->delete();

        return Redirect()->to('order/success')->with('orderComplete', 'Your Order SuccessFully Completed');
    }


    public function orderSuccess(){
        return view('pages.order-complete');
    }
}
