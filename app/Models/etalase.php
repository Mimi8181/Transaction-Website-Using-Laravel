<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class etalase extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stok_barang';
    protected $primaryKey = 'id'; //kalau namanya id, tidak dipakai juga tidak apa-apa
    // public $incrementing = false; jika id-nya bukan AI
    // protected $KeyType = 'string'; jika P-Key bukan int
    // public $timestamps = false; jika kolom di database tdk ada yang bertipe timestamps

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
}
