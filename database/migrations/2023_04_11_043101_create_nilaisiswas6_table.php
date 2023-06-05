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
        Schema::create('nilaisiswas6', function (Blueprint $table) {
            $table->id();
            $table->string('namasiswa');
            $table->string('tugas');
            $table->string('ujian');
            $table->string('average');
            $table->string('uts');
            $table->string('uas');
            $table->string('nilairaport');
            $table->string('grade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilaisiswas6');
    }
};
