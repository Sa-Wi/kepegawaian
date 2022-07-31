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
            $table->date('join_date');
            // $table->time('shift_in');
            // $table->time('shift_out');
            $table->date('tanggal_lahir');
            $table->text('alamat_domisili')->nullable();
            $table->text('alamat_sekarang')->nullable();
            $table->string('kewarganegaraan');
            $table->string('ktp')->unique()->nullable();
            $table->string('npwp')->nullable();
            $table->string('akun_bank')->nullable();
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('status');
            $table->string('nama_kontak_darurat')->nullable();
            $table->string('relasi_kontak_darurat')->nullable();
            $table->string('phone_kontak_darurat')->nullable();
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
