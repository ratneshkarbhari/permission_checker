<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ipchecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // if(!in_array($_SERVER['REMOTE_ADDR'],['45.64.206.210','114.143.194.18','::1'])){
        //     echo "Access not allowed";
        //     exit;
        // }

        return $next($request);
    }
}
