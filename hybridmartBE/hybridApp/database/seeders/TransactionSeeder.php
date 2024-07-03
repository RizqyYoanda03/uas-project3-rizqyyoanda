<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat data dummy
        $transactions = [
            [
                'transaction_id' => 1,
                'user_id' => 1,
                'tanggal_transaksi' => Carbon::now(),
                'total_harga' => 10000.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'transaction_id' => 2,
                'user_id' => 2,
                'tanggal_transaksi' => Carbon::now(),
                'total_harga' => 15000.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'transaction_id' => 3,
                'user_id' => 3,
                'tanggal_transaksi' => Carbon::now(),
                'total_harga' => 75000.50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Tambahkan data dummy lainnya sesuai kebutuhan
        ];

        // Masukkan data dummy ke dalam tabel transactions
        DB::table('transactions')->insert($transactions);
    }
}
