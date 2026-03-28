<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgentConfiguration extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'department_id',
        'configuration',
        'name',
    ];

    protected $casts = [
        'configuration' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function aiModels()
    {
        return $this->belongsToMany(AIModel::class, 'agentconfiguration_ai_model', 'agentconfiguration_id', 'ai_model_id')
                    ->withPivot('is_default', 'custom_config')
                    ->withTimestamps();
    }

    public function isGlobal(): bool
    {
        return $this->user_id === null && $this->department_id === null;
    }

    public function isOwnedBy(User $user): bool
    {
        return $this->user_id === $user->id || $this->department?->users->contains($user->id);
    }
}