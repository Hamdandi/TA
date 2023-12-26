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
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            // Replace 'jenis_cuti' string column with a reference to 'jenis_cutis' table
            $table->unsignedBigInteger('jenis_cuti_id');
            $table->foreign('jenis_cuti_id')
                ->references('id')
                ->on('jenis_cutis')
                ->onDelete('cascade');

            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->string('keterangan')->nullable();
            $table->enum('status', ['diterima', 'ditolak', 'menunggu'])->nullable();
            $table->string('alasan')->nullable();
            $table->integer('jumlah_hari')->nullable();
            $table->string('sisa_cuti')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutis');
    }
};
