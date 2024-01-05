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
        Schema::create('lamarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lowongan_id');
            $table->foreign('lowongan_id')
                ->references('id')
                ->on('lowongans')
                ->onDelete('cascade')
                ->onUpdate('cascade'); // foreign key
            $table->string('nama_lengkap')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('status_pernikahan', ['menikah', 'belum menikah', 'janda/duda'])->nullable();
            $table->string('photo')->nullable();
            $table->string('akun_media')->nullable();
            $table->string('nama_sekolah')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('resume')->nullable();
            $table->enum('status', ['diterima', 'ditolak', 'menunggu', 'interview', 'psikotes', 'phk'])->nullable()->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lamarans');
    }
};
