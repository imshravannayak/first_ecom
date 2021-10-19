<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $category=category::all();
        
        
        //return view(admin.category);
        return view('admin.category',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeCategory(Request $request)
    { 
        $request->validate([
            'category_name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
        $model=new category();
        $model->category_name=$request->category_name;
        $model->slug=$request->slug;
        $model->save();
        $request->session()->flash('message','category added successfully');
        return redirect('admin/category');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manageCategory(Request $request)
    {
        return view('admin.manageCategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category,$id,Request $request)
    {
        $category=category::find($id);
        
        $request->session()->put('editview','editviewpage');
        return view('admin.manageCategory',compact('category'));
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {

        
        $request->validate([
            'category_name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
        $model=category::find($request->id);
        $model->category_name=$request->category_name;
        $model->slug=$request->slug;
        $model->status=1;
        $model->save();
        $request->session()->flash('message','category updated successfully');
        $request->session()->forget('editview');
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
       
    }
    public function delete($id,Request $request)
    {
        $category= category::find($id);
        
        $category->delete();
        $request->session()->flash('message','category delete successfully');
        return redirect('admin/category');
    }
    public function status($status,$id,Request $request)
    {
        $category= category::find($id);
        
        $category->status=$status;
        
        $category->save();
        $request->session()->flash('message','status chaanged successfully');
        return redirect('admin/category');
    }
}
