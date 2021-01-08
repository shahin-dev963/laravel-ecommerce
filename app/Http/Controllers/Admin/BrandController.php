<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $brands = Brand::latest()->get();

        return view('admin.brand.index', compact('brands'));
    }

    public function store(Request $request){
        $request->validate([
           'brand_name' => 'required|unique:brands,brand_name',
        ]);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->back()->with('success', 'Successfully Brand Added');
    }

    public function edit($id){
        $brand = Brand::findOrFail($id);

        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request){
        $id = $request->id;

       Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'updated_at' => Carbon::now(),
       ]);

        return Redirect()->route('admin.brand')->with('updated',  $request->brand_name.' updated');
    }

    public function delete($id){
        Brand::find($id)->delete();

        return Redirect()->back()->with('delete', 'Brand Successfully Deleted');
    }

    public function inactive($id){
        Brand::find($id)->update(['status'=>0]);

        return Redirect()->back()->with('update', 'Brand Successfully Inactive');
    }

    public function active($id){
        Brand::find($id)->update(['status'=>1]);

        return Redirect()->back()->with('update', 'Brand Successfully Active');
    }
}
