<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chitiet extends Model
{
    use HasFactory;
    protected $table = 'chitiet';
    protected $fillable = [
        'MaCT',
        'MaTB',
        'MaGC',
        'GiaTB',
        'GiaTruocThue',
        'VAT',
        'GiaSauThue',
    ];
}
