<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Security;

class BlockIpMiddleware
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
        $data = Security::get();
        $ip = [];
        foreach($data as $key => $value){
            array_push($ip , $value->ip);

        }
        if (!in_array($request->ip(), $ip)) {
            abort(403, "You are restricted to access the site.");
        }
  
        return $next($request);
    }
}
