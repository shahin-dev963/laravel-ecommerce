<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Intervention\Image\ImageManagerStatic as Image;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function addProduct(){
        //$products = Product::latest()->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();

        return view('admin.product.add', compact('categories', 'brands'));
    }


    public function store(Request $request){
        $request->validate([
           'product_name' => 'required|max:255',
           'product_code' => 'required|max:255',
           'product_price' => 'required|max:255',
           'product_quantity' => 'required|max:255',
           'category_id' => 'required|max:255',
           'brand_id' => 'required|max:255',
           'short_description' => 'required',
           'long_description' => 'required',
           'image_one' => 'required|mimes:jpg,jpeg,png,gif',
           'image_two' => 'required|mimes:jpg,jpeg,png,gif',
           'image_three' => 'required|mimes:jpg,jpeg,png,gif',
        ],[
            'category_id.required' => 'select category name',
            'brand_id.required' => 'select brand name',
        ]);

        $image_one = $request->file('image_one');
        $name_gen = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
        $img_url1 = 'frontend/img/product/upload/'.$name_gen;

        $image_two = $request->file('image_two');
        $name_gen = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
        $img_url2 = 'frontend/img/product/upload/'.$name_gen;

        $image_three = $request->file('image_three');
        $name_gen = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
        Image::make($image_three)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
        $img_url3 = 'frontend/img/product/upload/'.$name_gen;

        Product::insert([
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'product_slug' => strtolower(str_replace(" ","-",$request->product_name)),
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image_one' => $img_url1,
            'image_two' => $img_url2,
            'image_three' => $img_url3,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->back()->with('success', 'Successfully Product Added');
    }

    public function manageProduct(){
        $products = Product::orderBy('id', 'DESC')->get();

        return view('admin.product.manage', compact('products'));
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();

        return view('admin.product.edit', compact('product', 'brands','categories'));
    }

    public function update(Request $request){
        $id = $request->id;

       Product::find($id)->update([
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'product_slug' => strtolower(str_replace(" ","-",$request->product_name)),
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'updated_at' => Carbon::now(),
       ]);

        return Redirect()->route('manage-products')->with('updated',  $request->product_name.' updated');
    }


    public function updateImage(Request $request){
        $id = $request->id;
        $old_one = $request->img_one;
        $old_two = $request->img_two;
        $old_three = $request->img_three;

        if($request->has('image_one') && $request->has('image_two') && $request->has('image_three')){
            unlink($old_one);
            unlink($old_two);
            unlink($old_three);

            $image_one = $request->file('image_one');
            $name_gen = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
            $img_url1 = 'frontend/img/product/upload/'.$name_gen;

            Product::findOrFail($id)->update([
                'image_one' => $img_url1,
                'updated_at' => Carbon::now(),
           ]);

           $image_two = $request->file('image_two');
           $name_gen = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make($image_two)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
           $img_url2 = 'frontend/img/product/upload/'.$name_gen;


           Product::findOrFail($id)->update([
               'image_two' => $img_url2,
               'updated_at' => Carbon::now(),
          ]);

          $image_three = $request->file('image_three');
          $name_gen = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
          Image::make($image_three)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
          $img_url3 = 'frontend/img/product/upload/'.$name_gen;


          Product::findOrFail($id)->update([
              'image_three' => $img_url3,
              'updated_at' => Carbon::now(),
         ]);

            return Redirect()->route('manage-products')->with('updated',  'image updated');
        }

        if($request->has('image_one')){
            unlink($old_one);

            $image_one = $request->file('image_one');
            $name_gen = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
            $img_url1 = 'frontend/img/product/upload/'.$name_gen;


            Product::findOrFail($id)->update([
                'image_one' => $img_url1,
                'updated_at' => Carbon::now(),
           ]);

            return Redirect()->route('manage-products')->with('updated',  'image updated');
        }

        if($request->has('image_two')){
            unlink($old_two);

            $image_two = $request->file('image_two');
            $name_gen = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
            $img_url2 = 'frontend/img/product/upload/'.$name_gen;


            Product::findOrFail($id)->update([
                'image_two' => $img_url2,
                'updated_at' => Carbon::now(),
           ]);

            return Redirect()->route('manage-products')->with('updated',  'image updated');
        }

        if($request->has('image_three')){
            unlink($old_three);

            $image_three = $request->file('image_three');
            $name_gen = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
            $img_url3 = 'frontend/img/product/upload/'.$name_gen;


            Product::findOrFail($id)->update([
                'image_three' => $img_url3,
                'updated_at' => Carbon::now(),
           ]);

            return Redirect()->route('manage-products')->with('updated',  'image updated');
        }
    }


    public function destroy($id){
        $image = Product::findOrFail($id);

        $image_one = $image->image_one;
        $image_two = $image->image_two;
        $image_three = $image->image_three;

        unlink($image_one);
        unlink($image_two);
        unlink($image_three);

        Product::findOrFail($id)->delete();

        return Redirect()->back()->with('delete', 'Product Successfully Deleted');
    }

    public function inactive($id){
        Product::find($id)->update(['status'=>0]);

        return Redirect()->back()->with('updated', 'Product Successfully Inactive');
    }

    public function active($id){
        Product::find($id)->update(['status'=>1]);

        return Redirect()->back()->with('updated', 'Product Successfully Active');
    }
}


