<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BelongsToSchoolMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (
            !$user->roles->contains('slug', '=', 'superadmin') &&
            $user->school_id !== $request->route('school')->id
        ) {
            abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
