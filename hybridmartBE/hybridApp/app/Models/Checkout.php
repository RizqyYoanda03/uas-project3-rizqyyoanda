<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $primaryKey = 'checkout_id';

    public function stok()
    {
        return $this->belongsTo(Stok::class, 'stok_id', 'stok_id');
    }

}
