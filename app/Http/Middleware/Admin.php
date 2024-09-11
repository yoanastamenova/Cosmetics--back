<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        \Log::info('Admin Middleware Entered');
        dd('Admin middleware');
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }
        return response()->json('Not authorized!', 401);
    }
}