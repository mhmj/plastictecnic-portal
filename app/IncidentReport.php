<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentReport extends Model
{
    protected $table='incident_report';

    protected $fillable = [
        'asset_id', 'staff_id', 'handle_by', 'confirm_by', 'company_id', 'root_cause', 'incident_category', 'job_start', 'job_finish', 'description', 'image', 'rate', 'status'
    ];

}
