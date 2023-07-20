<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form2Model extends Model
{
    use HasFactory;
    protected $fillable = [
            'NV',
            'NgayKyHD',
            'MaHD',
            'TrangThaiDH',
            'LoaiDH',
            'DichVu',
            'GoiCuoc',
            'ThoiGian',
            'LoaiThietBi',
            'GiaTB',
            'GiaTruocThue',
            'VAT',
            'GiaSauThue',
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
