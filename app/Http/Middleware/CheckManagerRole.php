<?php

namespace App\Http\Middleware;

use App\Models\Manager;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckManagerRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()) {
            $managerRole = Auth::user()->role;
            if($managerRole === 'Manager') {
                return $next($request);
            }
        }
        abort(403);
    }
}
