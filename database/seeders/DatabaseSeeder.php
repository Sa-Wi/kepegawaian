<?php

namespace Database\Seeders;

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
        DB::table('petugas')->insert([
            'username' => 'admin',
            'nama' => 'admin',
            'password' => Hash::make('admin'),
        ]);
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
    }
}
