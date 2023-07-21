<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thietbi extends Model
{
    use HasFactory;
    protected $table = 'loaitb';
    protected $fillable = [
        'MaTB',
        'TenTB'
    ];
}
