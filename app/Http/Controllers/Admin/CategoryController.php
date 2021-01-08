<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $categories = Category::latest()->get();

        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
           'category_name' => 'required|unique:categories,category_name',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->back()->with('success', 'Successfully Category Added');
    }

    public function edit($id){
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request){
        $id = $request->id;

       Category::find($id)->update([
            'category_name' => $request->category_name,
            'updated_at' => Carbon::now(),
       ]);

        return Redirect()->route('admin.category')->with('updated',  $request->category_name.' updated');
    }

    public function delete($id){
        Category::find($id)->delete();

        return Redirect()->back()->with('delete', 'Category Successfully Deleted');
    }

    public function inactive($id){
        Category::find($id)->update(['status'=>0]);

        return Redirect()->back()->with('update', 'Category Successfully Inactive');
    }

    public function active($id){
        Category::find($id)->update(['status'=>1]);

        return Redirect()->back()->with('update', 'Category Successfully Active');
    }

}
