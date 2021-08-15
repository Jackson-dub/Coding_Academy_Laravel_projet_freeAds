<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
       if(Auth::check()){
            if(Auth::user()->is_admin){

            }else{
                return redirect()->back()->with('errorMessage','Acces Denied!.');
            }
       }
       else
       {
           return redirect()->back()->with('errorMessage','Please Login First');
       }
       return $next($request);
    }
}
