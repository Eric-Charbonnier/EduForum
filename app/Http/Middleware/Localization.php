<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Localization
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
    // $locale = $request->segment(1);
    // if (in_array($locale, ['fr', 'en'])) {
    //     app()->setLocale($locale);
    // }
    // return $next($request);

    if (session()->has('locale')) {
      App::setLocale(session()->get('locale'));
    }
    return $next($request);
  }
}
