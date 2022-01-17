<?php

namespace App\Http\Controllers;
use Config;

use DB;
use DataTables;
use App\Models\Banner;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tinify\Tinify;

class BannerController extends Controller
{
   
    public function index(Request $request)
    {
        $banner = Banner::paginate(10);
        return view('admin.banner', compact('banner'));
    }

    public function managebanner(){
        return view('admin.managebanner');
    }

    public function insert(Request $request){
        $fileName = '';
        $request->validate([
            'image'     => 'required',
            'image *'   => 'mimes:jpeg,png,jpg,gif,svg,pdf,csv'
        ]);
        // print_r($request->image);die;
        if($request->hasfile('image')){
            foreach($request->file('image') as $file){

                $fileName     = time().'.'.$file->getClientOriginalName();
                // compress_image(PHOTO_BASE_URL,$fileName);
                $file->move(public_path('uploads'), $fileName);
                $imgData[]  = $fileName;
                $banner                = new banner;
                $banner->image         = $fileName;
                $banner->path          = PHOTO_BASE_URL.$fileName;
                $banner->status        = 0;
                if($request->input('recent')==0 && $request->input('recent') != ''){
                    $banner->recent    = $request->input('recent');
                    $message           = "Banner Is Added Succefully";
                }else{
                    $banner->recent    = '1';
                    $message           =  "Image Is Added Succefully";
                }
                $banner->save();

               
            }

            // print_r(json_encode($imgData));die;
            
            // $fileName = time().'.'.$request->image->extension();  
            // $request->image->move(public_path('uploads'), $fileName);
            $request->session()->flash('message',$message);
            return redirect('admin/banner');
        }


        // if(!empty($request->image)){
        //     $fileName = time().'.'.$request->image->extension();  
        //     $request->image->move(public_path('uploads'), $fileName);
        // }
       
        
       
        $request->session()->flash('message','Image Not Added');
        return redirect('admin/banner'); 

    }

    public function delete(Request $request ,$id){
        $model = Banner::find($id);
        $model->delete();
        $request->session()->flash('message','Banner Deleted Succefully');
        return redirect('admin/banner');
    }

    public function banneredit($id){
        $banner = Banner::find($id);
        return view('admin.banneredit',compact('banner'));

    }

    public function update(Request $request){
        $fileName = '';
        $id       = $request->input('id');
        // print_r($request->input('img'));die;
        if(!empty($request->banner_img)){
            $fileName = time().'.'.$request->banner_img->extension();  
            $request->banner_img->move(public_path('uploads'), $fileName);
        }else{
            $fileName = $request->input('img');
        }
    
        // banner Update
        $banner               = banner::findOrFail($id);
        $banner->banner_title   = $request->input('banner_title');
        $banner->banner_img     = $fileName;
        $banner->path        = PHOTO_BASE_URL.$fileName;
        $banner->banner_desc    = $request->input('banner_desc');
        if($request->input('recent')==0){
            $banner->recent   = $request->input('recent');
        }else{
            $banner->recent    = 1;
        }
        $banner->save();
        $request->session()->flash('message','banner Updated Succefully');
        return redirect('admin/banner');
    }

    public function status(Request $request,$status,$id){
        $model = Banner::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message','banner Status Updated');
        return redirect('admin/banner');
    }

    
}
