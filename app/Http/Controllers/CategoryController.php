<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $category = Category::paginate(10);
        return view('admin.category', compact('category'));
    }

   
    public function managecategory()
    {
        return view('admin.managecategory');
    }

    public function insert(Request $request){
        $request->validate([
            'category_name'=>'required',
        ]);
        // print_r($error);die;
        $category                = new Category;
        $category->category_name = $request->input('category_name');
        $category->save();
        $request->session()->flash('message','Category Added Succefully');
        return redirect('admin/category');
    }
 
    public function categoryedit($id)
    {
        $category = Category::find($id);
        return view('admin.categoryedit', compact('category'));
        // return $category;
    }

    public function update(Request $request )
    {
        $id                         = $request->input('id');
        $category                   = Category::findOrFail($id);
        $category->category_name    = $request->input('category_name');
        $category->save();
        $request->session()->flash('message','Category Updated Succefully');
        return redirect('admin/category');
    }

    public function delete(Request $request ,$id){
        $model = Category::find($id);
        $model->delete();
        $request->session()->flash('message','Category Deleted Succefully');
        return redirect('admin/category');
    }
    
}
