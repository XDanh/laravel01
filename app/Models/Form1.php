<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Form1 extends Model
{
    use HasFactory;
    protected $table = 'form1';
    protected $fillable = [
        'TEN_KH',
        'DIA_CHI',
        'MA_THUE',
        'MaBHXH',
    ];
}
