<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    public function handle(Request $request, Closure $next, $userType)
    {
        if (!$request->user() || $request->user()->user_type !== $userType) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}