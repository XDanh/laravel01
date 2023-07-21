<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form2 extends Model
{
    use HasFactory;
    protected $table = 'form2';
    protected $fillable = [
        'NV',
        'MaKH',
        'MaCT',
        'NgayKyHD',
        'MaHD',
        'TrangThaiDH',
        'LoaiDH',
        'ThoiGian',
        'GhiChu',
        'MaGD',
        'MaThueBao',
        'Username',
        'SoSeri',
        'SoHD',
        'MaTraCuuHD',
        'NgayXuatDH',
    ];
}
