<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $userRole = auth()->user()->role?->nom;

        if (!$userRole || !in_array($userRole, $roles)) {
            abort(403, 'Accès refusé. Vous n\'avez pas les autorisations nécessaires.');
        }

        return $next($request);
    }
}