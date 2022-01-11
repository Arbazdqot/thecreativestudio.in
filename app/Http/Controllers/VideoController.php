<?php

namespace App\Http\Controllers;
use Config;

use DB;
use DataTables;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class VideoController extends Controller
{
   
    // Listing Data page
    public function index(Request $request)
    {
        $video = Video::paginate(10);
        return view('admin.video', compact('video'));
    }

    // ADD Data  Page
    public function managevideo(){
        
        return view('admin.managevideo');
    }

    // Data Store
    public function insert(Request $request){
       
        $request->validate([
            'title'       => 'required',
            'url'         => 'required',
        ]);
   
        $video            = new Video;
        $video->title     = $request->input('title');
        $video->url       = $request->input('url');
        if($request->input('recent')==0){
            $video->recent = $request->input('recent');
        }else{
            $video->recent = 1;
        }
        $video->status     = 1;
        $video->save();
       
        $request->session()->flash('message','Video Added Succefully');
        return redirect('admin/video'); 

    }

    // Data delete
    public function delete(Request $request ,$id){
        $model = Video::find($id);
        $model->delete();
        $request->session()->flash('message','Video Deleted Succefully');
        return redirect('admin/video');
    }

    // Edit Page
    public function videoedit($id){

        $video = Video::find($id);
        return view('admin.videoedit',compact('video'));
    }


    // Data Edit 
    public function update(Request $request){
       
        $id              = $request->input('id');
        $Video           = Video::findOrFail($id);
        $video->title    = $request->input('title');
        $video->url      = $request->input('url');
        if($request->input('recent')==0){
            $video->recent    = $request->input('recent');
        }else{
            $video->recent    = 1;
        }
        $video->save();
        $request->session()->flash('message','Video Updated Succefully');
        return redirect('admin/video');
    }

    // Data Status
    public function status(Request $request,$status,$id){
        $model = video::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message','Video Status Updated');
        return redirect('admin/video');
    }
}
