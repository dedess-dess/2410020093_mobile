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
        Schema::create('pengajuan_cuti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained('karyawan')->cascadeOnDelete();
            $table->integer('hak_cuti')->default(12);
            $table->integer('sisa_cuti');
            $table->integer('ambil_cuti');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->text('alasan');
            $table->string('status')->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_cuti');
    }
};