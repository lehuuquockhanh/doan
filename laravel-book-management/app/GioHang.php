<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gio_hang';

    protected $fillable = ['hinh_anh', 'ma_sach', 'price', 'quantity', 'sub_total', 'user_id'];
}
