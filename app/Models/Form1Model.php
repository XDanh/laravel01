<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form1Model extends Model
{
    use HasFactory;
    protected $table = 'form1';
    protected $fillable = [
       'TenKH',
       'DiaChi',
       'MaThue',
       'MaBHXH',
    ];
}
