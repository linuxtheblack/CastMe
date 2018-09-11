<?php

namespace App\Http\Middleware;

use Closure;

class ModeratorMiddleware {
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next) {
    if ($request->user() && !in_array($request->user()->role, ['Admin', 'Moderator'])) {
      return redirect()->back()->withErrors([
        ucfirst(__('you do not have sufficient permissions.')),
      ]);
    }

    return $next($request);
  }
}
