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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegawaiID');
            $table->foreign('pegawaiID')
                ->references('id')
                ->on('pegawais')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->date("tanggal");
            $table->time("jamMasuk");
            $table->time("jamKeluar")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
