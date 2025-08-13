<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Non authentifié.',
                    'redirect' => route('admin.login')
                ], 401);
            }

            return redirect()->route('admin.login')
                ->with('error', 'Vous devez vous connecter pour accéder à cette page.')
                ->with('intended', $request->url());
        }

        return $next($request);
    }
}
