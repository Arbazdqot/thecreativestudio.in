<?php

namespace App\Http\Controllers;
use Config;

use DB;
use DataTables;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class TeamController extends Controller
{

    // Listing Page
    public function index(Request $request)
    {
        // $team = team::join('images','images.team_id','stories.id')
        // ->take(1)->get();
          
        $team = Team::paginate(10);
        return view('admin.team', compact('team'));
    }

    // Add Page
    public function manageteam(){
        
        return view('admin.manageteam');
    }

    // Store Data in DB
    public function insert(Request $request){
        $fileName = '';
        $request->validate([
            'name'          => 'required',
            'designation'   => 'required',
            'about'         => 'required',
            'image'       => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
        ]);
       
        if(!empty($request->image)){
            $fileName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads'), $fileName);
        }

        $team               = new Team;
        $team->name         = $request->input('name');
        $team->designation  = $request->input('designation');
        $team->about        = $request->input('about');
        $team->image        = $fileName;
        $team->path         = PHOTO_BASE_URL.$fileName;
        $team->save();

        // Save Image
        $request->session()->flash('message','Team Added Succefully');
        return redirect('admin/team'); 

    } 

    // Delete Data 
    public function delete(Request $request ,$id){
        // Delete team
        $model = Team::find($id);
        $model->delete();
      
        $request->session()->flash('message','Team Deleted Succefully');
        return redirect('admin/team');
    }

    // Edit Page 
    public function teamedit($id){
        $team = Team::find($id);
       
        return view('admin.teamedit',compact('team'));

    }

    // Store Edit Data 
    public function update(Request $request){
        $fileName = '';
        $id       = $request->input('id');

        if(!empty($request->image)){
            $fileName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads'), $fileName);
        }else{
            $image = $request->input('img');
            $fileName  = $image;
        }
    
        // team Update
        $id                 = $request->input('id');
        $team               = Team::findOrFail($id);
        $team->name         = $request->input('name');
        $team->designation  = $request->input('designation');
        $team->about        = $request->input('about');
        $team->image        = $fileName;
        $team->path         = PHOTO_BASE_URL.$fileName;
        $team->save();
        $request->session()->flash('message','Team Updated Succefully');
        return redirect('admin/team');
    }

   

   
}
