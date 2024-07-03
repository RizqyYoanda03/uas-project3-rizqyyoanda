<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stok extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $primaryKey = 'stok_id';

    public function kategori(): BelongsTo
    {
        return $this -> belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }
    // Dalam kontroler atau tempat lainnya

    public function checkout()
    {
        return $this->hasMany(Checkout::class);
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }

}
