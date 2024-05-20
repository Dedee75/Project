<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CustomerCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth('customer')->check()){

            if(auth('customer')->check())
            {
                // if(auth('admin')->user()->role->name == 'Admin'){
                    return $next($request);

                // }
            }
            else{
                return redirect('/customer/login')->with('error','You don\'t have Customer Access!');


            }
        }
        return redirect('/customer/login')->with('error','You don\'t have Customer Access!');

    }
}
