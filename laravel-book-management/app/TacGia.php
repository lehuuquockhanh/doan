<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TacGia extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tac_gia';

    protected $fillable = ['ten_tac_gia', 'dia_chi', 'ngay_sinh', 'hinh_anh', 'mo_ta1', 'mo_ta2', 'mo_ta3'];
}
