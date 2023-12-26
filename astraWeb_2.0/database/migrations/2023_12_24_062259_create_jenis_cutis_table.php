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
        Schema::create('jenis_cutis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('karyawan_id');
            $table->foreign('karyawan_id')
                ->references('id')
                ->on('karyawans')
                ->onDelete('cascade')
                ->onUpdate('cascade'); // foreign key
            $table->string('jenis_cuti');
            $table->integer('jumlah_hari');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_cutis');
    }
};
