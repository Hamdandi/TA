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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade'); // foreign key
            $table->string('photo')->nullable();
            $table->string('nama')->nullable();
            $table->string('posisi')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('nip')->nullable();
            $table->string('ttd')->nullable();
            $table->integer('sisa_cuti_tahunan')->nullable()->default(0);
            $table->integer('sisa_cuti_besar')->nullable()->default(0);
            $table->integer('sisa_cuti_bersalin')->nullable()->default(0);
            $table->integer('sisa_cuti_diluar_perusahaan')->nullable()->default(0);
            $table->integer('sisa_cuti_pernikahan')->nullable()->default(0);
            $table->integer('sisa_cuti_kelahiran')->nullable()->default(0);
            $table->integer('sisa_cuti_kematian')->nullable()->default(0);
            $table->integer('sisa_cuti_khitanan')->nullable()->default(0);
            $table->integer('sisa_cuti_ujian_kesarjanaan')->nullable()->default(0);
            $table->integer('sisa_cuti_kepentingan')->nullable()->default(0);
            $table->integer('sisa_cuti_nasional')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};