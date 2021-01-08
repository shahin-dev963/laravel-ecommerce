<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $coupons = Coupon::latest()->get();

        return view('admin.coupon.index', compact('coupons'));
    }

    public function store(Request $request){
        $request->validate([
           'coupon_name' => 'required|unique:coupons,coupon_name',
           'coupon_discount'=>'required',
        ]);

        Coupon::insert([
            'coupon_name' =>strtoupper( $request->coupon_name),
            'coupon_discount'=>$request->coupon_discount,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->back()->with('success', 'Successfully Coupon Added');
    }

    public function edit($id){
        $coupon = Coupon::findOrFail($id);

        return view('admin.coupon.edit', compact('coupon'));
    }

    public function update(Request $request){
        $id = $request->id;

       Coupon::find($id)->update([
            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'updated_at' => Carbon::now(),
       ]);

        return Redirect()->route('admin.coupon')->with('updated',  $request->coupon_name.' updated');
    }

    public function delete($id){
        Coupon::find($id)->delete();

        return Redirect()->back()->with('delete', 'Coupon Successfully Deleted');
    }

    public function inactive($id){
        Coupon::find($id)->update(['status'=>0]);

        return Redirect()->back()->with('updated', 'Coupon Successfully Inactive');
    }

    public function active($id){
        Coupon::find($id)->update(['status'=>1]);

        return Redirect()->back()->with('updated', 'Coupon Successfully Active');
    }

    

}
