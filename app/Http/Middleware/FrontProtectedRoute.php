<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontProtectedRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return response(['Forbidden'], 403);
        }

        $route = request()->route();

        if ($route->uri == 'home') {
            return $next($request);
        }else{
            foreach ($user->menu as $key => $value) {
                $teste = explode('.', $value->link);
                $str = $teste[0];
                if (strpos($str, $route->uri) !== false) {
                    return $next($request);
                }
            }
            foreach ($user->menu as $key => $value) {
                $link = explode('.', $value->link);
                $url = explode('/', $route->uri);
                if ($link[0] == $url[0]) {
                    return $next($request);
                }
            }
        }

        return response(['Forbidden'], 403);

        return $next($request);
    }
}
