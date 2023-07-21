<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaigoi extends Model
{
    use HasFactory;
    protected $table = 'loaigoi';
    protected $fillable = [
        'MaGC',
        'MaLoai',
        'LOAI_GOI',
    ];
}
