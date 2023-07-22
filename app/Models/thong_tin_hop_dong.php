<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thong_tin_hop_dong extends Model
{
    use HasFactory;
    protected $table = 'thong_tin_hop_dong';
    protected $fillable = [
        'TEN_KHACH_HANG',
        'DIA_CHI',
        'MA_SO_THUE',
        'MBHXH',
        'NV',
        'NGAY_KY_HD',
        'MA_HOP_DONG',
        'TRANG_THAI_DON_HANG',
        'LOAI_DON_HANG',
        'DICH_VU',
        'GOI_CUOC',
        'THOI_GIAN',
        'SO_LUONG',
        'GIA_THIET_BI',
        'GIA_TRUOC_THUE',
        'GIA_SAU_THUE',
        'GHI_CHU',
        'MA_GD',
        'MA_THUE_BAO',
        'USERNAME',
        'SO_SERI',
        'SO_HD',
        'MA_TRA_CUU',
        'NGAY_XUAT_HOA_DON',
        'MA_TINH',
        'MA_HUYEN',
        'MA_XA',
        'SO_NHA',
    ];
}
