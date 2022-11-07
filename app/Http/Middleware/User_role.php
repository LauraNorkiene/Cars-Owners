<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class User_role
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
        if ($request->user()==null){
            return redirect('/cars');
        }

        if (Gate::denies('edit')){
            return redirect('/cars');
        }

        return $next($request);
    }

}
