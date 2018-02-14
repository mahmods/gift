<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\DB;
use Closure;

class UserToken
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
		if (!isset($request->token)) {
			return response('Please provide an API token',401);
		} else {
			if (DB::select("SELECT COUNT(*) as count FROM customers WHERE sid = '".$request->token."'")[0]->count > 0) {

				return $next($request);
			} else {
				return response('Invalid API token',401);
			}
		}
    }
}
