<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitorDailyHealthNilaiA extends Model
{
    protected $table='visitor_nilai_a_daily_health';

    protected $fillable = [
        'company_id', 'company_name' ,'name', 'NRIC_passport', 'person_to_meet', 'company_from_name', 'vehicle_no', 'mobile_no', 'nationality','symptoms','symptoms_other' ,'contact_with','is_visited_china','visited_country','visited_other_country','tabliqh','temperature','created_at'
    ];
}
