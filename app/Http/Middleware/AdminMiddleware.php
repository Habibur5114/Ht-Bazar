<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
{
    if (!Auth::guard('admin')->check()) {
        return redirect()->route('admin.showLoginForm');
    }

    auth()->shouldUse('admin');

    return $next($request);
}


}
