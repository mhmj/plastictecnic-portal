<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/4/2020
 * Time: 2:38 PM
 */

namespace App\Http\Controllers\IncidentReport;


use App\Classes\Modules\ControllerLogic\IncidentReport\ListIncidentReportLocationLogic;

class ListIncidentReportLocationController
{
    public function list(int $id, string $category, ListIncidentReportLocationLogic $logic)
    {
        return $logic->execute($id, $category);
    }
}