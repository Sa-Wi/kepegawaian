<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //tabel admin
        DB::table('petugas')->insert([
            'username' => 'admin',
            'nama' => 'admin',
            'password' => Hash::make('admin'),
        ]);

        //tabel posisi
        DB::table('posisis')->insert([
            'nama' => 'Tax Officer',
        ]);
        DB::table('posisis')->insert([
            'nama' => 'IT Support',
        ]);
        DB::table('posisis')->insert([
            'nama' => 'Executive Assistant',
        ]);
        DB::table('posisis')->insert([
            'nama' => 'Property Sales',
        ]);
        DB::table('posisis')->insert([
            'nama' => 'Linkedin Specialist',
        ]);
        DB::table('posisis')->insert([
            'nama' => 'Trainee Sosmed',
        ]);
        DB::table('posisis')->insert([
            'nama' => 'Web Developer',
        ]);
        DB::table('posisis')->insert([
            'nama' => 'Mobile Application Developer',
        ]);
        DB::table('posisis')->insert([
            'nama' => 'Multimedia Production',
        ]);
        DB::table('posisis')->insert([
            'nama' => 'Sous Chef',
        ]);
        DB::table('posisis')->insert([
            'nama' => 'Cook',
        ]);
        DB::table('posisis')->insert([
            'nama' => 'Barista',
        ]);
        DB::table('posisis')->insert([
            'nama' => 'Waitress',
        ]);

        //tabel pegawai
        DB::table('pegawais')->insert([
            'id' => '396',
            'nama' => 'Farhan',
            'kantor' => 'BVR Group Asia',
            'status' => 'PKTW',
            'posisi_id' => '1',
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('8-7-2019'),
            'tanggal_lahir' => Carbon::parse('9-1-1995'),
            'phone' => '082110090043',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8550',
            'nama' => 'Mita',
            'kantor' => 'BVR Group Asia',
            'status' => 'PKTW',
            'posisi_id' => '6',
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('5-1-2019'),
            'tanggal_lahir' => Carbon::parse('25-7-1999'),
            'phone' => '087860608595',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8556',
            'nama' => 'Caka',
            'kantor' => 'BVR Group Asia',
            'status' => 'PKTW',
            'posisi_id' => '6',
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('26-Oct-21'),
            'tanggal_lahir' => Carbon::parse('26-Mar-93'),
            'phone' => '082341801719',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8562',
            'nama' => 'Gusde',
            'kantor' => 'BVR Group Asia',
            'status' => 'PKTW',
            'posisi_id' => '7',
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('1-Oct-21'),
            'tanggal_lahir' => Carbon::parse('25-Dec-99'),
            'phone' => '085157558386',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8570',
            'nama' => 'Honey',
            'kantor' => 'BVR Group Asia',
            'status' => 'PKTW',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('16-Aug-21'),
            'tanggal_lahir' => Carbon::parse('26-Jul-99'),
            'phone' => '081239242812',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8581',
            'nama' => 'Ricardo Joanito Kiabeda',
            'kantor' => 'BVR Group Asia',
            'status' => 'PKTW',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('11-Oct-21'),
            'tanggal_lahir' => Carbon::parse('21-Jan-82'),
            'phone' => '081239879953',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8590',
            'nama' => 'Luh Kadek Susparini',
            'kantor' => 'BVR Group Asia',
            'status' => 'PKTW',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('26-Dec-21'),
            'tanggal_lahir' => Carbon::parse('29-Oct-83'),
            'phone' => '081246261205',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8602',
            'nama' => 'Matheus Ronan Abel',
            'kantor' => 'BVR Group Asia',
            'status' => 'PKTW',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('14-Mar-22'),
            'tanggal_lahir' => Carbon::parse('8-Sep-00'),
            'phone' => '081246610594',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8605',
            'nama' => 'Renggiwati Lim',
            'kantor' => 'BVR Group Asia',
            'status' => 'PKTW',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('1-Apr-22'),
            'tanggal_lahir' => Carbon::parse('28-Sep-01'),
            'phone' => '08117773608',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8573',
            'nama' => 'Ni Komang Tri Utami Widiyasari',
            'kantor' => 'BVR Group Asia',
            'status' => 'PKTW',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('1-Jan-22'),
            'tanggal_lahir' => Carbon::parse('3-Aug-98'),
            'phone' => '089695497164',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8614',
            'nama' => 'Muhammad Taufik',
            'kantor' => 'BVR Group Asia',
            'status' => 'PKTW',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('18-Apr-22'),
            'tanggal_lahir' => Carbon::parse('7-Jan-91'),
            'phone' => '085265350295',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8616',
            'nama' => 'Septiany Misparanna Gultom',
            'kantor' => 'BVR Group Asia',
            'status' => 'PKTW',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('4-May-22'),
            'tanggal_lahir' => Carbon::parse('29-Sep-92'),
            'phone' => '082363965377',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8617',
            'nama' => 'Eko Purwanto, S.H., M.Kn',
            'kantor' => 'BVR Group Asia',
            'status' => 'PKTW',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('23-May-22'),
            'tanggal_lahir' => Carbon::parse('5-Aug-90'),
            'phone' => '081237271897',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8620',
            'nama' => 'Muhammad Bayu Putra',
            'kantor' => 'BVR Group Asia',
            'status' => 'PKTW',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('13-Jun-22'),
            'tanggal_lahir' => Carbon::parse('14-Sep-97'),
            'phone' => '08811534141',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8621',
            'nama' => 'Yanda Meidena Hanif',
            'kantor' => 'BVR Group Asia',
            'status' => 'PKTW',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('13-Jun-22'),
            'tanggal_lahir' => Carbon::parse('26-May-97'),
            'phone' => '085868863783',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8600',
            'nama' => 'Ni Putu Dika Yuni Pertiwi',
            'kantor' => 'BVR Group Asia',
            'status' => 'DW',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('14-Feb-22'),
            'tanggal_lahir' => Carbon::parse('4-Jun-99'),
            'phone' => '089651609959',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8608',
            'nama' => 'Novi Indrayani',
            'kantor' => 'BVR Group Asia',
            'status' => 'DW',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('29-Mar-22'),
            'tanggal_lahir' => Carbon::parse('11-Nov-99'),
            'phone' => '082266552477',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8619',
            'nama' => 'Naomi Banjar Nahor',
            'kantor' => 'BVR Group Asia',
            'status' => 'TRAINEE',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('6-Jun-22'),
            'tanggal_lahir' => Carbon::parse('12-Jun-00'),
            'phone' => '087866708590',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8623',
            'nama' => 'Desak Putu Dianti',
            'kantor' => 'BVR Group Asia',
            'status' => 'TRAINEE',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('4-Jul-22'),
            'tanggal_lahir' => Carbon::parse('24-Jul-97'),
            'phone' => '085738526965',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8624',
            'nama' => 'I Gusti Ngurah Anom Prabulangga',
            'kantor' => 'BVR Group Asia',
            'status' => 'TRAINEE',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('4-Jul-22'),
            'tanggal_lahir' => Carbon::parse('12-Apr-97'),
            'phone' => '081238191394',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8625',
            'nama' => 'Ni Nyoman Suciana Dewi Ayudia Merta',
            'kantor' => 'BVR Group Asia',
            'status' => 'TRAINEE',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse('11-Jul-22'),
            'tanggal_lahir' => Carbon::parse('30-Aug-00'),
            'phone' => '081338043470',
        ]);
        DB::table('pegawais')->insert([
            'id' => '2623',
            'nama' => 'Thomas Richard Robin Donovan',
            'kantor' => 'BVR Group Asia',
            'status' => 'TRAINEE',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'USA',
            'join_date' => Carbon::parse('24-Jun-22'),
            'tanggal_lahir' => Carbon::parse('7-Mar-01'),
            'phone' => '09138510548',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8627',
            'nama' => 'Muhamad Thomas Irsyad',
            'kantor' => 'BVR Group Asia',
            'status' => 'PKTW',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'USA',
            'join_date' => Carbon::parse('22-Jul-22'),
            'tanggal_lahir' => Carbon::parse('6-Feb-00'),
            'phone' => '0878011497999',
        ]);
        DB::table('pegawais')->insert([
            'id' => '8628',
            'nama' => 'I Gede Bagus Dirgaputra',
            'kantor' => 'BVR Group Asia',
            'status' => 'PKTW',
            'posisi_id' => rand(1, 13),
            'kewarganegaraan' => 'USA',
            'join_date' => Carbon::parse('22-Jul-22'),
            'tanggal_lahir' => Carbon::parse('27-Mar-95'),
            'phone' => '085961509075',
        ]);
    }
}
