<?php

namespace App\Http\Controllers;
use Config;

use DB;
use DataTables;
use App\Models\Story;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tinify\Tinify;

class StoryController extends Controller
{

    // Listing Page
    public function index(Request $request)
    {
        $story = DB::table('categories')
            ->join('stories','categories.id',"=",'stories.category_id')
            ->paginate(10);
        return view('admin.story', compact('story'));
    }

    // Add Page
    public function managestory(){
        $category = Category :: select('category_name','id')->where(['is_deleted'=>0])->get();
        return view('admin.managestory',compact('category'));
    }

    // Store Data in DB
    public function insert(Request $request){
        $fileName = '';
        $request->validate([
            'category_id' => 'required',
            'title'       => 'required',
            'image'       => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
        ]);
  
        if(!empty($request->image)){
            $fileName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads'), $fileName);
        }
   
        // Save Story
        $story              = new Story;
        $story->category_id = $request->input('category_id');
        $story->title       = $request->input('title');
        $story->sub_title   = $request->input('sub_title');
        $story->status      = 0;
        if($request->input('recent')==0 && $request->input('recent') != '' ){
            $story->recent  = $request->input('recent') ;
        }else{
            $story->recent  = 1;
        }
        
        $story->save();

        // Save Image
        $id = $story->id;
        $image              = new Image();
        $image->story_id    = $id;
        $image->image_name  = $fileName;
        $image->path        = PHOTO_BASE_URL.$fileName;
        $image->save();
        $request->session()->flash('message','Story Added Succefully');
        return redirect('admin/story'); 

    } 

    // Delete Data 
    public function delete(Request $request ,$id){
        // Delete Story
        $model = Story::find($id);
        $model->delete();
      
        // Delete Image
        $image = Image::where(['story_id'=>$model->id])->delete();
        
        $request->session()->flash('message','Story Deleted Succefully');
        return redirect('admin/story');
    }

    // Edit Page 
    public function storyedit($id){
        $category = Category :: select('category_name','id')->where(['is_deleted'=>0])->get();
        $story = Story::find($id);
        $image = Image::select('image_name')->find(['story_id'=>$id]);
       
        return view('admin.storyedit',compact('story','image','category'));

    }

    // Store Edit Data 
    public function update(Request $request){
        $fileName = '';
        $id       = $request->input('id');
        if(!empty($request->image)){
            $fileName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads'), $fileName);
        }else{
            $image     = $request->input('img');
            $fileName  = $image;
        }
    
        // Image Update 
        $image              = Image::findOrFail($id);
        $image->story_id    = $id;
        $image->image_name  = $fileName;
        $image->path        = PHOTO_BASE_URL.$fileName;
        $image->save();

        // Story Update
        $id                         = $request->input('id');
        $story                      = Story::findOrFail($id);
        if($request->input('category_id') != '' ){
            $story->category_id     = $request->input('category_id');
        }else{
            $story->category_id     = $request->input('id');
        }
        
        $story->title               = $request->input('title');
        $story->sub_title           = $request->input('sub_title');
      
        if($request->input('recent')== 0 && $request->input('recent') != ''){
            
        }else{
            $story->recent  = 0;
        }
        $story->update();
        $request->session()->flash('message','Story Updated Succefully');
        return redirect('admin/story');
    }

    // Status Update
    public function status(Request $request,$status,$id){
        $model = Story::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message','Story Status Updated');
        return redirect('admin/story');
    }

    // Gallery page
    public function gallery($id){
      
        $gallery = Image::where(['story_id'=>$id])
                        ->get();
        return view('admin.gallery',compact('gallery','id'));
    }

    // Store Gallery Image
    public function galleryinsert(Request $request){
        
        $fileName = '';
        $request->validate([
            'image'       => 'required',
            'image.*'    => 'mimes:jpeg,png,jpg,gif,svg,pdf,csv',
        ]);
        
        if($request->hasfile('image')){
            foreach($request->file('image') as $file){

                $fileName     = time().'.'.$file->getClientOriginalName();
                // compress_image(PHOTO_BASE_URL,$fileName);
                $file->move(public_path('uploads'), $fileName);
                $imgData[]  = $fileName;
                $image              = new Image();  
                $image->story_id    = $request->input('id');;
                $image->image_name  = $fileName;;
                $image->path        = PHOTO_BASE_URL.$fileName;
                $image->save();

               
            }

            
            // $fileName = time().'.'.$request->image->extension();  
            // $request->image->move(public_path('uploads'), $fileName);
            $request->session()->flash('message','Image Added Succefully');
            return redirect()->back()->with('message','Image Added Succefully');
        }
       
        $request->session()->flash('message','Image Not Added Succefully');
            // return redirect('admin/story');
        return redirect()->back()->with('message','Image Not Added Successful !');
    }

    public function imgdelete(Request $request ,$id){
        $image = Image::where(['id'=>$id])->delete();
        
        $request->session()->flash('message','Story Deleted Succefully');
        return redirect()->back()->with('message','Image Deleted Succefully');
    }
}
