<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('transactions', function (Blueprint $table) {
        $table->increments('transaction_id');
        $table->unsignedInteger('user_id');
        $table->foreign('user_id')->references('user_id')->on('users');
        $table->timestamp('tanggal_transaksi')->useCurrent();
        $table->decimal('total_harga', 8, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
