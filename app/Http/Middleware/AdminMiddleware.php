<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Closure $next)
    {
      if (Auth::user()->is_admin != 1)
      {
        return redirect()->route('home');
      }
        return $next();
    }
}
