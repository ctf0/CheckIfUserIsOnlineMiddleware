<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfUserIsOnlineMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $expiresAt = now()->addMinutes(5);
            
            app('cache')->put('user-is-online-' . auth()->user()->id, true, $expiresAt);
        }

        return $next($request);
    }
}
