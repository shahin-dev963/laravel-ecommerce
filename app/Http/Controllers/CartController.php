<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use App\Model\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller{

    public function addToCart(Request $request, $product_id){

        $check = Cart::where('product_id', $product_id)->where('user_ip',request()->ip())->first();
        if($check){
            Cart::where('product_id', $product_id)->where('user_ip',request()->ip())->increment('product_quantity');

            return Redirect()->back()->with('cart-alert', 'Product added on cart');
        }
        else{
            Cart::insert([
                'product_id' => $product_id,
                'product_quantity' =>1,
                'product_price' => $request->product_price,
                'user_ip' => request()->ip(),
                'created_at'=> Carbon::now(),

            ]);

            return Redirect()->back()->with('cart-alert', 'Product added on cart');
        }
    }

    public function cartPage(){
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();

        $subTotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });

        return view('pages.cart', compact('carts','subTotal'));
    }

    public function destroy($id){
        Cart::where('id',$id)->where('user_ip',request()->ip())->delete();

        return Redirect()->back()->with('cart-delete', 'Product cart deleted');
    }

    public function update(Request $request, $id){
        Cart::where('id', $id)->where('user_ip',request()->ip())->update([
            'product_quantity'=> $request->product_quantity,
        ]);

        return Redirect()->back()->with('cart-update', 'Cart Quantity updated');
    }

    public function couponApply(Request $request){
        $check = Coupon::where('coupon_name', $request->coupon_code)->first();

        if($check){
            Session::put('coupon',[
                'coupon_name'=>$check->coupon_name,
                'coupon_discount'=>$check->coupon_discount,
            ]);

            return Redirect()->back()->with('cart-update', 'Coupon Added');
        }
        else{
            return Redirect()->back()->with('cart-delete', 'Invalid Coupon');
        }

    }

    public function couponDestroy(){
        if(Session::has('coupon')){
            session()->forget('coupon');

            return Redirect()->back()->with('cart-delete', 'Coupon Removed Success');
        }
    }

}
