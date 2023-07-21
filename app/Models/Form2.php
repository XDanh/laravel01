<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form2 extends Model
{
    use HasFactory;
    protected $table = 'form2';
    protected $fillable = [
        'MaKH',
        'NV',
        'NGAY_KY_HD',
        'MaHD',
        'TRANG_THAI_HP',
        'LOAI_DH',
        'GHI_CHU',
        'MA_GD',
        'MA_THUE_Bao',
        'USERNAME',
        'SO_SERI',
        'SO_HD',
        'MA_TRA_CUU',
        'NGAY_XUAT_HD',
        'MaGC',
        'VAT',
        'GIA_SAU_THUE'
    ];
}
