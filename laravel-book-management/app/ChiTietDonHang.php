<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'chi_tiet_don_hang';

    protected $fillable = ['ma_don_hang', 'ma_sach', 'so_luong', 'tong_tien'];
}
