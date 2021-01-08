<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Model\OrderItem;
use App\Model\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function order(){
        $orders = Order::where('user_id', Auth::id())->latest()->get();

        return view('pages.profile.order', compact('orders'));
    }

    public function orderView($id){
        $order = Order::findOrFail($id);
        $orderItems = OrderItem::with('OrderItemToProductJoin')->where('order_id', $id)->get();
        $shipping = Shipping::where('order_id', $id)->first();

        return view('pages.profile.order-view', compact('order', 'orderItems','shipping'));
    }
}
