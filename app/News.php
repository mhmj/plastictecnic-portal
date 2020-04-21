<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table='news';

    protected $fillable = [
        'staff_id', 'title', 'description', 'category', 'remark', 'image_1', 'image_2', 'image_3', 'image_4'
    ];
}
