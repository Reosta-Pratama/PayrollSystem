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
        Schema::create('gajis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegawaiID');
            $table->foreign('pegawaiID')
                ->references('id')
                ->on('pegawais')
                ->onUpdate('cascade')
                ->onDelete('cascade');


            $table->integer("gajiPokok");
            $table->integer("tunjangan")->nullable();
            $table->integer("bonus")->nullable();
            $table->integer("potongan")->nullable();
            $table->date("tanggalGaji");
            $table->string("status", 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gajis');
    }
};
