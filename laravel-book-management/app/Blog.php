<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog';

    protected $fillable = ['title', 'category', 'hinh_anh', 'mo_ta', 'mo_ta2'];
}
