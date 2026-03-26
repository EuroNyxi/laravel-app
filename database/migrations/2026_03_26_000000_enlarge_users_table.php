<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user')->after('password');
            $table->timestamp('last_login_at')->nullable()->after('role');
            $table->boolean('is_active')->default(true)->after('last_login_at');
            $table->string('timezone')->default('Europe/Berlin')->after('is_active');
            $table->string('locale')->default('de')->after('timezone');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role',
                'last_login_at',
                'is_active',
                'timezone',
                'locale',
            ]);
        });
    }
};
