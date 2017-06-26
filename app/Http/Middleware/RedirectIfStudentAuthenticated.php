<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class RedirectIfStudentAuthenticated
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
        if (Auth::guard('student')->check()) {
            return redirect()->route('student.dashboard');
        }
        return $next($request);
    }
}
