<?php

namespace App\Http\Controllers;

use App\Models\color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $color=color::all();
        
        
        //return view(admin.category);
        return view('admin.color',compact('color'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'color'=>'required',
            
        ]);
        $model=new color();
        $model->color=$request->color;
        $model->status=1;
        $model->save();
        $request->session()->flash('message','color added successfully');
        return redirect('admin/Color');
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
        return view('admin.manageColor');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id, request $request)
    {
        $color=color::find($id);
        
        $request->session()->put('editview','editviewpage');
        return view('admin.manageColor',compact('color'));
        
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
            'color'=>'required'
            
        ]);
        $model=color::find($request->id);
        $model->color=$request->color;
        $model->status=$request->status;
        $model->save();
        $request->session()->flash('message','color updated successfully');
        $request->session()->forget('editview');
        return redirect('admin/Color');
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
        $color= color::find($id);
        
        $color->delete();
        $request->session()->flash('message',' color deleted successfully');
        return redirect('admin/Color');
    }

    public function status($status,$id,Request $request)
    {
        $color= color::find($id);
        
        $color->status=$status;
        
        $color->save();
        $request->session()->flash('message','status chaanged successfully');
        return redirect('admin/Color');
    }
}
