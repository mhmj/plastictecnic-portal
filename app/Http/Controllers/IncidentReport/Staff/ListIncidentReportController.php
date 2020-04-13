<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13/4/2020
 * Time: 7:56 PM
 */

namespace App\Http\Controllers\IncidentReport\Staff;


use App\Classes\Modules\ControllerLogic\IncidentReport\Staff\StaffListIncidentReportLogic;

class ListIncidentReportController
{
    public function record(int $id, StaffListIncidentReportLogic $logic)
    {
        return $logic->execute($id);
    }
}