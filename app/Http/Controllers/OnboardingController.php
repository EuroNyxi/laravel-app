<?php

namespace App\Http\Controllers;

use App\Models\AIModel;
use App\Models\ApiKey;
use App\Models\AgentConfiguration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OnboardingController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Falls Onboarding schon durch ist, direkt zum Dashboard
        if (ApiKey::where('user_id', $user->id)->exists() &&
            AgentConfiguration::where('user_id', $user->id)->exists()) {
            return redirect()->route('dashboard');
        }

        $models = AIModel::where('is_active', true)->get();

        return view('onboarding', compact('models'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'api_key' => ['required', 'string'],
            'model_id' => ['required', 'exists:ai_models,id'],
            'agent_name' => ['required', 'string', 'max:255'],
        ]);

        $user = Auth::user();

        DB::transaction(function () use ($request, $user) {
            // 1. API Key speichern
            ApiKey::create([
                'user_id' => $user->id,
                'key' => $request->api_key,
                'is_active' => true,
            ]);

            // 2. Agent Konfiguration erstellen
            $agentConfig = AgentConfiguration::create([
                'user_id' => $user->id,
                'name' => $request->agent_name,
                'configuration' => [
                    'description' => 'Initialer Agent für ' . $user->name,
                ],
            ]);

            // 3. Modell verknüpfen
            $agentConfig->aiModels()->attach($request->model_id, [
                'is_default' => true,
                'custom_config' => json_encode([]),
            ]);
        });

        return redirect()->route('dashboard')->with('status', 'Onboarding erfolgreich abgeschlossen!');
    }
}
