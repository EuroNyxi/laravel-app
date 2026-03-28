<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('agentconfiguration_ai_model', function (Blueprint $table) {
            $table->uuid('agentconfiguration_id');
            $table->uuid('ai_model_id');
            $table->boolean('is_default')->default(false);
            $table->json('custom_config')->nullable();
            $table->primary(['agentconfiguration_id', 'ai_model_id']);
            $table->foreign('agentconfiguration_id')->references('id')->on('agent_configurations')->onDelete('cascade');
            $table->foreign('ai_model_id')->references('id')->on('ai_models')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agentconfiguration_ai_model');
    }
};