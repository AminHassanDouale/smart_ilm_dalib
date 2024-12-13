<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LogResourceAccess
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            Log::info('Accessing Resources Route', [
                'user_id' => Auth::id(),
                'email' => Auth::user()->email
            ]);
        }

        return $next($request);
    }
}
