<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->bigInteger('role_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_user');
    }
};
