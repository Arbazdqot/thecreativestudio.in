<?php

namespace App\Http\Controllers;
use Config;

use DB;
use DataTables;
use App\Models\Admin;
use App\Models\User;
use App\Models\Video;
use App\Models\Story;
use App\Models\UploadUser;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            return $this->dashboard();
        }else{
            $request->session()->flash('error','Excess Denied');
            return view('admin.login');
        }
        return view('admin.login');
    }

    public function auth(Request $request){
        // return $request->post();
        $email=$request->post('email');
        $pass=$request->post('password');

        //$result=Admin::where(['email'=>$email,'password'=>$pass])->get();
        $result=Admin::where(['email'=>$email])->first();
       
        if($result){
            if(Hash::check($request->post('password'),$result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                return $this->dashboard();
            }else{
                $request->session()->flash('error','please Enter  Valid Password.');
                return redirect('admin');
            }
            
        }else{
            $request->session()->flash('error','please Enter  Valid Email.');
            return redirect('admin');
        }
        
    }

    public function dashboard(){
        $enquiry = User::all();
        $video   = Video::all();
        $story   = Story::all();
        $upload  = UploadUser::all();
        // print_r($enquiry);die;
        return view('admin.dashboard',compact('enquiry','upload','story','video'));
    }

    public function updatepassword(){
       
        return view('admin.updatepassword');
    }

    public function store(Request $request){


        $request->validate([
            'current_pass' => 'required',
            'new_pass' => 'required|min:6',
            'confirm_pass' => 'required|same:new_pass',
        ]);
        $user = Admin::find(1);
      
        
        if (!Hash::check($request->input('current_pass'), $user->password)) {
            $request->session()->flash('error','please Enter Current Password.');
        }

        $user->password = bcrypt($request->input('new_pass'));
        $user->save();

        return $this->dashboard();
    }
   
}
