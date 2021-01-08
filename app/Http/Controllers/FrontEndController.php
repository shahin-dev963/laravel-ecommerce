<?php

namespace App\Http\Controllers;

use App\Category;
use App\Model\Contact;
use App\Model\Product;
use Carbon\Carbon;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        $products = Product::where('status',1)->latest()->get();
        $categories = Category::where('status',1)->latest()->get();
        $product2 = Product::where('status',1)->latest()->limit(3)->get();

        return view('pages.index', compact('products','categories','product2'));
    }

    public function productDetail($id){
        $product = Product::findOrFail($id);
        $category_id = $product->category_id;
        $lelated_products = Product::where('category_id', $category_id)->where('id','!=',$id)->latest()->get();

        return view('pages.product-details', compact('product', 'lelated_products'));
    }


    public function shopPage(){
        $products = Product::latest()->get();
        $products_pagination = Product::latest()->paginate(9);
        $categories = Category::where('status',1)->latest()->get();

        return view('pages.shop', compact('products', 'categories', 'products_pagination'));
    }

    public function categoryWiseProduct($id){
        $products = Product::where('category_id', $id)->latest()->paginate(9);
        $categories = Category::where('status',1)->latest()->get();

        return view('pages.cat-product', compact('products', 'categories'));
    }

    public function privacyPolicy(){
        return view('pages.footer.privacy');
    }

    public function cookiePolicy(){
        return view('pages.footer.cookie');
    }

    public function purchasePolicy(){
        return view('pages.footer.purchase');
    }

    public function termsCondition(){
        return view('pages.footer.terms-conditions');
    }

    public function contactUs(){
        return view('pages.contact-us');
    }

    public function contactStore(Request $request){
        $request->validate([
            'contact_name' => 'required|max:100',
            'contact_email' => 'required|email|unique:contacts,contact_email|max:100',
            'description' => 'required|max:300',
         ]);

         Contact::insert([
             'contact_name' => $request->contact_name,
             'contact_email' => $request->contact_email,
             'description' => $request->description,
             'created_at' => Carbon::now(),
         ]);

         return Redirect()->back()->with('contact', 'Contact Information Added');
    }
}
