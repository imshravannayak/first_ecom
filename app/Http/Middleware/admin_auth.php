<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class admin_auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('Admin_login')){
            

            
        }
        else{
            $request->session()->flash('error','Access denied');
            return redirect('admin');
        }
        return $next ($request);
    }
}
