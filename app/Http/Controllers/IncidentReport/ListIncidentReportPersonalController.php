<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24/6/2020
 * Time: 4:14 PM
 */

namespace App\Http\Controllers\IncidentReport;


use App\Classes\Modules\ControllerLogic\IncidentReport\ListIncidentReportPersonalLogic;

class ListIncidentReportPersonalController
{
    public function list($location_id, $staff_id, ListIncidentReportPersonalLogic $logic)
    {
        return $logic->execute($location_id, $staff_id);
    }
}