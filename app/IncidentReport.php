<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentReport extends Model
{
    protected $table='incident_report';

    protected $fillable = [
        'incident_category_id', 'asset_id', 'staff_id', 'IT_staff_id', 'company_id', 'root_cause', 'description', 'duration', 'image', 'rate', 'status'
    ];

}
