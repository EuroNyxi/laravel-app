<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureOnboardingIsCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user && !$this->isOnboardingCompleted($user)) {
            if (!$request->routeIs('onboarding.*')) {
                return redirect()->route('onboarding.index');
            }
        }

        return $next($request);
    }

    private function isOnboardingCompleted($user): bool
    {
        // Onboarding gilt als abgeschlossen, wenn API-Key und Agent-Konfiguration vorhanden sind.
        $hasApiKey = \App\Models\ApiKey::where('user_id', $user->id)->exists();
        $hasAgentConfig = \App\Models\AgentConfiguration::where('user_id', $user->id)->exists();

        return $hasApiKey && $hasAgentConfig;
    }
}
