<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('parkir', function (Blueprint $table) {
            $table->id('id_parkir');
            $table->unsignedBigInteger('id_jenis_kendaraan');
            $table->unsignedBigInteger('id_pintu_parkir')->nullable();
            $table->unsignedBigInteger('id_pintu_keluar')->nullable();
            $table->string('nomor_polisi', 20)->nullable();
            $table->string('kode_parkir', 20)->unique();
            $table->dateTime('tanggal_masuk');
            $table->dateTime('tanggal_keluar')->nullable();
            $table->integer('durasi_hari')->default(0);
            $table->integer('durasi_jam')->default(0);
            $table->integer('durasi_menit')->default(0);
            $table->integer('harga_harian')->default(0);
            $table->integer('harga_perjam')->default(0)
            $table->integer('total_bayar')->default(0);
            $table->enum('status_bayar', [
                'Menunggu',
                'Sudah'
            ])->default('Menunggu');
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index('nomor_polisi');
            $table->index('tanggal_masuk');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('parkir');
    }
};