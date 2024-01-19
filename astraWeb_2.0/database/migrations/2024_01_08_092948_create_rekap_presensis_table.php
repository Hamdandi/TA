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
        Schema::create('rekap_presensis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date'); // Store the date of presence
            $table->boolean('status')->default(0); // 0 = absent, 1 = present
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_presensis');
    }
};
