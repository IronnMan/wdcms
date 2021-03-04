<?php

namespace App\Http\Middleware;

use App\Exceptions\TenantModuleException;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VerifyTenantPermission
{
    public function handle(Request $request, Closure $next, $module)
    {
        // 登录要求
        if(!Auth::check()) {
            throw new AuthenticationException(
                'Unauthenticated.'
            );
        }

        //角色要求
        if(!$request->user()->hasRole('admin')) {
            return redirect()->back()->with('msg', 'Role Not Match');
        }

        // 模块要求
        if(!tenant()->checkModule($module)) {
            throw new TenantModuleException(
                trans('no permission to enter').Str::studly($module)
            );
        }

        return $next($request);
    }
}
