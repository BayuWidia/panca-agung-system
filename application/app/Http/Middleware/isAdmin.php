<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;

class isAdmin
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
      // 0 Untuk ADMIN
      if(session('level') == 1 || session('level') == 2)
      {
        return $next($request);
      }

      return new RedirectResponse(url('/'));
    }
}
