<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitorDailyHealth extends Model
{

    protected $table='visitor_daily_health';

    protected $fillable = [
        'name', 'NRIC_passport', 'vehicle_no', 'mobile_no', 'nationality','symptoms','symptoms_other' ,'contact_with','is_visited_china','visited_country','visited_other_country','tabliqh','temperature'
    ];

}
