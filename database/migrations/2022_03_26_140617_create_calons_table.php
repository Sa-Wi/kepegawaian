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
            $table->string('nama', 50);
            $table->foreignId('posisi_id');
            $table->string('status', 10)->nullable();
            $table->date('tgl_lahir');
            $table->string('tmp_lahir', 25)->nullable();
            $table->boolean('jenis__kelamin')->nullable();
            $table->string('status_menikah', 15)->nullable();
            $table->string('kewarganegaraan', 25)->nullable();
            $table->string('agama', 20);
            $table->text('alamat_sekarang')->nullable();
            $table->text('alamat_domisili')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->text('kondisi_kesehatan')->nullable();
            $table->string('email', 50);
            $table->string('telepon', 15);
            $table->string('fb', 50)->nullable();
            $table->string('ig', 50)->nullable();
            $table->string('linkedin', 50)->nullable();
            $table->string('request_gaji', 10)->nullable();
            $table->boolean('status_nego_gaji')->nullable();
            $table->text('jenjang_karir')->nullable();
            $table->string('nama_kontak_darurat', 50)->nullable();
            $table->string('relasi_kontak_darurat', 10)->nullable();
            $table->string('phone_kontak_darurat', 15)->nullable();
            $table->text('strength')->nullable();
            $table->text('weakness')->nullable();
            $table->string('aktivitas', 100)->nullable();
            $table->string('hobi', 50)->nullable();
            $table->string('apply_via', 20)->nullable();
            $table->string('nama_teman', 50)->nullable();
            $table->text('berkas')->nullable();
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
