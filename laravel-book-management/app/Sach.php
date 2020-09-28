<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sach';

    protected $fillable = ['ten_sach','the_loai', 'ngay_xuat_ban', 'hinh_anh',
        'hinh_anh_1', 'hinh_anh_2', 'hinh_anh_3', 'hinh_anh_4',
        'tac_gia', 'nha_xuat_ban', 'so_luong', 'gia_nhap', 'gia_ban', 'gia_khuyen_mai', 'ghim', 'mo_ta', 'mo_ta2'];
}
