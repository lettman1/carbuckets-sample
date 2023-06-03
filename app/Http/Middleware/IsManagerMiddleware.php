<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->check() 
            || (auth()->user()->role_id !== Role::IS_MANAGER && auth()->user()->role_id !== ROLE::IS_ADMIN) 
        ) {
            abort(403);
        }
        
        return $next($request);
    }
}
