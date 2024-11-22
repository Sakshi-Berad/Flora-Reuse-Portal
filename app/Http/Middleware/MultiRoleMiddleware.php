<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
class MultiRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {      
        $user = Auth::user();

          // Check if the user has one of the allowed roles
        if (!in_array($user->userrole->name, $roles)) {
            // If the user does not have access, redirect or abort
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
