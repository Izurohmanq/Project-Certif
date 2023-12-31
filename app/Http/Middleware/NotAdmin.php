<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class NotAdmin
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    if (!Auth::guest()) {
      if (Auth::user()->is_admin) {
        return redirect(route('users.index'));
      } else {
        return $next($request); //not_admin
      }
    } else {
      return $next($request); //guest
    }
  }
}
