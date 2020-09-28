<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'don_hang';

    protected $fillable = ['ten_khach_hang', 'dia_chi', 'dia_chi_2', 'so_dien_thoai', 'email', 'note', 'note_2', 'customer_id', 'status','user_id'];
}
