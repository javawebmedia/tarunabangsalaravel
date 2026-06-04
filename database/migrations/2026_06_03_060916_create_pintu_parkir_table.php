<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pintu_parkir', function (Blueprint $table) {

            $table->id('id_pintu_parkir');
            $table->string('nama_pintu_parkir');
            $table->text('keterangan')->nullable();
            $table->enum('jenis_pintu', [
                'Masuk',
                'Keluar'
            ]);
            $table->integer('urutan')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pintu_parkir');
    }
};