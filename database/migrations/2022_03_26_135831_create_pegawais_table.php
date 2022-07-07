<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {

            $table->id();
            // $table->string('nip')->unique();
            $table->string('nama');
            $table->foreignId('posisi_id')->nullable();
            $table->string('kantor');
            $table->string('join_date');
            // $table->time('shift_in');
            // $table->time('shift_out');
            $table->date('tanggal_lahir');
            $table->text('alamat_domisili');
            $table->text('alamat_sekarang');
            $table->string('kewarganegaraan');
            $table->string('ktp')->unique();
            $table->string('npwp');
            $table->string('akun_bank');
            $table->string('email');
            $table->string('phone');
            $table->string('status');
            $table->string('nama_kontak_darurat');
            $table->string('relasi_kontak_darurat');
            $table->string('phone_kontak_darurat');
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('pegawais');
    }
}
