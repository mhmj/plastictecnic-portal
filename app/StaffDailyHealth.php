<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffDailyHealth extends Model
{
    protected $table='staff_daily_health';

    protected $fillable = [
        'staff_id','staff_no', 'staff_name', 'company_id', 'company_name', 'daily_starter_pack','hand_sanitizing','flu' ,'cough','breathing_difficulty','sore_throat','weak_in_limbs','overall_health','temperature', 'remark'
    ];

}
