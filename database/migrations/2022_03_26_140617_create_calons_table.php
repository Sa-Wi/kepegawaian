<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calons', function (Blueprint $table) {
            $table->id();
            $table->string('ktp');
            $table->string('nama');
            $table->string('posisi');
            $table->string('tgl_lahir');
            $table->string('tmp_lahir');
            $table->string('jenis__kelamin');
            $table->string('status_menikah');
            $table->string('kewarganegaraan');
            $table->string('agama');
            $table->text('alamat');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->string('kondisi_kesehatan');
            $table->string('email');
            $table->string('telepon');
            $table->string('fb');
            $table->string('ig');
            $table->string('linkedin');
            $table->string('request_gaji');
            $table->boolean('status_nego_gaji');
            $table->string('jenjang_karir');
            $table->string('aktivitas');
            $table->string('hobi');
            $table->string('apply_via');
            $table->string('nama_teman');
            $table->text('keterangan_lain');
            $table->boolean('status_data');
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
        Schema::dropIfExists('calons');
    }
}
