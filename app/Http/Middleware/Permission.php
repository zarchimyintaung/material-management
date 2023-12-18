<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check()){
            
            if(auth()->user()->roles[0]->name == 'Admin'){
                return $next($request);
            }

            $route = Route::currentRouteName();

            $permissions = auth()->user()->permissions->pluck('name')->toArray();
            // dd($permissions);

            $route = explode('.',$route);
            $route = $route[0];
            array_push($permissions,'welcome');
            array_push($permissions,'user-report');
            if(auth()->user()->roles[0]->name !== 'User'){
                array_push($permissions,'dashboard');
            }
            if(in_array($route,$permissions)){
                return $next($request);
            }     
            abort(401);  
        }
        else{
            return $next($request);
        }

        // return $next($request);
    }
}
