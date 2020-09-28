<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoaiSach extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'the_loai_sach';

    protected $fillable = ['ten_the_loai', 'hinh_anh', 'mo_ta'];
}
