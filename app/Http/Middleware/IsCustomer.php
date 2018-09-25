<?php

namespace App\Http\Middleware;

use App\Enums\RoleEnum;
use Closure;
use Auth;

class IsCustomer
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
        if (Auth::user()->getRole() === RoleEnum::CUSTOMER) {
            return $next($request);
        }

        return redirect()->route(Auth::user()->getRole() . '.index');
    }
}