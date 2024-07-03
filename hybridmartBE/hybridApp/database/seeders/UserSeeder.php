<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Buat data dummy
         $users = [
            [
                'user_id' => 1,
                'username' => 'Haikal',
                'password' => '123456',
                'email' => 'haikal@mail.com',
                'role' => 'pelanggan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Tambahkan data dummy lainnya sesuai kebutuhan
        ];

        // Masukkan data dummy ke dalam tabel transactions
        DB::table('users')->insert($users);
    }
}
