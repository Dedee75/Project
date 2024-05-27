<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth('admin')->check())
        {

            if (auth('admin')->check())
            {
                //return redirect()-> route('admin.dashboard');
                return $next($request);
            }
            else
            {
               // return redirect('home')->with('error', 'You don\'tave admin access'); ->with so session send

                return redirect('/admin/login')->with('error','You don\'t have Admin Access!');
            }
        }

        return redirect('/admin/login')->with('error','You don\'t have Admin Access!');
    }
}
