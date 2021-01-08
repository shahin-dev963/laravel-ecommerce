<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\Shipping;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $orders = Order::latest()->get();

        return view('admin.order.index', compact('orders'));
    }

    public function view($id){
        $order = Order::findOrFail($id);
        $orderItems = OrderItem::where('order_id', $id)->get();
        $shipping = Shipping::where('order_id', $id)->first();

        return view('admin.order.view', compact('order', 'orderItems','shipping'));
    }
}
