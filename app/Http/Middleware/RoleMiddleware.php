<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$args)
    {
        if (count($args) === 0) {
            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $user = $request->user();
        $user->load('roles');

        if (count(array_intersect($user->roles->pluck('slug')->toArray(), $args)) === 0) {
            abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
