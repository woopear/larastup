<?php

namespace App\Http\Middleware;

use App\Contracts\RoleInterface;
use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * if user has admin role, it's OK else forbiden.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if user has role admin
        if (auth()->user()->role->libelle == RoleInterface::admin) {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
