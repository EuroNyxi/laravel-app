<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIModel extends Model
{
    use HasFactory;

    protected $table = 'ai_models';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'display_name',
        'capabilities',
        'default_config',
        'api_endpoint',
        'is_active'
    ];

    protected $casts = [
        'capabilities' => 'array',
        'default_config' => 'array',
        'is_active' => 'boolean'
    ];

    public function agents()
    {
        return $this->belongsToMany(Agent::class, 'agent_ai_model', 'ai_model_id', 'agent_id')
                    ->withPivot('is_default', 'custom_config')
                    ->withTimestamps();
    }
}