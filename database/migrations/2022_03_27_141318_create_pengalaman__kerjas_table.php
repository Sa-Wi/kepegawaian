<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengalamanKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengalaman__kerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calon_id');
            $table->string('nama_perusahaan')->nullable();
            $table->string('posisi')->nullable();
            $table->string('dari')->nullable();
            $table->string('hingga')->nullable();
            $table->string('tanggung_jawab')->nullable();
            $table->string('gaji')->nullable();
            $table->text('alasan_resign')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengalaman__kerjas');
    }
}
