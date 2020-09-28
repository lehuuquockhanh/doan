<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'khach_hang';

    protected $fillable = ['ten_khach_hang', 'dia_chi', 'so_dien_thoai', 'email'];
}
