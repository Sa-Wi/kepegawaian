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
            $table->string('nama_perusahaan');
            $table->string('posisi');
            $table->string('dari');
            $table->string('hingga');
            $table->string('tanggung_jawab');
            $table->string('gaji');
            $table->text('alasan_resign');
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
