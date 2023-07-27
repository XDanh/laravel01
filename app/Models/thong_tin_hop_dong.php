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
        'MA_SO_THUE',
        'MBHXH',
        'NV',
        'TINH_TP',
        'QUAN_HUYEN',
        'XA_PHUONG',
        'SO_NHA',
        'NGAY_KY_HD',
        'LOAI_TB',
        'MA_HOP_DONG',
        'TRANG_THAI_DON_HANG',
        'LOAI_DON_HANG',
        'LOAI_GOI_CUOC',
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

    ];
}
