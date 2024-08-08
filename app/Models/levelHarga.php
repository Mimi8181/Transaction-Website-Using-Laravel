<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class levelHarga extends Model
{
    use HasFactory;

    protected $table = 'level_harga';
    protected $primaryKey = 'id';
}
