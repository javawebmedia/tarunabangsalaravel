<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'id_user'       => 1,
                'nama'          => 'Andoyo Andoyo',
                'email'         => 'andoyoandoyo@gmail.com',
                'username'      => 'andoyo',
                'password'      => sha1('andoyo'),
                'akses_level'   => 'Admin',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'id_user'       => 2,
                'nama'          => 'Kheira Alexandrina Andoyo',
                'email'         => 'javawebmedia@gmail.com',
                'username'      => 'kheira',
                'password'      => sha1('kheira'),
                'akses_level'   => 'User',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'id_user'       => 3,
                'nama'          => 'Izra Rashid Andoyo',
                'email'         => 'izra@gmail.com',
                'username'      => 'izra',
                'password'      => sha1('izra'),
                'akses_level'   => 'User',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}