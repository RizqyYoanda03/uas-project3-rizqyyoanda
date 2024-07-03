<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keranjang extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $primaryKey = 'keranjang_id';
    public function stok(){
        return $this->belongsTo(Stok::class, 'stok_id', 'stok_id');
    }
}
