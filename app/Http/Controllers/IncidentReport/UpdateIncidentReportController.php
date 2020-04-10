<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/4/2020
 * Time: 2:37 PM
 */

namespace App\Http\Controllers\IncidentReport;


use App\Classes\Modules\ControllerLogic\IncidentReport\UpdateIncidentReportLogic;
use Illuminate\Http\Request;

class UpdateIncidentReportController
{
    public function update(int $id, Request $request, UpdateIncidentReportLogic $logic)
    {
        return $logic->execute($id, $request);
    }
}