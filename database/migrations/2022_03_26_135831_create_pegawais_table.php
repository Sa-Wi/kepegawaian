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
            $table->string('nama', 50);
            $table->foreignId('posisi_id')->nullable();
            $table->string('kantor', 50);
            $table->date('join_date');
            // $table->time('shift_in');
            // $table->time('shift_out');
            $table->date('tanggal_lahir');
            $table->text('alamat_domisili')->nullable();
            $table->text('alamat_sekarang')->nullable();
            $table->string('kewarganegaraan', 20);
            $table->string('ktp', 20)->unique()->nullable();
            $table->string('npwp', 20)->nullable();
            $table->string('akun_bank', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('phone', 15);
            $table->string('status', 20);
            $table->string('nama_kontak_darurat', 50)->nullable();
            $table->string('relasi_kontak_darurat', 20)->nullable();
            $table->string('phone_kontak_darurat', 15)->nullable();
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
