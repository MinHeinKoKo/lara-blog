<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Testing
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

        $acceptedUser = [1,11];

        if (Auth::id()<=10){
            return abort(404) ;
        }

//        if (!in_array(Auth::id(),$acceptedUser)){
//            return abort(404);
//
//        }
//        logger("I'm Logger:" . $request->url());
        return $next($request); //to next Step
    }
}
