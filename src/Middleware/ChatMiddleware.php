<?php

namespace MilSonUno\Chat\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use MilSonUno\Chat\Facades\Chat;

class ChatMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            Chat::setAuthUserId(Auth::guard($guard)->user()->id);
        }

        return $next($request);
    }
}
