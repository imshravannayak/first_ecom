<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('Admin_login')){
            return redirect('admin/dashboard');
            
        }
        else{
      return view('admin.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function auth(Request $request)
    {
        //dd($request->all());
        //$admin_data=admin::all();
        $email=$request->post('email');
        $password=$request->post('password');
        //$auth=admin::where(['email'=>$email,'password'=>$password])->get();
        $auth=admin::where(['email'=>$email])->first();
        if($auth){
            if(hash::check($password,$auth->password)){
            $request->session()->put('Admin_login',true);
            $request->session()->put('Admin_Id',$auth->id);

            return redirect('admin/dashboard');
        }
            else{
                $request->session()->flash('error','please enter valid details');
                return redirect('admin');
            }
        }
        else{
            $request->session()->flash('error','please enter valid details');
            return redirect('admin');
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('admin.dashboard');
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function updatepassword()
    {
        $r=admin::find(1);
       $r->password=hash::make('123456');
       $r->save();
       return $r;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
