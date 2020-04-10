<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/4/2020
 * Time: 2:36 PM
 */

namespace App\Http\Controllers\IncidentReport;


use App\Classes\Modules\ControllerLogic\IncidentReport\DeleteIncidentReportLogic;

class DeleteIncidentReportController
{
    public function delete(int $id, DeleteIncidentReportLogic $logic)
    {
        return $logic->execute($id);
    }
}