<?php

namespace App\Http\Controllers;
use Config;

use DB;
use DataTables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class UserController extends Controller
{
    // Contact Us Listing
    public function index(Request $request)
    {
        $user = User::paginate(10);
        return view('admin.user', compact('user'));
    }

    // Delete Contact list 
    public function delete(Request $request ,$id){
        $model = User::find($id);
        $model->delete();
        $request->session()->flash('message','Contact Deleted Succefully');
        return redirect('admin/user');
    }
}
