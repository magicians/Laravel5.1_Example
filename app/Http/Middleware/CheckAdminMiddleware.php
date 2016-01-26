<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $isAdmin)
    {

        if (!Auth::check()) {
            return redirect('/login');
        } elseif (Auth::user()->isAdmin() !== (bool)$isAdmin) {
            abort(403);
        }
        return $next($request);
    }
}
