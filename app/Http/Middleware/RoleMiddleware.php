<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     public function handle(Request $request, Closure $next, $user_type)
    {
        if(auth()->check() && auth()->user()->user_type === $user_type){
        return $next($request);
    }
    session()->flash('error', 'Acesso não autorizado');
    return redirect()->route('login');
    }
}
