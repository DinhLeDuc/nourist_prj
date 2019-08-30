<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HostAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @param string  $guard
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed|\Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->group_id != 2) {
            return response('Bạn không có quyền truy cập vào trang này.', 403);
        }

        return $next($request);
    }
}
