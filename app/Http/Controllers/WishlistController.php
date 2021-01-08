<?php

namespace App\Http\Controllers;

use App\Model\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist($id){
        if (Auth::check()) {
            Wishlist::insert([
                'user_id'=> Auth::id(),
                'product_id' => $id,
            ]);

            return Redirect()->back()->with('wishlist-success', 'Product added on wishlist');
        } else {
            return Redirect()->route('login')->with('loginerror', 'At first login your account');
        }

    }

    public function wishlistPage(){
        $wishlists = Wishlist::where('user_id', Auth::id())->latest()->get();

        return view('pages.wishlist', compact('wishlists'));
    }

    public function destroy($id){
        Wishlist::where('id',$id)->where('user_id',Auth::id())->delete();

        return Redirect()->back()->with('cart-delete', 'Wishlist product removed');
    }
}
