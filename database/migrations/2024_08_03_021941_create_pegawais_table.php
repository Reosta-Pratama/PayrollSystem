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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userID');
            $table->foreign('userID')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');


            $table->string("nama");
            $table->text("alamat");
            $table->date("tanggalLahir");
            $table->string("jenisKelamin", 2);
            $table->string("noTelepon",15);
            $table->string("jabatan", 100);
            $table->date("tanggalMasuk");
            $table->string("status", 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
