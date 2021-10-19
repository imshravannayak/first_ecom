<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=product::all();
        
        
        //return view(admin.category);
        return view('admin.Product',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // echo 'pre';
        // print_r($request->post());
        // die();
        $request->validate([
            'title'=>'required',
            'code'=>'required|unique:coupons',
            'value'=>'required'
        ]);
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Only allow .jpg, .bmp and .png file types.
        ]);
        $model=new product();
        if($request->hasFile('image')){
            $file=$request->file('image');
            
            $extesion=$file->getClientOriginalExtension();
            $filename=time().'.'.$extesion;
            $file->storeAs('public/product',$filename);
            $model->image=$filename;
            
        
         }
        
        $model->category_id=$request->category;
        $model->name=$request->name;
        
        $model->model=$request->model;
        $model->brand=$request->brand;
        $model->short_desc=$request->short_desc;
        $model->desc=$request->desc;
        $model->keywords=$request->keyword;
        $model->technical_specification=$request->specification;
        $model->uses=$request->uses;
        $model->warrenty=$request->warrenty;
        $model->status=$request->slug;
        $model->save();
        $product_id=$model->id;
        /*product attributes get  data  */
        $sku=$request->post('sku');
        ($mrp=$request->post('Mrp'));
        $price=$request->post('Price');
        $qty=$request->post('qty');
        $color=$request->post('color');
        $size=$request->post('size');

        foreach($sku AS $key=>$val){
            $product_attr['product_id']=$product_id;
            $product_attr['sku']=$val;
            $product_attr['mrp']=$mrp[$key];
            $product_attr['price']=$price[$key];
            $product_attr['qty']=$qty[$key];
            $product_attr['color_id']=$color[$key];
            $product_attr['size_id']=$size[$key];
            $product_attr['image']=0;
            

            DB::table('product_attributes')->insert($product_attr);
        }
        /* product_attr close*/
        $request->session()->flash('message','Product added successfully');
        return redirect('admin/Product');
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
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id='')
    {
        
        $result_cat=DB::table('categories')->where(['status'=>1])->get();

        $result1=DB::table('sizes')->where(['status'=>1])->get();
        $result2=DB::table('colors')->where(['status'=>1])->get();
        if($id>0){
            $arr=product::where(['id'=>$id])->get();
            $result['category_id']=$arr[0]->category_id;
            $result['name']=$arr[0]->name;
            $result['model']=$arr[0]->model;
            $result['brand']=$arr[0]->brand;
            $result['short_desc']=$arr[0]->short_desc;
            $result['desc']=$arr[0]->desc;
            $result['keywords']=$arr[0]->keywords;
            $result['technical_specification']=$arr[0]->technical_specification;
            $result['uses']=$arr[0]->uses;
            $result['warrenty']=$arr[0]->warrenty;
            $result['status']=$arr[0]->status;
         }
         else{
            $result['category_id']='';
            $result['name']='';
            $result['model']='';
            $result['brand']='';
            $result['short_desc']='';
            $result['desc']='';
            $result['keywords']='';
            $result['technical_specification']='';
            $result['uses']='';
            $result['warrenty']='';
            $result['status']='';
         }
        return view('admin.manageProduct',compact('result_cat','result1','result2'),$result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
