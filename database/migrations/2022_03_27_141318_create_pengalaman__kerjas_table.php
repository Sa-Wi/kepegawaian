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
            $table->string('nama_perusahaan', 50)->nullable();
            $table->string('posisi', 20)->nullable();
            $table->string('dari', 4)->nullable();
            $table->string('hingga', 4)->nullable();
            $table->string('tanggung_jawab', 100)->nullable();
            $table->string('gaji', 10)->nullable();
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
