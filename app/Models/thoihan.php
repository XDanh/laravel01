<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thoihan extends Model
{
    use HasFactory;
    protected $table = 'thoihan';
    protected $fillable = [
        'MaTH',
        'MaGC',
        'MaLoai',
        'THOI_HAN',
        'GIA_TRUOC_THUE',
    ];
}
