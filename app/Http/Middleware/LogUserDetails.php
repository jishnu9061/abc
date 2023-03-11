<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogUserDetails
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            \Log::info("User {$user->name} ({$user->email}) viewed {$request->getRequestUri()}");
        }

        return $next($request);
    }
}
