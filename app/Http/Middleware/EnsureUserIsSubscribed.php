<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if(auth()->guard('web')->user() && auth()->guard('web')->user()->is_subscribed && auth()->guard('web')->user()->subscription_end_date > now()){

            return $next($request);
        }

        return redirect()->route('profile')->with('error','Please subscribe to access this content');
    }
}
