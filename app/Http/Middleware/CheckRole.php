<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
		$roleAdmin = Auth::guard('admin')->user()->role;
		if ($roleAdmin != 'admin')
			return redirect('admin/dashboard');
		return $next($request);
	}
}
