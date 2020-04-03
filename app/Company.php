<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table='company';

    protected $fillable = [
        'name', 'phone_no', 'fax_no', 'email', 'location', 'base', 'state', 'post_code', 'address'
    ];

}
