<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$types)
    {
        $user = $request->user();
        if (!$user){
            return redirect()->route('login');
        }
        if(! in_array($user->type, $types)){
            abort(403);
        }
        // ...$types is a Function Variable Arguments List work as Unpacking of array at calling this middleware and passed argument in it.
        // closure function in variable $next work as if the current middleware after check from request there is not any problems and request continue to next step.
        // and Middleware must return response by pass the response to next closure function variable.
        return $next($request);
    }
}
