<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('api_keys', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->uuid('department_id')->nullable();
            $table->string('key'); // Encrypted
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');

            // Ensure XOR: Only one of user_id or department_id is set (or neither for global keys)
            $table->check('(user_id IS NOT NULL AND department_id IS NULL) OR (user_id IS NULL AND department_id IS NOT NULL) OR (user_id IS NULL AND department_id IS NULL)');
        });
    }

    public function down()
    {
        Schema::dropIfExists('api_keys');
    }
};