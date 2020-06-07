<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Staff extends Authenticatable
{
    use Notifiable;

    protected $table='staff';

    protected $fillable = [
        'company_id', 'department_id', 'designation_id', 'staff_no', 'email','username','full_name' ,'telephone_no','phone_no','password','role_id','image'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
