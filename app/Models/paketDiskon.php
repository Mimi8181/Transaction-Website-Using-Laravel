<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class paketDiskon extends Model
{
    use HasFactory;

    protected $table = 'paket_diskon';
    protected $primaryKey = 'id';

    public function barang()
    {
        return $this->belongsTo(Stok_Barang::class, 'barang_id', 'id');
    }
}
