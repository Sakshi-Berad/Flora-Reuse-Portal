<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class ManufacturerAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('manufacturer.login');
    }

    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('manufacturer')->check()) {
            return $this->auth->shouldUse('manufacturer');
        }

        $this->unauthenticated($request, ['manufacturer']);
    }
}
