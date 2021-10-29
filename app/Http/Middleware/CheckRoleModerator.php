<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckRoleModerator
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
		$role = Auth::guard('admin')->user()->role;
		if ($role == 'moderator')
			return redirect('admin/dashboard');
		return $next($request);
	}
}
