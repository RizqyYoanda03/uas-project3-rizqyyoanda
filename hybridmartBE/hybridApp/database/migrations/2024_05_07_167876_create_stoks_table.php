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
        Schema::create('stoks', function (Blueprint $table) {
            $table->increments('stok_id');
            $table->string('kode_barang',15);
            $table->string('product_name',25); 
            $table->unsignedInteger('kategori_id');
            $table->foreign('kategori_id')->references('kategori_id')->on('kategoris');           
            $table->integer('product_price');
            $table->string('gambar');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
