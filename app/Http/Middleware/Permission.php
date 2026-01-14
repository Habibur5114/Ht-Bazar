<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Permission
{
    public function handle(Request $request, Closure $next): Response
    {

        $auth = auth()->guard('admin');

        if (! $auth->check()) {
            return redirect()->route('admin.login');
        }

        $admin = $auth->user();

        if ($admin->id === 1 || $admin->hasRole('Super Admin')) {
            return $next($request);
        }

        $currentRouteName = $request->route()->getName();
        $excludedRoutes = ['admin.dashboard', 'admin.logout'];

        if (in_array($currentRouteName, $excludedRoutes)) {
            return $next($request);
        }

        if (! $admin->hasPermissionTo($currentRouteName)) {
            abort(403, 'Sorry! You do not have permission to access: '.$currentRouteName);
        }

        return $next($request);
    }
}
