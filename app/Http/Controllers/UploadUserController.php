<?php

namespace App\Http\Controllers;
use Config;

use DB;
use DataTables;
use App\Models\UploadUser;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Response;


class UploadUserController extends Controller
{
    // Contact Us Listing
    public function index(Request $request)
    {
        $uploaduser = UploadUser::paginate(10);
        return view('admin.uploaduser', compact('uploaduser'));
    }

    public function managestory(){
        return view('admin.managestory');
    }

    public function insert(Request $request){
        $fileName = '';
        $request->validate([
            'name'       => 'required',
            'file'       => 'required|mimes:zip'
        ]);
        $name = $request->input('name');
        if(!empty($request->file)){
            $fileName = $name.time().'.'.$request->file->extension();  
            $request->file->move(public_path('userfile'), $fileName);
        }

        $file       = new UploadUser;
        $file->name = $name;
        $file->file = $fileName;

        $file->save();
        
        $request->session()->flash('message','Story Added Succefully');
        return redirect('admin/uploaduser'); 

    }
    // Delete Contact list 
    public function delete(Request $request ,$id){
        $model = UploadUser::find($id);
        $model->delete();
        $request->session()->flash('message','File Deleted Succefully');
        return redirect('admin/uploaduser');
    }

    public function download($filename){
    	$file_path = public_path('userfile') . "/" . $filename;
            return Response::download($file_path);
    }
}
