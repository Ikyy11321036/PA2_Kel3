<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwalmapels', function (Blueprint $table) {
            $table->id();
            $table->string('senin')->default('')->nullable(false);
            $table->string('selasa')->default('')->nullable(false);
            $table->string('rabu')->default('')->nullable(false);
            $table->string('kamis')->default('')->nullable(false);
            $table->string('jumat')->default('')->nullable(false);
            $table->string('sabtu')->default('')->nullable(false);
            $table->string('waktu')->default('')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwalmapels');
    }
};
