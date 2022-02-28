<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    
    public function index()
    {
        $coupon = Coupon::paginate(10);
        return view('admin.coupon', compact('coupon'));
    }

   
    public function manageCoupon()
    {
        return view('admin.manageCoupon');
    }

    public function insert(Request $request){
        $request->validate([
            'title'=>'required',
            'code'=>'required',
            'value'=>'required',

        ]);
        $Coupon                = new Coupon;
        $Coupon->title         = $request->input('title');
        $Coupon->code          = $request->input('code');
        $Coupon->value         = $request->input('value');
        $Coupon->status        = 1; 
        $Coupon->save();
        $request->session()->flash('message','Coupon Added Succefully');
        return redirect('admin/coupon');
    }

    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('Admin.cedit', compact('coupon'));
    }

    public function update(Request $request)
    {
        $id                    = $request->input('id');
        $Coupon                = Coupon::findOrFail($id);
        $Coupon->title         = $request->input('title');
        $Coupon->code          = $request->input('code');
        $Coupon->value         = $request->input('value');
        $Coupon->save();
        $request->session()->flash('message','Coupon Updated Succefully');
        return redirect('admin/coupon');
    }

    public function delete(Request $request ,$id){
        $model = Coupon::find($id);
        $model->delete();
        $request->session()->flash('message','Coupon Deleted Succefully');
        return redirect('admin/coupon');
    }

    public function status(Request $request,$status,$id){
        $model = Coupon::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message','Coupon Status Updated');
        return redirect('admin/coupon');
    }
}
