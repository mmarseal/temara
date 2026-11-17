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
        Schema::create('controls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('elder_id')->constrained('elders')->cascadeOnDelete();
            $table->date('control_date');
            $table->string('place', 180);
            $table->boolean('is_done')->default(false);
            $table->index(['elder_id', 'control_date'], 'controls_elder_date_index');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controls');
    }
};
