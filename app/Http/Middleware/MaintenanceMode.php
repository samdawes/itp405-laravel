<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class MaintenanceMode
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
      $mode = DB::table('configurations')->where('name', 'maintenance')->value('value');

      if ($mode == "off") {
        return $next($request);
      }
      else {
        return redirect('/maintenance');
      }
    }
}
