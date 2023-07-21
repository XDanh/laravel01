<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goicuoc extends Model
{
    use HasFactory;
    protected $table = 'goicuoc';
    protected $fillable = [
        'MaDV',
        'MaGC',
        'GOI_CUOC',
        'THOI_GIAN',
    ];
}
