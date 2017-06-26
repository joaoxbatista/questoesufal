<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateStudent
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
        if(! Auth::guard('student')->check()):
          return redirect()->route('student.dashboard');
        endif;

        return $next($request);
    }
}
