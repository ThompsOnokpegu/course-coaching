<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        //dd($request->user()->role == $role);
        if($request->user()->role == $role){
            return $next($request);
        }
        
        return redirect()->route('profile')->with('error','You need higher privilege to access this content');
    }
}
