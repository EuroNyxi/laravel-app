<?php

namespace App\Policies;

use App\Models\AgentConfiguration;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AgentConfigurationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true; // Optional: Restrict to admins if needed
    }

    public function view(User $user, AgentConfiguration $agentConfiguration): bool
    {
        return $user->id === $agentConfiguration->user_id || $agentConfiguration->department?->users->contains($user->id);
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, AgentConfiguration $agentConfiguration): bool
    {
        return $user->id === $agentConfiguration->user_id || $agentConfiguration->department?->users->contains($user->id);
    }

    public function delete(User $user, AgentConfiguration $agentConfiguration): bool
    {
        return $user->id === $agentConfiguration->user_id || $agentConfiguration->department?->users->contains($user->id);
    }
}