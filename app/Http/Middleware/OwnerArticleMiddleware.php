<?php

namespace App\Http\Middleware;

use App\Article;
use Illuminate\Support\Facades\Auth;

use Closure;

class OwnerArticleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $article = Article::findOrFail($request->article);
        
        if ($article->user_id !== Auth::id()) {
            abort(401);
        }
        return $next($request);
    }
}
