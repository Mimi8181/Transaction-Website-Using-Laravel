<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $primaryKey = 'id'; //kalau namanya id, tidak dipakai juga tidak apa-apa
    // public $incrementing = false; jika id-nya bukan AI
    // protected $KeyType = 'string'; jika P-Key bukan int
    // public $timestamps = false; jika kolom di database tdk ada yang bertipe timestamps
}
