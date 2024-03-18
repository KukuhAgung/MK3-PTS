<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status', 'id_transaksi'];

    public function customers()
    {
        return $this->belongsTo(Pembeli::class, 'id_pembeli', 'id');
    }
}
