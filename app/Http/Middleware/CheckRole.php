<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (! Auth::check()) {
            if ($request->expectsJson() || $request->is('api/*')) {
                return response()->json(['message' => 'Non authentifié.'], 401);
            }

            return redirect()->route('login');
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $userRole = $user->role?->nom;

        // Map authentic Arabic string names to backend role logical keys
        $mappedRole = match($userRole) {
            'مواطن', 'ممثل الشخص المعنوي' => 'citoyen',
            'مهندس معماري', 'مهندس مساح طوبوغرافي', 'مهندس مختص' => 'architecte',
            'ممثل منعش عقاري', 'ممثل جماعة ترابية', 'عضو اللجنة', 'ممثل متعهد شركة الاتصالات', 'ممثل متعهد شركة شبكات الماء والكهرباء' => 'agent_urbanisme',
            'administrateur' => 'administrateur',
            default => $userRole,
        };

        if (! $mappedRole || ! in_array($mappedRole, $roles, true)) {
            if ($request->expectsJson() || $request->is('api/*')) {
                return response()->json(['message' => 'Accès refusé.'], 403);
            }

            abort(403, 'Accès refusé. Vous n\'avez pas les autorisations nécessaires.');
        }

        return $next($request);
    }
}
