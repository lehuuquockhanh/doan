<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMucSach extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'danh_muc_sach';

    protected $fillable = ['ten_danh_muc', 'mo_ta'];
}
