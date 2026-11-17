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
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('elder_id')->constrained('elders')->cascadeOnDelete();
            $table->string('name', 150);
            $table->string('dosage', 100);
            $table->string('period', 20);
            $table->time('time');
            $table->date('last_taken_date')->nullable();
            $table->index(['elder_id', 'time'], 'medications_elder_time_index');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medications');
    }
};
