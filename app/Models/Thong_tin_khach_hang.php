<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Thong_tin_khach_hang extends Model
{
    use HasFactory;
    protected $table = 'thong_tin_khach_hang';
    protected $fillable = [
        'TEN_KH',
        'DIA_CHI',
        'MA_THUE',
        'MaBHXH',
    ];
}
