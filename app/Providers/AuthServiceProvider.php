<?php

namespace App\Providers;

use App\Models\AgentConfiguration;
use App\Models\ApiKey;
use App\Policies\AgentConfigurationPolicy;
use App\Policies\ApiKeyPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        ApiKey::class => ApiKeyPolicy::class,
        AgentConfiguration::class => AgentConfigurationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}