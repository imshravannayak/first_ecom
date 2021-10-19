<?php

namespace App\Http\Controllers;

use App\Models\size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $size=size::all();
        
        
        //return view(admin.category);
        return view('admin.Size',compact('size'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'size'=>'required',
            
        ]);
        $model=new size();
        $model->size=$request->size;
        $model->status=1;
        $model->save();
        $request->session()->flash('message','size added successfully');
        return redirect('admin/Size');
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
    public function show()
    {
        return view('admin.manageSize');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id, request $request)
    {
        $size=size::find($id);
        
        $request->session()->put('editview','editviewpage');
        return view('admin.manageSize',compact('size'));
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'size'=>'required'
            
        ]);
        $model=size::find($request->id);
        $model->size=$request->size;
        $model->status=$request->status;
        $model->save();
        $request->session()->flash('message','size updated successfully');
        $request->session()->forget('editview');
        return redirect('admin/Size');
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
        $size= size::find($id);
        
        $size->delete();
        $request->session()->flash('message','size delete successfully');
        return redirect('admin/Size');
    }

    public function status($status,$id,Request $request)
    {
        $size= size::find($id);
        
        $size->status=$status;
        
        $size->save();
        $request->session()->flash('message','status chaanged successfully');
        return redirect('admin/Size');
    }
}
