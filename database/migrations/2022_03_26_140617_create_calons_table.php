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
            $table->string('tmp_lahir')->nullable();
            $table->string('jenis__kelamin')->nullable();
            $table->string('status_menikah')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('agama');
            $table->text('alamat')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->string('kondisi_kesehatan')->nullable();
            $table->string('email');
            $table->string('telepon');
            $table->string('fb')->nullable();
            $table->string('ig')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('request_gaji')->nullable();
            $table->boolean('status_nego_gaji')->nullable();
            $table->string('jenjang_karir')->nullable();
            $table->string('nama_kontak_darurat')->nullable();
            $table->string('relasi_kontak_darurat')->nullable();
            $table->string('Phone_kontak_darurat')->nullable();
            $table->text('strength')->nullable();
            $table->text('weakness')->nullable();
            $table->string('aktivitas')->nullable();
            $table->string('hobi')->nullable();
            $table->string('apply_via')->nullable();
            $table->string('nama_teman')->nullable();
            $table->text('keterangan_lain')->nullable();
            // $table->boolean('status_data');
            $table->softDeletes();
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
