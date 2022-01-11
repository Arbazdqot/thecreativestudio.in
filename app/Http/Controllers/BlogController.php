<?php

namespace App\Http\Controllers;
use Config;

use DB;
use DataTables;
use App\Models\Blog;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class BlogController extends Controller
{
   
    public function index(Request $request)
    {
        $blog = Blog::paginate(10);
        return view('admin.blog', compact('blog'));
    }

    public function manageblog(){
        return view('admin.manageblog');
    }

    public function insert(Request $request){
        $fileName = '';
        $request->validate([
            'blog_title'     => 'required',
            'blog_desc'      => 'required',
        ]);
        // print_r($request->image);die;
        if(!empty($request->blog_img)){
            $fileName = time().'.'.$request->blog_img->extension();  
            $request->blog_img->move(public_path('uploads'), $fileName);
        }
       
        $Blog              = new Blog;
        $Blog->blog_title  = $request->input('blog_title');
        $Blog->blog_img    = $fileName;
        $Blog->path        = PHOTO_BASE_URL.$fileName;
        $Blog->blog_desc   = $request->input('blog_desc');
        $Blog->status      = 0;
        if($request->input('recent')==0 && $request->input('recent') != ''){
            $Blog->recent    = $request->input('recent');
        }else{
            $Blog->recent    = 1;
        }
        $Blog->save();
       
        $request->session()->flash('message','Blog Added Succefully');
        return redirect('admin/blog'); 

    }

    public function delete(Request $request ,$id){
        $model = Blog::find($id);
        $model->delete();
        $request->session()->flash('message','Blog Deleted Succefully');
        return redirect('admin/blog');
    }

    public function blogedit($id){
        $blog = Blog::find($id);
        return view('admin.blogedit',compact('blog'));

    }

    public function update(Request $request){
        $fileName = '';
        $id       = $request->input('id');
        // print_r($request->input('img'));die;
        if(!empty($request->blog_img)){
            $fileName = time().'.'.$request->blog_img->extension();  
            $request->blog_img->move(public_path('uploads'), $fileName);
        }else{
            $fileName = $request->input('img');
        }
    
        // Blog Update
        $Blog               = Blog::findOrFail($id);
        $Blog->blog_title   = $request->input('blog_title');
        $Blog->blog_img     = $fileName;
        $Blog->path        = PHOTO_BASE_URL.$fileName;
        $Blog->blog_desc    = $request->input('blog_desc');
        if($request->input('recent')==0){
            $Blog->recent   = $request->input('recent');
        }else{
            $Blog->recent    = 1;
        }
        $Blog->save();
        $request->session()->flash('message','Blog Updated Succefully');
        return redirect('admin/blog');
    }

    public function status(Request $request,$status,$id){
        $model = Blog::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message','Blog Status Updated');
        return redirect('admin/blog');
    }

    
}
