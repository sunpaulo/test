<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->getRole() === Role::ADMIN) {
            return $next($request);
        }

        return redirect()->route(Auth::user()->getRole() . '.index');
    }
}
