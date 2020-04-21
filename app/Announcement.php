<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table='announcement';

    protected $fillable = [
        'staff_id', 'title', 'description', 'category', 'remark', 'file'
    ];
}
