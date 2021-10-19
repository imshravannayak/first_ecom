<?php

namespace App\Http\Controllers;

use App\Models\coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon=coupon::all();
        
        
        //return view(admin.category);
        return view('admin.coupon_index',compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'code'=>'required|unique:coupons',
            'value'=>'required'
        ]);
        $model=new coupon();
        $model->title=$request->title;
        $model->code=$request->code;
        $model->value=$request->value;
        $model->save();
        $request->session()->flash('message','coupon added successfully');
        return redirect('admin/Coupon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(coupon $coupon)
    {
        return view('admin.coupon');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id, request $request)
    {
        $coupon=coupon::find($id);
        
        $request->session()->put('editview','editviewpage');
        return view('admin.coupon',compact('coupon'));
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coupon $coupon)
    {
        $request->validate([
            'title'=>'required',
            'value'=>'required'
        ]);
        $model=coupon::find($request->id);
        $model->title=$request->title;
        $model->value=$request->value;
        $model->code=$request->code;
        $model->status=1;
        $model->save();
        $request->session()->flash('message','coupon updated successfully');
        $request->session()->forget('editview');
        return redirect('admin/Coupon');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        //dd($id);
        $coupon= coupon::find($id);
        
        $coupon->delete();
        $request->session()->flash('message','coupon delete successfully');
        return redirect('admin/Coupon');
    }

    public function status($status,$id,Request $request)
    {
        $coupon= coupon::find($id);
        
        $coupon->status=$status;
        
        $coupon->save();
        $request->session()->flash('message','status chaanged successfully');
        return redirect('admin/Coupon');
    }
}
