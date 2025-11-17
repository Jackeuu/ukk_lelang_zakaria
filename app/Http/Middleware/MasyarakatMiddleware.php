<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MasyarakatMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (!session()->has('level') || session('level') !== 'masyarakat') {
            return redirect('/login_masyarakat');
        }

        return $next($request);
    }

}
