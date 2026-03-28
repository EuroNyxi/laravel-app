<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $models = [
            [
                'id' => Str::uuid(),
                'name' => 'gpt-4o',
                'display_name' => 'OpenAI GPT-4o',
                'capabilities' => json_encode(['chat', 'vision']),
                'default_config' => json_encode([]),
                'api_endpoint' => 'https://api.openai.com/v1/chat/completions',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'mistral-large',
                'display_name' => 'Mistral Large',
                'capabilities' => json_encode(['chat']),
                'default_config' => json_encode([]),
                'api_endpoint' => 'https://api.mistral.ai/v1/chat/completions',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($models as $model) {
            DB::table('ai_models')->insert($model);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('ai_models')->whereIn('name', ['gpt-4o', 'mistral-large'])->delete();
    }
};
